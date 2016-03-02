@extends('layouts.app')

@section('content')

    <div class="task">
        <div class="page-header">
            <h1>
                {{ $task->body }}
                <br/>
                <small>Due {{ $task->date }}</small>
            </h1>
        </div>
        <div class="body panel panel-default" style="width: 95%; margin: auto;">
            <div class="panel-body">
                <h2>
                    Due:
                    <br/>
                    <small>{{ $task->date }}</small>
                </h2>
                <h2>
                    Lead:
                    <br/>
                    <small>{{ $task->lead }}</small>
                </h2>
                <h2>
                    Collaborators:
                    <br/>
                    <small>{{ $task->collaborators }}</small>
                </h2>
                <h2>
                    Success Measures:
                    <br/>
                    <small>{{ $task->success }}</small>
                </h2>
                <h2>
                    Status:
                    <br/>
                    <small>{{ $task->status }}</small>
                </h2>
            </div>
        </div>
    </div>

@stop
