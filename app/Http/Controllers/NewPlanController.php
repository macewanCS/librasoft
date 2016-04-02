<?php

namespace App\Http\Controllers;

use App\Action;
use App\Goal;
use App\Objective;
use App\Plan;
use App\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;

class NewPlanController extends Controller
{
    public function showNewPlan()
    {
        return view('plans.newplan');
    }

    public function newPlan(Request $request)
    {
        $newplan = Plan::create($request->all());
        $newplan->save();
        return view('plans.addgoals')->with('plan', $newplan);
    }

    public function addGoal(Request $request, Plan $plan)
    {
        if (isset($request->add)) {
            $newgoal = Goal::create($request->all());
            $newgoal->plan_id = $plan->id;
            $newgoal->save();
            return view('plans.addgoals')->with('plan', $plan);
        }
        else {
            return view('plans.addobjectives')->with('plan', $plan);
        }
    }

    public function addObjective(Request $request, Plan $plan)
    {
        if (isset($request->add)) {
            $newobjective = Objective::create($request->all());
            $newobjective->save();
            return view('plans.addobjectives')->with('plan', $plan);
        } else {
            return view('plans.addactions')->with('plan', $plan);
        }
    }

    public function addAction(Request $request, Plan $plan)
    {
        if (isset($request->add)) {
            $newaction = Action::create($request->all());
            $newaction->date = Carbon::createFromFormat("Y-m-d", $request->duedate)->toDateTimeString();
            if (isset($request->collabs))
                $newaction->collaborators = implode("__,__", $request->collabs);
            $newaction->save();
            return view('plans.addactions')->with('plan', $plan);
        } else {
            return view('plans.addtasks')->with('plan', $plan);
        }
    }

    public function addTask(Request $request, Plan $plan)
    {
        $newtask = Task::create($request->all());
        $newtask->date = Carbon::createFromFormat("Y-m-d", $request->duedate)->toDateTimeString();
        if (isset($request->collabs))
            $newtask->collaborators = implode("__,__", $request->collabs);
        $newtask->save();
        return view('plans.addtasks')->with('plan', $plan);
    }
}
