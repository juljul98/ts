<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Department;
use App\Position;
use View;
use DB;
use Role;
use Response;
use Validator;


class DepartmentController extends Controller
{
  
    public function index(){
      $title = 'Department and Position | Tracking System';
      $role = DB::table('role')
          ->select('id', 'name')
          ->get();
      $department = $this->getDepartment();
      return view::make('admin.department', compact('title', 'role', 'department'));
    }
  
    public function getRole(Request $request) {
      $trigger = $request->input("trigger");
      $role = DB::table('role')
          ->select('id', 'name', 'description')
          ->where('id', '=', $trigger)
          ->get();
      return Response::json($role[0]);
    }
  
    function getDepartment() {
      $department = DB::table('department')
        ->select('id','name')
        ->get();
      return $department;
    }
  
    public function saveDepartment(Request $request) {
      $file = array(
        'departmentname' => $request->input('departmentname')
      );
      $rule = array(
        'departmentname' => 'required'
      );
      $validation = Validator::make($file, $rule);
      
      if ($validation->fails()){
        return response ($validation->messages());
      }
      else {
        $departmentname = $request->input('departmentname');
        $department = new Department;
        $department->name = ucwords($departmentname);
        $department->save();
        return response('save');
      }
    }
    public function savePosition(Request $request) {
      $file = array(
        'departmentname' => $request->input('departmentname'),
        'userlevel' => $request->input('userlevel'),
        'positionname' => $request->input('positionname')
      );
      $rule = array(
        'departmentname' => 'required',
        'positionname' => 'required',
        'userlevel' => 'required'
      );
      $validation = Validator::make($file, $rule);
      if ($validation->fails()) {
        return response ($validation->messages());
      } else {
        $position = new Position;
        $position->departmentid = $request->input('departmentname');
        $position->userlevel = $request->input('userlevel');
        $position->name = $request->input('positionname');
        $position->save();
        return response('save');
      }
    }
  
}
