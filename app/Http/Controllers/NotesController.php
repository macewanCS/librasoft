<?php

namespace App\Http\Controllers;

use App\Note;
use App\Task;
use Illuminate\Http\Request;

use App\Http\Requests;

class NotesController extends Controller
{
    public function store(Request $request, Task $task)
    {
        $task->addNote(new Note($request->all()));

        return back();
    }
}
