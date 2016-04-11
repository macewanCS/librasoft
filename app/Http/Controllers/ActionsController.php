<?php

namespace App\Http\Controllers;

use App\Action;
use App\Task;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ActionsController extends Controller
{
    public function action() {
        return view('action');
    }

    public function newAction() {
        return null;
    }
    public function show(Action $action)
    {
        return view('actions.show')->with('action', $action);
    }
    public function postSuccess(Request $request) {
        //get id
        $pk = $request->pk;

        $col = 'success';

        //get new success
        $value = $request->value;

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

    public function postDescription(Request $request) {
        //get id
        $pk = $request->pk;

        $col = 'body';

        //get new success
        $value = $request->value;

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

    public function postDate(Request $request) {
        //get id
        $pk = $request->pk;

        $col = 'date';

        //get new success
        $value = $request->value;

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

    public function postDepartment(Request $request) {
        //get id
        $pk = $request->pk;

        $col = 'owner';

        //get new success
        $value = $request->value;

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

    public function postLead(Request $request) {
        //get id
        $pk = $request->pk;

        $col = 'lead';

        $leads = $request->value;
        $value = implode("__,__", $leads);

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
    
    public function postCollab(Request $request) {
        //get id
        $pk = $request->pk;
        
        $col = 'collaborators';
        
        $collabs = $request->value;
        $value = implode("__,__", $collabs);
        
        //Get action data row where collabs are stored
        if ($finditem = Action::where('id', $pk)->update([$col => $value])) {
            return \Response::json(array('status' => 1));
        }
        else {
            return \Response::json(array('status' => 0));
        }
    }

    public function postStatus(Request $request) {
        //get id
        $pk = $request->pk;

        $col = 'status';

        //get new success
        $value = $request->value;

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

    public function remove(Action $action)
    {
        foreach($action->tasks as $task) {
            Task::destroy($task->id);
        }
        Action::destroy($action->id);
        return redirect('/plan');
    }

    public function MarkComplete(Action $action)
    {
        $action->status = "Completed";
        $action->save();

        foreach($action->tasks as $task) {
            if ($task->status != "Completed") {
                $task->status = "Completed";
                $task->save();
            }
        }
        return back();
    }
}
