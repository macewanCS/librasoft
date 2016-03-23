<?php

namespace App\Http\Controllers;

use App\Note;
use App\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;

class NotesController extends Controller
{
    public function store(Request $request, Task $task)
    {
        $task->addNote(new Note($request->all()));
        $task->setUpdatedAt(Carbon::now()->toDateTimeString());
        $task->save();

        return back();
    }

    public function show(Note $note){
        return view('notes.show')->with('note', $note);
    }
}
