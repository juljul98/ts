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
use Crypt;

class DepartmentController extends Controller
{
  
    public function index(){
      $title = 'Department and Position | Tracking System';
      $role = DB::table('role')
          ->select('id', 'name')
          ->get();
      $department = $this->getDepartment();
      $records = $this->getAllRecord();
      return view::make('admin.department', compact('title', 'role', 'department', 'records'));
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
        ->select('id','departmentname')
        ->get();
      return $department;
    }
  
    public function saveDepartment(Request $request) {
      $file = array(
        'departmentname' => $request->input('departmentname')
      );
      $rule = array(
        'departmentname' => 'required|unique:department'
      );
      $validation = Validator::make($file, $rule);
      
      if ($validation->fails()){
        return response ($validation->messages());
      }
      else {
        $resultid = DB::table('users')->select('id')->orderBy('id', 'desc')->take(1)->get();
        foreach($resultid as $id) {
          $result = $id->id;
        }
        $myId = $result + 1;
        $departmentname = htmlspecialchars($request->input('departmentname'));
        $department = new Department;
        $department->keyenc = Crypt::encrypt($myId);
        $department->departmentname = ucwords($departmentname);
        $department->save();
        return response('Successfully Save');
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
        'positionname' => 'required|unique:position',
        'userlevel' => 'required'
      );
      $validation = Validator::make($file, $rule);
      if ($validation->fails()) {
        return response ($validation->messages());
      } else {
        $position = new Position;
        $position->departmentid = $request->input('departmentname');
        $position->userlevel = $request->input('userlevel');
        $position->positionname = htmlspecialchars($request->input('positionname'));
        $position->save();
        return response('Successfully Save');
      }
    }
  
    public function getDepartmentNameForPosition() {
      $department = $this->getDepartment();
      return $department;
    }
    
    public function getAllRecord() {
        $records = DB::table('department')
            ->join('position', 'department.id', '=', 'position.departmentid')
            ->select()
            ->get();
        return $records;
    }
  
}
