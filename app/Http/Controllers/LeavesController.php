<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use DB;
use App\Http\Requests;

class LeavesController extends Controller
{
    public function index() {
    	$title = 'Manage Leaves';
    	$breadcrumbs = 'Manage Leaves';
          if ( !empty($searchFrm) ) {
            $employees = DB::table('calendar')
                ->select('users.keyenc','users.fullname', 'users.position', 'users.department', 'calendar.title', 'calendar.status')
                ->leftJoin('users', 'calendar.empid', '=', 'users.id')
                ->orWhere('calendar.status', '=', '0')
                ->orderBy('calendar.created_at', 'desc')
                ->orWhere('users.fullname', 'LIKE', '%'. $searchFrm . '%')
                ->orWhere('users.empno' , 'LIKE', '%'. $searchFrm . '%')
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
            $employees = DB::table('calendar')
                ->select('users.keyenc','users.fullname', 'users.position', 'users.department', 'calendar.title', 'calendar.status')
                ->leftJoin('users', 'calendar.empid', '=', 'users.id')
                ->orWhere('calendar.status', '=', '0')
                ->orderBy('calendar.created_at', 'desc')
                ->paginate(11);
                if($request->ajax()) {
              return [
                'employees' => $employees,
                'next_page' => $employees->nextPageUrl(),
                'prev_page' => $employees->previousPageUrl(),
                'pagination' => $employees->links()
              ];
            }
          }
    	return view::make('admin.manageleaves', compact('title', 'breadcrumbs', 'employees'));
    }
}