<?php

namespace App\Http\Controllers;

use App\Action;
use App\Objective;
use App\Task;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ObjsController extends Controller
{
    public function obj() {
        return view('obj');
    }

    public function newObjs() {
        return null;
    }

    public function show(Objective $objective){
        return view('objectives.show')->with('objective', $objective);
    }

    public function remove(Objective $objective)
    {
        foreach ($objective->actions as $action) {
            foreach($action->tasks as $task) {
                Task::destroy($task->id);
            }
            Action::destroy($action->id);
        }
        Objective::destroy($objective->id);
        return redirect('/plan');
    }
}
