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



// Route for displaying the page

Route::get('plan', 'PlanController@plan');
Route::get('manage', 'ManageController@manage');
Route::get('goal', 'GoalsController@index');
Route::get('tasks/{task}', 'TasksController@show');

Route::post('tasks/{task}/notes', 'NotesController@store');

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
        return view('welcome');
    });

    Route::get('plan', 'PlanController@plan');
    Route::get('manage', 'ManageController@manage');
    Route::get('plan/new', 'PlanController@createPlan');
    Route::get('plan/new/goal', 'PlanController@createGoal');
    Route::get('plan/new/obj', 'PlanController@createObj');
    Route::get('plan/new/action', 'PlanController@createAction');
    Route::get('plan/new/task', 'PlanController@createTask');
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


