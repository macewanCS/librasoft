<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Plan;
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

    public function createPlan(Request $request, Plan $plan) {
        $plan->addPlan(new Plan($request->all()));
        return view('createGoal');
    }

    public function showGoal() {
        return view('createGoal');
    }

    public function createGoal(Request $request, Goal $goal) {
        $goal->addGoal(new Goal($request->all()));
        return view('createObj');
    }

    public function showObj() {
        return view('createObj');
    }

    public function createObjective(Request $request, Objective $objective) {
        $objective->addObjective(new Objective($request->all()));
        return view('createAction');
    }

    public function showAction() {
        return view('createAction');
    }

    public function createAction(Request $request, Action $action) {
        $action->addAction(new Action($request->all()));
        return view('createTask');
    }

    public function showTask() {
        return view('createTask');
    }

    public function createTask(Request $request, Task $task) {
        $task->addTask(new Task($request->all()));
        return view('createDone');
    }

    public function showDone() {
        return view('createDone');
    }

    public function edit() {
        return view('plan.edit', compact(''));
    }
}
