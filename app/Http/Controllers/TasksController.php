<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TasksController extends Controller
{
    public function task() {
        return view('task');
    }

    public function newTask() {
        return null;
    }
}
