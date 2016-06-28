<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use View;
use Response;
use Session;
use Auth;
use Carbon\Carbon;
use Input;

class DashController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }
  
    public function index(Request $request) {
      $title = 'DashBoard Tracking System';
      $thisyear = Carbon::now()->year;
      
      $reg = DB::table('users')->where('active', '=', 1);
      $regemployee = $reg->count();
      $pendemployee = DB::table('users')->where('active', '=', 0)->count();

      return View::make('admin.dashboard', compact('title', 'reg', 'regemployee', 'pendemployee', 'thisyear'));
    }
  
    public function getRegisteredEmployee(Request $request) {
     return $this->getQuery(1);
    }
    
    public function getPendingEmployee(Request $request) {
      return $this->getQuery(0);
    }
  
  public function getCountForChart(Request $request) {
      $year = $request->input('yearHE');
      $loop = 12;
      $total_regpermonth = array();
      for ($x=1; $x<=$loop; $x++) {
        $empmonth = DB::table('users')
          ->select('created_at')
          ->where('active', '=', 1)
          ->whereMonth('created_at', '=', $x)
          ->whereYear('created_at', '=', $year)
          ->count();
        array_push($total_regpermonth, $empmonth);
      }
      $total_reg = DB::table('users')
        ->select('created_at')
        ->where('active', '=', 1)
        ->whereYear('created_at', '=', $year)
        ->count();
      return [
        'empcount' => $total_regpermonth,
        'total' => $total_reg
      ];
    }
  
    public function getQuery($val) {
        $employee = DB::table('users')
          ->select('fullname', 'created_at')
          ->where('active', '=', $val)
          ->paginate(10);
        if(Input::ajax()) {
          return [
            'employees' => $employee,
            'next_page' => $employee->nextPageUrl()
          ];
        }
    }
  
}