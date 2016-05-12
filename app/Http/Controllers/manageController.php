<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;

class manageController extends Controller
{
  
  public function __construct()
  {
    $this->middleware('auth');
  }
  
    public function index() {
      
      $users = DB::table('users')->get();
      return view('admin.manage', compact('users'));
    }
}
