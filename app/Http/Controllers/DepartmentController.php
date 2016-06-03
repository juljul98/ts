<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use View;

class DepartmentController extends Controller
{
    public function index(){
      $title = 'Department and Position | Tracking System';
      return view::make('admin.department', compact('title'));
    }
}
