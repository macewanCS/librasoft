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

use App\Plan;

Route::get('/', function () {
    //$act = DB::table('actions')->orderby('updated_at', 'desc')->get();

    return view('welcome')->
        with('act',DB::table('actions')->orderby('updated_at', 'desc')->get())->
        with('tasks', DB::table('tasks')->orderby('updated_at', 'desc')->get())->
        with('notes', DB::table('notes')->orderby('created_at', 'desc')->get());
});



// Route for displaying the page

Route::get('plan', 'PlanController@plan');

Route::post('plan/{plan}/goals', 'PlanController@addNewGoal');
Route::post('plan/{plan}/goal/objective', 'PlanController@addNewObjective');
Route::post('plan/{plan}/goal/objective/action', 'PlanController@addNewAction');
Route::post('plan/{plan}/goal/objective/action/task','PlanController@addNewTask');
Route::get('get/objective', 'PlanController@getObjectives');
Route::post('get/objective', 'PlanController@getObjectives');

Route::get('addUser', 'RegisterController@register');
Route::post('addUser','RegisterController@addNewUser');


Route::get('manage', 'ManageController@manage');
Route::get('tasks/{task}', 'TasksController@show');

Route::post('tasks/{task}/notes', 'NotesController@store');

Route::get('sort/{plan}/{option}', function ($plan, $option) {return view ('sort')->with('option', $option)->with('plan', Plan::findOrFail($plan));});
Route::get('sort/{plan}/dept/{dept}', function ($dept) {return view ('filterbyteamdept')->with('dept', $dept);});
Route::get('sort/{plan}/team/{dept}', function ($dept) {return view ('filterbyteamdept')->with('dept', $dept);});

Route::get('notes/show/{note}', 'NotesController@show');
Route::get('goals/show/{goal}', 'GoalsController@show');
Route::get('departments/show/{department}', 'DepartmentsController@show');
Route::get('actions/show/{action}', 'ActionsController@show');
Route::get('tasks/show/{task}', 'TasksController@show');
Route::get('teams/show/{team}', 'TeamsController@show');
Route::get('users/show/{id}', 'ProfileController@show');
Route::get('objectives/show/{objective}', 'ObjsController@show');
Route::get('print/{plan}', 'ExportController@minimal');

Route::post('search', 'SearchController@search');
Route::get("export/tsv/{plan}", 'ExportController@tabs');
Route::get("tasks/{task}/markcomplete", "TasksController@MarkComplete");
Route::get('plan/new', 'PlanController@showPlan');
Route::get("plan/{plan}", "PlanController@show");
Route::get("createplan", "NewPlanController@showNewPlan");
Route::post("createplan/addplan", "NewPlanController@newPlan");
Route::post("createplan/{plan}/addgoals", "NewPlanController@addGoal");
Route::post("createplan/{plan}/addobjectives", "NewPlanController@addObjective");
Route::post("createplan/{plan}/addactions", "NewPlanController@addAction");
Route::post("createplan/{plan}/addtasks", "NewPlanController@addTask");

// AuthController will be in charge of user registration and logging users in
// PasswordController will handle resetting forgotten passwords
Route::Controllers([
    'auth' => '\App\Http\Controllers\Auth\AuthController',
    'password/reset' => '\App\Http\Controllers\Auth\PasswordController'

]);

Route::auth();
// auth
Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/', function () {
        //$act = DB::table('actions')->orderby('updated_at', 'desc')->get();
        return view('welcome')->
        with('act',DB::table('actions')->orderby('updated_at', 'desc')->get())->
        with('tasks', DB::table('tasks')->orderby('updated_at', 'desc')->get())->
        with('notes', DB::table('notes')->orderby('created_at', 'desc')->get());
    });

    Route::get('plan', 'PlanController@plan');
    Route::get('manage', 'ManageController@manage');
    Route::get('plan/new', 'PlanController@showPlan');
    Route::post('plan/new', 'PlanController@createPlan');
    Route::get('plan/done', 'PlanController@showDone');
    Route::get('mywork', 'MyWorkController@work');
    Route::get('profile/{user}', 'ProfileController@profile');
    Route::get('usermanagement', 'RegisterController@register');
    Route::post('register', 'Auth\AuthController@create');
    Route::post('edituser', 'RegisterController@edit');
    Route::post('update', 'RegisterController@update');
    Route::get('changepassword', function() { return view('auth.changepassword'); });
    Route::post('changepassword', 'RegisterController@changepassword');
    Route::get('tasks/{task}', 'TasksController@show');
    Route::get("plan/{plan}", "PlanController@show");

    Route::post('tasks/{task}/notes', 'NotesController@store');

    Route::post('tasks/{task}/notes', 'NotesController@store');

    Route::get('sort/{plan}/{option}', function (Plan $plan, $option) {return view ('sort')->with('option', $option)->with('plan', $plan);});
    Route::get('sort/{plan}/dept/{dept}', function (Plan $plan, $dept) {return view ('filterbyteamdept')->with('dept', $dept)->with('plan', $plan);});
    Route::get('sort/{plan}/team/{dept}', function (Plan $plan, $dept) {return view ('filterbyteamdept')->with('dept', $dept)->with('plan', $plan);});

    Route::get('notes/show/{note}', 'NotesController@show');
    Route::get('goals/show/{goal}', 'GoalsController@show');
    Route::get('departments/show/{department}', 'DepartmentsController@show');
    Route::get('actions/show/{action}', 'ActionsController@show');
    Route::get('tasks/show/{task}', 'TasksController@show');
    Route::get('teams/show/{team}', 'TeamsController@show');
    Route::get('users/show/{id}', 'ProfileController@show');
    Route::get('objectives/show/{objective}', 'ObjsController@show');
    Route::get('print', 'ExportController@minimal');

    Route::post('search', 'SearchController@search');
    Route::get("export/tsv", 'ExportController@tabs');

    Route::get("createplan", "NewPlanController@showNewPlan");
    Route::post("createplan/addplan", "NewPlanController@newPlan");
    Route::post("createplan/{plan}/addgoals", "NewPlanController@addGoal");
    Route::post("createplan/{plan}/addobjectives", "NewPlanController@addObjective");
    Route::post("createplan/{plan}/addactions", "NewPlanController@addAction");
    Route::post("createplan/{plan}/addtasks", "NewPlanController@addTask");


});

Route::get('plan/edit', 'PlanController@edit');
Route::post('plan/action/success', 'ActionsController@postSuccess');
Route::post('plan/action/description', 'ActionsController@postDescription');
Route::post('plan/action/date', 'ActionsController@postDate');
Route::post('plan/action/department', 'ActionsController@postDepartment');
Route::post('plan/action/lead', 'ActionsController@postLead');
Route::post('plan/action/status', 'ActionsController@postStatus');

Route::post('plan/task/success', 'TasksController@postSuccess');
Route::post('plan/task/description', 'TasksController@postTask');
Route::post('plan/task/date', 'TasksController@postTaskDate');
Route::post('plan/task/department', 'TasksController@postDepartment');
Route::post('plan/task/lead', 'TasksController@postLead');
Route::post('plan/task/status', 'TasksController@postStatus');

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


