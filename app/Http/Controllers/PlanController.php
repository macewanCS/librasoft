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

    public function createPlan(Request $request) {
        Plan::first()->addPlan(new Plan($request->all()));
        return view('createDone');
    }

    public function edit() {
        return view('plan.edit', compact(''));
    }
}
