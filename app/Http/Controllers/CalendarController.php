<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use App\Http\Requests;
use App\Calendar;
use Input;
use DB;
use Response;
use Validator;
use Auth;

class CalendarController extends Controller
{
    public function index() {
      $title = 'Calendar of Activities';
      $breadcrumbs = 'Calendar';
      return view::make('admin.calendar', compact('title', 'breadcrumbs'));
    }
  
    public function saveCalendar() {
      
      $files = [
        'title' => Input::get('title'),
        'description' => Input::get('description'),
        'start_date' => Input::get('start_date')
      ];

      $rules = [
        'title' => 'required',
        'start_date' => 'required'
      ];
      
      $validator = Validator::make($files, $rules);
      
        if($validator->fails()) {
          return response('Error');
        } else {
          $calendar = new Calendar;
          $calendar->empid = Auth::user()->id;
          $calendar->title = Input::get('title');
          $calendar->description = htmlspecialchars(Input::get('description'));
          $calendar->color = Input::get('color');
          $calendar->start_date = Input::get('start_date');
          $calendar->data_type = Input::get('data_type');
          $calendar->status = Input::get('data_status');
          $calendar->save();
          return response('Save');
        }
    }
  
    public function getSaveCalendar() {
      $getData = DB::table('calendar')
            ->orWhere('empid', '=', Auth::user()->id)
            ->get();
      return response($getData);
    }
  
    public function deleteEvent($id) {
      $calendar = Calendar::find($id);
      $calendar->delete();
      return response('Delete');
    }
}
