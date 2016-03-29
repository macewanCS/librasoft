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
        return view('plan')->with('plan', Plan::first());
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
        $action1->date = Carbon::create($request->dateA1);
        $action1->owner = $request->ownerA1;
        $action1->lead = $request->leadA1;
        $action1->collaborators = $request->collabA1;
        $action1->status = $request->statusA1;
        $action1->success = $request->successA1;
        $obj1->actions()->save($action1);

        return view('createDone');
    }

    public function edit() {
        return view('plan.edit', compact(''));
    }
}
