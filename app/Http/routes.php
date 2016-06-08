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

//Admin Route Level 1
Route::group(['middleware' => ['auth', 'roles'], 'roles' => 'Administrator'], function(){
  // Dashboard
  Route::get('/admin', 'DashController@index');
  Route::post('/admin/getRegisteredEmployee', 'DashController@getRegisteredEmployee');
  Route::post('/admin/getPendingEmployee', 'DashController@getPendingEmployee');
  Route::post('/admin/getNotification', 'DashController@getNotification');
  // Manage Account
  Route::get('/manageaccount', 'ManageController@index');
  Route::post('/manageaccount/getRecord', 'ManageController@getRecord');
  Route::post('/manageaccount/updateActive/{id}', 'ManageController@updateActive');
  // Calendar

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