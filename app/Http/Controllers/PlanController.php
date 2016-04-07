<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;


use App\Http\Controllers\DB;
use App\Plan;
use App\Goal;
use App\Objective;
use App\Action;
use App\Task;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class PlanController extends Controller
{
    public function plan()
    {
        return view('plans.plan')->with('plan', Plan::first());
    }

    public function addNewGoal(Request $request){
        $plans = Plan::all();
        $plan = $plans->where('startdate', $request->plan)->first();
        $goal = new Goal();
        $goal->body = $request->body;
        //$goal->plan_id = $plan->id;
        $plan->goals()->save($goal);
        $plan->addGoal($goal);
        return back();
    }

    public function addNewObjective(Request $request){
        $plans = Plan::all();
        $plan = $plans->where('startdate', $request->plan)->first();
        $goal = $plan->goals->where('body', $request->goal)->first();
        $objective = new Objective();
        $objective->body = $request->body;
        $goal->addObjectives($objective);
        return back();
    }

    public function getObjectives(){
        $inputGoal = Input::get('goal');
        $planYear = Input::get('plan');

        $objectiveBodys = array(null);

        $plans = Plan::all();
        $plan = $plans->where('startdate', $planYear)->first();

        $goal = $plan->goals->where('body', $inputGoal)->first();
        $objectives = $goal->objectives;

        foreach($objectives as $objective){
            array_push($objectiveBodys, $objective->body);
        }
        return json_encode($objectiveBodys);

    }

    public function getActions(){
        $planYear = Input::get('plan');
        $inputGoal = Input::get('goal');
        $inputObjective = Input::get('objective');

        $ActionBodys = array(null);

        $plans = Plan::all();
        $plan = $plans->where('startdate', $planYear)->first();

        $goal = $plan->goals->where('body', $inputGoal)->first();
        $objective = $goal->objectives->where('body', $inputObjective)->first();
        $actions = $objective->actions;

        foreach($actions as $action){
            array_push($ActionBodys, $action->body);
        }
        return json_encode($ActionBodys);
    }


    public function addNewAction(Request $request){
        $plans = Plan::all();
        $plan = $plans->where('startdate', $request->plan)->first();
        $goal = $plan->goals->where('body', $request->goal)->first();
        $objective = $goal->objectives->where('body', $request->objective)->first();
        $action = new Action();
        $action->body = $request->body;
        $objective->addAction($action);
        return back();
    }

    public function addNewTask(Request $request){
        $plans = Plan::all();
        $plan = $plans->where('startdate', $request->plan)->first();
        $goal = $plan->goals->where('body', $request->goal)->first();
        $objective = $goal->objectives->where('body', $request->objective)->first();
        $action = $objective->actions->where('body', $request->action)->first();
        $task = new Task();
        $task->body = $request->body;
        $action->addTask($task);
        return back();
    }


    public function showPlan() {
        return view('createPlan');
    }

    public function createPlan(Request $request) {
        //Create the plan
        $plan = new Plan();
        $plan->startdate = Carbon::create($request->startdate,1,1,0,0,0);
        $plan->enddate = Carbon::create($request->enddate,1,1,0,0,0);
        $plan->save();

        //Add Goal 1
        $goal1 = new Goal();
        $goal1->body = $request->goal1;
        $plan->goals()->save($goal1);

        //Add Goal 2
        $goal2 = new Goal();
        $goal2->body = $request->goal2;
        $plan->goals()->save($goal2);

        //Add Objective 1
        $obj1 = new Objective();
        $obj1->body = $request->obj1;
        $goal1->objectives()->save($obj1);

        //Add Objective 2
        $obj2 = new Objective();
        $obj2->body = $request->obj2;
        $goal1->objectives()->save($obj2);

        //Add Objective 3
        $obj3 = new Objective();
        $obj3->body = $request->obj3;
        $goal2->objectives()->save($obj3);

        //Add Objective 4
        $obj4 = new Objective();
        $obj4->body = $request->obj4;
        $goal2->objectives()->save($obj4);

        //Add Action 1
        $action1 = new Action();
        $action1->body = $request->action1;
        if ($request->dateA1 != null) {
            $action1->date = Carbon::createFromFormat('Y-m-d', $request->dateA1);
        }
        else {
            $action1->date = "";
        }
        $action1->owner = $request->ownerA1;
        $action1->lead = implode('__,__', $request->leadA1);
        $action1->collaborators = implode('__,__', $request->collabA1);
        $action1->status = $request->statusA1;
        $action1->success = $request->successA1;
        $obj1->actions()->save($action1);


        //Add Action 2
        $action2 = new Action();
        $action2->body = $request->action2;
        if ($request->dateA2 != null) {
            $action1->date = Carbon::createFromFormat('Y-m-d', $request->dateA2);
        }
        else {
            $action1->date = "";
        }
        $action2->owner = $request->ownerA2;
        $action2->lead = implode('__,__', $request->leadA2);
        $action2->collaborators = implode('__,__', $request->collabA2);
        $action2->status = $request->statusA2;
        $action2->success = $request->successA2;
        $obj1->actions()->save($action2);

        //Add Action 3
        $action3 = new Action();
        $action3->body = $request->action3;
        if ($request->dateA3 != null) {
            $action3->date = Carbon::createFromFormat('Y-m-d', $request->dateA3);
        }
        else {
            $action3->date = "";
        }
        $action3->owner = $request->ownerA3;
        $action3->lead = implode('__,__', $request->leadA3);
        $action3->collaborators = implode('__,__', $request->collabA3);
        $action3->status = $request->statusA3;
        $action3->success = $request->successA3;
        $obj2->actions()->save($action3);


        //Add Action 4
        $action4 = new Action();
        $action4->body = $request->action4;
        if ($request->dateA4 != null) {
            $action4->date = Carbon::createFromFormat('Y-m-d', $request->dateA4);
        }
        else {
            $action4->date = "";
        }
        $action4->owner = $request->ownerA4;
        $action4->lead = implode('__,__', $request->leadA4);
        $action4->collaborators = implode('__,__', $request->collabA4);
        $action4->status = $request->statusA4;
        $action4->success = $request->successA4;
        $obj2->actions()->save($action4);

        //Add Action 5
        $action5 = new Action();
        $action5->body = $request->action5;
        if ($request->dateA5 != null) {
            $action5->date = Carbon::createFromFormat('Y-m-d', $request->dateA5);
        }
        else {
            $action5->date = "";
        }
        $action5->owner = $request->ownerA5;
        $action5->lead = implode('__,__', $request->leadA5);
        $action5->collaborators = implode('__,__', $request->collabA5);
        $action5->status = $request->statusA5;
        $action5->success = $request->successA5;
        $obj3->actions()->save($action5);


        //Add Action 6
        $action6 = new Action();
        $action6->body = $request->action6;
        if ($request->dateA6 != null) {
            $action6->date = Carbon::createFromFormat('Y-m-d', $request->dateA6);
        }
        else {
            $action6->date = "";
        }
        $action6->owner = $request->ownerA6;
        $action6->lead = implode('__,__', $request->leadA5);
        $action6->collaborators = implode('__,__', $request->collabA6);
        $action6->status = $request->statusA6;
        $action6->success = $request->successA6;
        $obj3->actions()->save($action6);

        //Add Action 7
        $action7 = new Action();
        $action7->body = $request->action7;
        if ($request->dateA7 != null) {
            $action7->date = Carbon::createFromFormat('Y-m-d', $request->dateA7);
        }
        else {
            $action7->date = "";
        }
        $action7->owner = $request->ownerA7;
        $action7->lead = implode('__,__', $request->leadA7);
        $action7->collaborators = implode('__,__', $request->collabA7);
        $action7->status = $request->statusA7;
        $action7->success = $request->successA7;
        $obj4->actions()->save($action7);


        //Add Action 4
        $action8 = new Action();
        $action8->body = $request->action8;
        if ($request->dateA8 != null) {
            $action8->date = Carbon::createFromFormat('Y-m-d', $request->dateA8);
        }
        else {
            $action8->date = "";
        }
        $action8->owner = $request->ownerA8;
        $action8->lead = implode('__,__', $request->leadA8);
        $action8->collaborators = implode('__,__', $request->collabA8);;
        $action8->status = $request->statusA8;
        $action8->success = $request->successA8;
        $obj4->actions()->save($action8);

        //Tasks
        //Add Task 1
        $task1 = new Task();
        $task1->body = $request->task1;
        if ($request->dateT1 != null) {
            $task1->date = Carbon::createFromFormat('Y-m-d', $request->dateT1);
        }
        else {
            $task1->date = "";
        }
        $task1->owner = $request->ownerT1;
        $task1->lead = implode('__,__', $request->leadT1);
        $task1->collaborators = implode('__,__', $request->collabT1);
        $task1->status = $request->statusT1;
        $task1->success = $request->successT1;
        $action1->tasks()->save($task1);

        //Add Task 2
        $task2 = new Task();
        $task2->body = $request->task2;
        if ($request->dateT2 != null) {
            $task2->date = Carbon::createFromFormat('Y-m-d', $request->dateT2);
        }
        else {
            $task2->date = "";
        }
        $task2->owner = $request->ownerT2;
        $task2->lead = implode('__,__', $request->leadT2);
        $task2->collaborators = implode('__,__', $request->collabT2);
        $task2->status = $request->statusT2;
        $task2->success = $request->successT2;
        $action1->tasks()->save($task2);

        //Add Task 3
        $task3 = new Task();
        $task3->body = $request->task3;
        if ($request->dateT3 != null) {
            $task3->date = Carbon::createFromFormat('Y-m-d', $request->dateT3);
        }
        else {
            $task3->date = "";
        }
        $task3->owner = $request->ownerT3;
        $task3->lead = implode('__,__', $request->leadT3);
        $task3->collaborators = implode('__,__', $request->collabT3);
        $task3->status = $request->statusT3;
        $task3->success = $request->successT3;
        $action2->tasks()->save($task3);

        //Add Task 4
        $task4 = new Task();
        $task4->body = $request->task4;
        if ($request->dateT4 != null) {
            $task4->date = Carbon::createFromFormat('Y-m-d', $request->dateT4);
        }
        else {
            $task4->date = "";
        }
        $task4->owner = $request->ownerT4;
        $task4->lead = implode('__,__', $request->leadT4);
        $task4->collaborators = implode('__,__', $request->collabT4);
        $task4->status = $request->statusT4;
        $task4->success = $request->successT4;
        $action2->tasks()->save($task4);

        //Add Task 5
        $task5 = new Task();
        $task5->body = $request->task5;
        if ($request->dateT5 != null) {
            $task5->date = Carbon::createFromFormat('Y-m-d', $request->dateT5);
        }
        else {
            $task5->date = "";
        }
        $task5->owner = $request->ownerT5;
        $task5->lead = implode('__,__', $request->leadT5);
        $task5->collaborators = implode('__,__', $request->collabT5);
        $task5->status = $request->statusT5;
        $task5->success = $request->successT5;
        $action3->tasks()->save($task5);

        //Add Task 6
        $task6 = new Task();
        $task6->body = $request->task6;
        if ($request->dateT6 != null) {
            $task6->date = Carbon::createFromFormat('Y-m-d', $request->dateT6);
        }
        else {
            $task6->date = "";
        }
        $task6->owner = $request->ownerT6;
        $task6->lead = implode('__,__', $request->leadT6);
        $task6->collaborators = implode('__,__', $request->collabT6);
        $task6->status = $request->statusT6;
        $task6->success = $request->successT6;
        $action3->tasks()->save($task6);

        //Add Task 7
        $task7 = new Task();
        $task7->body = $request->task7;
        if ($request->dateT7 != null) {
            $task7->date = Carbon::createFromFormat('Y-m-d', $request->dateT7);
        }
        else {
            $task7->date = "";
        }
        $task7->owner = $request->ownerT7;
        $task7->lead = implode('__,__', $request->leadT7);
        $task7->collaborators = implode('__,__', $request->collabT7);
        $task7->status = $request->statusT7;
        $task7->success = $request->successT7;
        $action4->tasks()->save($task7);

        //Add Task 8
        $task8 = new Task();
        $task8->body = $request->task8;
        if ($request->dateT8 != null) {
            $task8->date = Carbon::createFromFormat('Y-m-d', $request->dateT8);
        }
        else {
            $task8->date = "";
        }
        $task8->owner = $request->ownerT8;
        $task8->lead = implode('__,__', $request->leadT8);
        $task8->collaborators = implode('__,__', $request->collabT8);
        $task8->status = $request->statusT8;
        $task8->success = $request->successT8;
        $action4->tasks()->save($task8);

        //Add Task 9
        $task9 = new Task();
        $task9->body = $request->task9;
        if ($request->dateT9 != null) {
            $task9->date = Carbon::createFromFormat('Y-m-d', $request->dateT9);
        }
        else {
            $task9->date = "";
        }
        $task9->owner = $request->ownerT9;
        $task9->lead = implode('__,__', $request->leadT9);
        $task9->collaborators = implode('__,__', $request->collabT9);
        $task9->status = $request->statusT9;
        $task9->success = $request->successT9;
        $action5->tasks()->save($task9);

        //Add Task 10
        $task10 = new Task();
        $task10->body = $request->task10;
        if ($request->dateT10 != null) {
            $task10->date = Carbon::createFromFormat('Y-m-d', $request->dateT10);
        }
        else {
            $task10->date = "";
        }
        $task10->owner = $request->ownerT10;
        $task10->lead = implode('__,__', $request->leadT10);
        $task10->collaborators = implode('__,__', $request->collabT10);
        $task10->status = $request->statusT10;
        $task10->success = $request->successT10;
        $action5->tasks()->save($task10);

        //Add Task 11
        $task11 = new Task();
        $task11->body = $request->task11;
        if ($request->dateT11 != null) {
            $task11->date = Carbon::createFromFormat('Y-m-d', $request->dateT11);
        }
        else {
            $task11->date = "";
        }
        $task11->owner = $request->ownerT11;
        $task11->lead = implode('__,__', $request->leadT11);
        $task11->collaborators = implode('__,__', $request->collabT11);
        $task11->status = $request->statusT11;
        $task11->success = $request->successT11;
        $action6->tasks()->save($task11);

        //Add Task 4
        $task12 = new Task();
        $task12->body = $request->task12;
        if ($request->dateT12 != null) {
            $task12->date = Carbon::createFromFormat('Y-m-d', $request->dateT12);
        }
        else {
            $task12->date = "";
        }
        $task12->owner = $request->ownerT12;
        $task12->lead = implode('__,__', $request->leadT12);
        $task12->collaborators = implode('__,__', $request->collabT12);
        $task12->status = $request->statusT12;
        $task12->success = $request->successT12;
        $action6->tasks()->save($task12);

        //Add Task 13
        $task13 = new Task();
        $task13->body = $request->task13;
        if ($request->dateT13 != null) {
            $task13->date = Carbon::createFromFormat('Y-m-d', $request->dateT13);
        }
        else {
            $task13->date = "";
        }
        $task13->owner = $request->ownerT13;
        $task13->lead = implode('__,__', $request->leadT13);
        $task13->collaborators = implode('__,__', $request->collabT13);
        $task13->status = $request->statusT13;
        $task13->success = $request->successT13;
        $action7->tasks()->save($task13);

        //Add Task 14
        $task14 = new Task();
        $task14->body = $request->task14;
        if ($request->dateT14 != null) {
            $task14->date = Carbon::createFromFormat('Y-m-d', $request->dateT14);
        }
        else {
            $task14->date = "";
        }
        $task14->owner = $request->ownerT14;
        $task14->lead = implode('__,__', $request->leadT14);
        $task14->collaborators = implode('__,__', $request->collabT14);
        $task14->status = $request->statusT14;
        $task14->success = $request->successT14;
        $action7->tasks()->save($task14);

        //Add Task 15
        $task15 = new Task();
        $task15->body = $request->task15;
        if ($request->dateT15 != null) {
            $task15->date = Carbon::createFromFormat('Y-m-d', $request->dateT15);
        }
        else {
            $task15->date = "";
        }
        $task15->owner = $request->ownerT15;
        $task15->lead = implode('__,__', $request->leadT15);
        $task15->collaborators = implode('__,__', $request->collabT15);
        $task15->status = $request->statusT15;
        $task15->success = $request->successT15;
        $action8->tasks()->save($task15);

        //Add Task 16
        $task16 = new Task();
        $task16->body = $request->task16;
        if ($request->dateT16 != null) {
            $task16->date = Carbon::createFromFormat('Y-m-d', $request->dateT16);
        }
        else {
            $task16->date = "";
        }
        $task16->owner = $request->ownerT16;
        $task16->lead = implode('__,__', $request->leadT16);
        $task16->collaborators = implode('__,__', $request->collabT16);
        $task16->status = $request->statusT16;
        $task16->success = $request->successT16;
        $action8->tasks()->save($task16);

        return view('createDone');
    }

    public function edit() {
        return view('plan.edit', compact(''));
    }

    public function show(Plan $plan)
    {
        return view('plans.plan')->with('plan', $plan);
    }
}
