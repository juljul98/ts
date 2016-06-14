<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use View;
use Response;
use Session;
use Auth;

class DashController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }
  
  public function index(Request $request) {
    
    $title = 'DashBoard Tracking System';
    $regemployee = DB::table('users')->where('active', '=', 1)->count();
     $pendemployee = DB::table('users')->where('active', '=', 0)->count();
      return View::make('admin.dashboard', compact('title', 'regemployee', 'pendemployee'));
    }
  
    public function getRegisteredEmployee (Request $request) {
        $employee = DB::table('users')
          ->select('fullname', 'created_at')
          ->where('active', '=', 1)
          ->paginate(10);
          
        if($request->ajax()) {
          return [
            'employees' => $employee,
            'next_page' => $employee->nextPageUrl()
          ];
        }
    }
    
    public function getPendingEmployee (Request $request) {
      $employee = DB::table('users')
        ->select('fullname', 'created_at')
        ->where('active', '=', 0)
        ->paginate(10);
        
      if($request->ajax()) {
        return [
          'employees' => $employee,
          'next_page' => $employee->nextPageUrl()
        ];
      }
    }


}