<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::auth();
Route::controllers([
  'auth' => 'Auth\AuthController',
  'password' => 'Auth\PasswordController',
]);

//Login Route
Route::any('/auth', 'Auth\AuthController@authenticate');
Route::post('/saveData', 'Auth\AuthController@registration');
Route::get('/', 'Auth\AuthController@index');
Route::get('/getPosition', 'Auth\AuthController@getPosition');

//Admin Route Level 1
Route::group(['middleware' => ['auth', 'roles'], 'roles' => 'Administrator'], function(){
  // Dashboard
  Route::get('/admin', 'DashController@index');
  Route::get('/admin/getRegisteredEmployee', 'DashController@getRegisteredEmployee');
  Route::get('/admin/getPendingEmployee', 'DashController@getPendingEmployee');
  Route::post('/admin/getNotification', 'DashController@getNotification');
  Route::get('/admin/getCountForChart', 'DashController@getCountForChart');
  Route::get('/admin/getRecordByMonth', 'DashController@getRecordByMonth');
  
  // Manage Account
  Route::get('/manageaccounts', 'AccountsController@index');
  Route::post('/manageaccounts/getRecord', 'AccountsController@getRecord');
  Route::post('/manageaccounts/updateActive/{id}', 'AccountsController@updateActive');
  // Calendar
  Route::get('/department', 'DepartmentController@index');
  Route::get('/department/getRole', 'DepartmentController@getRole');
  Route::post('/department/saveDepartment', 'DepartmentController@saveDepartment');
  Route::post('/department/savePosition', 'DepartmentController@savePosition');
  Route::post('/department/getDepartmentNameForPosition', 'DepartmentController@getDepartmentNameForPosition');
  Route::post('/department/getAllRecord', 'DepartmentController@getAllRecord');
});

// User and Admin Route
Route::group(['middleware' => ['auth', 'roles'], 'roles' => ['Administrator', 'User']], function(){
  Route::get('/calendar', 'CalendarController@index');
  Route::post('/calendar/saveData', 'CalendarController@saveCalendar');
  Route::get('/calendar/getData', 'CalendarController@getSaveCalendar');
  Route::delete('/calendar/removeData/{id}', 'CalendarController@deleteEvent');
});
//User Route Level 3
Route::group(['middleware' => ['auth', 'roles'], 'roles' => 'User'], function(){
  //Home
  Route::any('/home', 'HomeController@index');
  Route::any('/message', 'ChatController@index');

});

// https://gist.github.com/drawmyattention/8cb599ee5dc0af5f4246. Credit to this.