<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use View;
use Response;
use Session;

class dashController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }
  
    public function index() {
      $title = 'DashBoard Tracking System';
      return View::make('admin.dashboard', compact('title'));
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
  public function getEmployee () {
    $employee = DB::table('users')
      ->select('fullname', 'created_at')
      ->where('active', '=', 1)
      ->get();
    return Response($employee);
  }

}