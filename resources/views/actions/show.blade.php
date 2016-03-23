@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading"><h4 class="panel-title">{{ $action->body }}</h4></div>
        <div class="panel-body">
            <h4>Tasks</h4>
            <table class="table table-bordered table-striped table-hover">
                @foreach($action->tasks as $task)
                    <tr>
                        <td><a href="/tasks/show/{{ $task->id }}">{{ $task->body }}</a></td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

@stop
