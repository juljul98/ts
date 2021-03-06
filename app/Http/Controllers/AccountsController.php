<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use View;
use App\User;
use appends;
use Crypt;

class AccountsController extends Controller
{
  
  public function __construct()
  {
    $this->middleware('auth');
  }
  
    public function index(Request $request) {
      $title = 'Manage Accounts | Tracking System';
      $searchFrm = $request->input('searchFrm');
      if ( !empty($searchFrm) ) {
        $employees = DB::table('users')
          ->select('keyenc', 'fullname', 'email', 'position', 'department', 'active')
          ->orderBy('id', 'desc')
          ->orWhere('fullname', 'LIKE', '%'. $searchFrm . '%')
          ->orWhere('empno' , 'LIKE', '%'. $searchFrm . '%')
          ->paginate(11);
        if($request->ajax()) {
          return [
            'employees' => $employees,
            'next_page' => $employees->nextPageUrl(),
            'prev_page' => $employees->previousPageUrl(),
            'pagination' => $employees->links()
          ];
        }
      } else {
        $employees = DB::table('users')
          ->select('keyenc', 'fullname', 'email', 'position', 'department', 'active')
          ->orderBy('id', 'desc')
          ->paginate(11);
        if($request->ajax()) {
          return [
            'employees' => $employees,
            'next_page' => $employees->nextPageUrl(),
            'prev_page' => $employees->previousPageUrl()
          ];
        }
      }
      return view('admin.manageaccounts', compact('title', 'employees'));
    }
  
    public function updateActive (Request $request, $id) {
      $iddec = Crypt::decrypt($id);
      $users = User::find($iddec);
      $users->active = $request->input('checked');
      $users->save();
      return response('updated');
    }

}
