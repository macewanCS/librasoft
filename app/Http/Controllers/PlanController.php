<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Controllers\DB;
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

        $plan = new Plan();
        $plan->startdate = Carbon::create($request->startdate,1,1,0,0,0);
        $plan->enddate = Carbon::create($request->enddate,1,1,0,0,0);
        $plan->save();
        return view('createDone');
    }

    public function edit() {
        return view('plan.edit', compact(''));
    }
}
