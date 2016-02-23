<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


// Route for deisplaying the page

Route::get('plan', 'PlanController@plan');
Route::get('manage', 'ManageController@manage');

// AuthController will be in charge of user registration and logging users in
// PasswordController will handle resetting forgotten passwords
Route::Controllers([
    'auth' => '\App\Http\Controllers\Auth\AuthController',
    'password' => '\App\Http\Controllers\Auth\PasswordController'

]);


// auth
Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
});


