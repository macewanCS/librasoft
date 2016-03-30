<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TasksController extends Controller
{
    public function task() {
        return view('task');
    }

    public function show(Task $task){
        return view('tasks.show')->with('task', $task);
    }

    public function index()
    {
        return view ('tasks.index')->with('tasks', Task::all());
    }

    public function newTask() {
        return null;
    }

    public function postTask(Request $request) {
        //get id
        $pk = $request->pk;

        $col = 'body';

        //get new success
        $value = $request->value;

        //Get action data row where success is stored
        if ($finditem = Task::where('id', $pk)->update([$col => $value]))
        {
            return \Response::json(array('status' => 1));
        }
        else
        {
            return \Response::json(array('status' => 0));
        }
    }

    public function postTaskDate(Request $request) {
        //get id
        $pk = $request->pk;

        $col = 'date';

        //get new success
        $value = $request->value;

        //Get action data row where success is stored
        if ($finditem = Task::where('id', $pk)->update([$col => $value]))
        {
            return \Response::json(array('status' => 1));
        }
        else
        {
            return \Response::json(array('status' => 0));
        }
    }

    public function postDepartment(Request $request) {
        //get id
        $pk = $request->pk;

        $col = 'owner';

        //get new success
        $value = $request->value;

        //Get action data row where success is stored
        if ($finditem = Task::where('id', $pk)->update([$col => $value]))
        {
            return \Response::json(array('status' => 1));
        }
        else
        {
            return \Response::json(array('status' => 0));
        }
    }

    public function postLead(Request $request) {
        //get id
        $pk = $request->pk;

        $col = 'lead';

        //get new success
        $value = $request->value;
        $value = User::where('name', $value);

        //Get action data row where success is stored
        if ($finditem = Action::where('id', $pk)->update([$col => $value]))
        {
            return \Response::json(array('status' => 1));
        }
        else
        {
            return \Response::json(array('status' => 0));
        }
    }

    public function MarkComplete(Task $task)
    {
        $task->status = "Completed";
        $task->save();
        return back();
    }
}
