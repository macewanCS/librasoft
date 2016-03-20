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
}
