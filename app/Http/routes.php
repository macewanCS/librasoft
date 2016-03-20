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
    return view('welcome')->with('plan', \App\Plan::first());
});



// Route for displaying the page

Route::get('plan', 'PlanController@plan');
Route::get('manage', 'ManageController@manage');
Route::get('goal', 'GoalsController@index');
Route::get('tasks/{task}', 'TasksController@show');

Route::post('tasks/{task}/notes', 'NotesController@store');

Route::get('sort/{option}', function ($option) {return view ('sort')->with('option', $option);});
Route::get('sort/dept/{dept}', function ($dept) {return view ('filterbyteamdept')->with('dept', $dept);});
Route::get('sort/team/{dept}', function ($dept) {return view ('filterbyteamdept')->with('dept', $dept);});

// AuthController will be in charge of user registration and logging users in
// PasswordController will handle resetting forgotten passwords
Route::Controllers([
    'auth' => '\App\Http\Controllers\Auth\AuthController',
    'password/reset' => '\App\Http\Controllers\Auth\PasswordController'

]);


// auth
Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/', function () {
        return view('welcome')->with('plan', \App\Plan::first());
    });

    Route::get('plan', 'PlanController@plan');
    Route::get('manage', 'ManageController@manage');
    Route::get('plan/new', 'PlanController@showPlan');
    Route::post('plan/new', 'PlanController@createPlan');
    Route::get('plan/new/goal', 'PlanController@showGoal');
    Route::get('plan/new/obj', 'PlanController@showObj');
    Route::get('plan/new/action', 'PlanController@showAction');
    Route::get('plan/new/task', 'PlanController@showTask');
    Route::get('plan/done', 'PlanController@showDone');
    Route::get('mywork', 'MyWorkController@work');
    Route::get('profile/{user}', 'ProfileController@profile');
    Route::get('register', 'RegisterController@register');
    Route::post('register', 'Auth\AuthController@create');
});

Route::get('plan/edit', 'PlanController@edit');








//BLADE ROLE AND PERMISSION DIRECTIVES
// role
Blade::directive('role', function ($expression) {
    return "<?php if (Auth::check() && Auth::User()->is{$expression}): ?>";
});

Blade::directive('endrole', function () {
    return "<?php endif; ?>";
});

// permission
Blade::directive('permission', function ($expression) {
    return "<?php if (Auth::check() && Auth::User()->can{$expression}): ?>";
});

Blade::directive('endpermission', function () {
    return "<?php endif; ?>";
});


