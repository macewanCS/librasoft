<?php

namespace App\Http\Controllers;

use App\Objective;
use Illuminate\Http\Request;

use App\Goal;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class GoalsController extends Controller
{
    public function goal() {
        return view('goal');
    }


    public function index()
    {
        $goals = Goal::all();
        $objectives = Objective::all();
        $counter = 0;

        return view('Goal.index', compact('goals', 'counter', 'objectives'));

    }



    public function newGoal() {
        return null;
    }
}
