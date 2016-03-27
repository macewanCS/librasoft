@extends('layouts.app')

@section('content')

    <div class="bs-example">
        <div class="panel panel-primary">
            <div class="panel-heading" style="background: #009FD7;"><h4 class="panel-title">{{ $department->name }}</h4></div>
            <div class="panel-body small-panel-body">
                <table class="table table-bordered table-striped table-hover">
                    <th>Actions</th>
                    <?php use App\Action; $actions = Action::where('owner', 'like', '%' . $department->name . '%')->get(); ?>
                    @foreach($actions as $action)
                        <tr>
                            <td><a href="/actions/show/{{ $action->id }}">{{ $action->body }}</a></td>
                        </tr>
                    @endforeach
                    <th>Tasks</th>
                    <?php use App\Task; $tasks = Task::where('owner', 'like', '%' . $department->name . '%')->get(); ?>
                    @foreach($tasks as $task)
                        <tr>
                            <td><a href="/actions/show/{{ $task->id }}">{{ $task->body }}</a></td>
                        </tr>
                    @endforeach
                    <th>Users</th>
                    <?php use App\User; $users = User::where('department', 'like', '%' . $department->name . '%')->get(); ?>
                    @foreach($users as $user)
                        <tr>
                            <td><a href="/actions/show/{{ $user->id }}">{{ $user->name }}</a></td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

@stop
