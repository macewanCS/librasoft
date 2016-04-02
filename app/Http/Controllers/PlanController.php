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

    public function addNewAction(Request $request){
        $plan = Plan::first();
        $goal = $plan->goals->where('body', $request->goal);
        $objective = $goal->objectives->where('body', $request->objective);
        $action = new Action();
        $action->body = $request->body;
        $objective->addAction($action);
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
        $action1->date = Carbon::createFromFormat('Y-m-d', $request->dateA1);
        $action1->owner = $request->ownerA1;
        $action1->lead = $request->leadA1;
        $action1->collaborators = $request->collabA1;
        $action1->status = $request->statusA1;
        $action1->success = $request->successA1;
        $obj1->actions()->save($action1);


        //Add Action 2
        $action2 = new Action();
        $action2->body = $request->action2;
        $action2->date = Carbon::createFromFormat('Y-m-d', $request->dateA2);
        $action2->owner = $request->ownerA2;
        $action2->lead = $request->leadA2;
        $action2->collaborators = $request->collabA2;
        $action2->status = $request->statusA2;
        $action2->success = $request->successA2;
        $obj1->actions()->save($action2);

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
