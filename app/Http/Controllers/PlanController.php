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

    public function createPlan() {
        return view('createPlan');
    }

    public function createGoal() {
        return view('createGoal');
    }

    public function createObj() {
        return view('createObj');
    }

    public function createAction() {
        return view('createAction');
    }

    public function createTask() {
        return view('createTask');
    }

    public function edit() {
        return view('plan.edit', compact(''));
    }
}
