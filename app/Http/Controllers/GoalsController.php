<?php

namespace App\Http\Controllers;

use App\Action;
use App\Objective;
use App\Task;
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

    public function remove(Goal $goal)
    {
        if($goal->body == "Non-Business Plan")
            return back();
        
        foreach($goal->objectives as $objective) {
            foreach ($objective->actions as $action) {
                foreach($action->tasks as $task) {
                    Task::destroy($task->id);
                }
                Action::destroy($action->id);
            }
            Objective::destroy($objective->id);
        }
        Goal::destroy($goal->id);
        return redirect('/plan');
    }
}
