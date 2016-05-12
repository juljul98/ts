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

//Admin Route
Route::get('/admin', 'adminController@index');
Route::get('/manageaccount', 'manageController@index');

Route::controllers([
  'auth' => 'Auth\AuthController',
  'password' => 'Auth\PasswordController',
]);

Route::any('/home', 'homeController@index');




