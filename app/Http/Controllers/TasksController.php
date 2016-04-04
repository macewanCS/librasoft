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

    public function postSuccess(Request $request) {
        //get id
        $pk = $request->pk;

        $col = 'success';

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

        $leads = $request->value;
        $value = implode("__,__", $leads);

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

    public function MarkComplete(Task $task)
    {
        $task->status = "Completed";
        $task->save();

        if (count($task->action->tasks->where('status', 'Completed')->all()) == count($task->action->tasks->all())) {
            $task->action->status = "Completed";
            $task->action->save();
        }
        return back();
    }

    public function postStatus(Request $request) {
        //get id
        $pk = $request->pk;

        $col = 'status';

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
}
