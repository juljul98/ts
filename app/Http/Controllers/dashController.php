<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use View;
use Response;
use Session;

class DashController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }
  
  public function index(Request $request) {
    $title = 'DashBoard Tracking System';
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
      return View::make('admin.dashboard', compact('title', 'employee'));
    }
  
    public function getRegisteredEmployee () {
      $registered = DB::table('users')
                        ->where('active', '=', 1)
                        ->count(); // Registered Account
      return Response($registered);
    }
    
    public function getPendingEmployee () {
      $pending = DB::table('users')
                        ->where('active', '=', 0)
                        ->count();
      return Response($pending);
    }


}