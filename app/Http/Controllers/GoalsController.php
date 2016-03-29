<?php

namespace App\Http\Controllers;

use App\Objective;
use Illuminate\Http\Request;

use App\Goal;
use App\Plan;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class GoalsController extends Controller
{
    public function goal() {
        return view('goal');
    }

    public function show(Goal $goal){
        return view('goals.show')->with('goal', $goal);
    }

    public function newGoal() {
        return null;
    }
}
