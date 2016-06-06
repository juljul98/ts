<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use View;
use App\User;

class ManageController extends Controller
{
  
  public function __construct()
  {
    $this->middleware('auth');
  }
  
    public function index(Request $request) {
      $title = 'Manage Accounts | Tracking System';
      $employees = DB::table('users')
                        ->select('id', 'fullname', 'email', 'position', 'department', 'active')
                        ->orderBy('id', 'desc')
                        ->paginate(1);
        if($request->ajax()) {
          return [
            'employees' => $employees,
            'next_page' => $employees->nextPageUrl(),
            'prev_page' => $employees->previousPageUrl()
              
          ];
        }
        
      return view('admin.manage', compact('title', 'employees'));
        
    }
  
    public function updateActive (Request $request, $id) {
      $users = User::find($id);
      $users->active = $request->input('checked');
      $users->save();
      return response('updated');
    }

}
