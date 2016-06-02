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

class CalendarController extends Controller
{
    public function index() {
      $title = 'Calendar of Activities';
      return view::make('admin.calendar', compact('title'));
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
          $calendar->title = Input::get('title');
          $calendar->description = Input::get('description');
          $calendar->color = Input::get('color');
          $calendar->start_date = Input::get('start_date');
          $calendar->save();
          return response('Save');
        }
      
      

    }
  
    public function getSaveCalendar() {
      $getData = DB::table('calendar')->get();
      return response($getData);
      
    }
}
