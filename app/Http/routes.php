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

//Temp Routes for plans
Route::get('/plans', 'PlansController@plan');
Route::get('/plans/new', 'PlansController@newPlan');

//Temp Routes for Goals
Route::get('/goals', 'GoalsController@goal');
Route::get('/goals/new', 'GoalsController@newGoal');

//Temp Routes for Objectives
Route::get('/objs', 'ObjsController@obj');
Route::get('/objs/new', 'ObjsController@newObjs');

//Temp Routes for Actions
Route::get('/actions', 'ActionsController@action');
Route::get('/actions/new', 'ActionsController@newAction');

//Temp Routes for Tasks
Route::get('/tasks', 'TasksController@task');
Route::get('/tasks/new', 'TasksController@newTask');



Route::get('plan', 'PlanController@plan');


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


