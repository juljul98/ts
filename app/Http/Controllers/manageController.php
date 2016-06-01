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
  
    public function index() {
      $title = 'Manage Accounts | Tracking System';
      $users = DB::table('users')
                        ->select('id', 'fullname', 'email', 'position', 'department', 'active')
                        ->get();
      return View::make('admin.manage', compact('title', 'users'));
    }
  
    public function updateActive (Request $request, $id) {
      $users = User::find($id);
      $users->active = $request->input('checked');
      $users->save();
      return response('updated');
    }

}
