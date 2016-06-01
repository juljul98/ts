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

//Login Route
Route::any('/auth', 'Auth\AuthController@authenticate');
Route::post('/saveData', 'Auth\AuthController@registration');

//Admin Route Level 1

  Route::get('/admin', 'DashController@index');
  Route::post('/admin/getRegisteredEmployee', 'DashController@getRegisteredEmployee');
  Route::post('/admin/getPendingEmployee', 'DashController@getPendingEmployee');
  Route::post('/admin/getNotification', 'DashController@getNotification');
  
  Route::post('/manageaccount/seenNotification', 'DashController@seenNotification');
  Route::get('/manageaccount', 'ManageController@index');
  Route::post('/manageaccount/getRecord', 'ManageController@getRecord');
  Route::post('/manageaccount/updateActive/{id}', 'ManageController@updateActive');
  
  Route::get('/calendar', 'CalendarController@index');
  Route::post('/calendar/saveData', 'CalendarController@saveCalendar');
  Route::get('/calendar/getData', 'CalendarController@getSaveCalendar');


// Admin Close

//Associate Route Level 2

// Associate Close


Route::controllers([
  'auth' => 'Auth\AuthController',
  'password' => 'Auth\PasswordController',
]);

Route::any('/home', 'homeController@index');
Route::get('/', 'Auth\AuthController@index');

