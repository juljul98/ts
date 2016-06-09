<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use View;
use DB;
use Role;
use Response;


class DepartmentController extends Controller
{
  
    public function index(){
      $title = 'Department and Position | Tracking System';
      $role = DB::table('role')
          ->select('id', 'name')
          ->get();
      return view::make('admin.department', compact('title', 'role'));
    }
  
    public function getRole(Request $request) {
      $trigger = $request->input("trigger");
      $role = DB::table('role')
          ->select('id', 'name', 'description')
          ->where('id', '=', $trigger)
          ->get();
      return Response::json($role[0]);
    }
  
}
