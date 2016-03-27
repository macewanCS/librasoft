@extends('layouts.app')

@section('content')

    <div class="bs-example">
        <div class="panel panel-primary">
            <div class="panel-heading" style="background: #009FD7;"><h4 class="panel-title">{{ $team->name }}</h4></div>
            <div class="panel-body small-panel-body">
                <table class="table table-bordered table-striped table-hover">
                    <th>Actions</th>
                    <?php use App\Action; $actions = Action::where('owner', 'like', '%' . $team->name . '%')->get(); ?>
                    @foreach($actions as $action)
                        <tr>
                            <td><a href="/actions/show/{{ $action->id }}">{{ $action->body }}</a></td>
                        </tr>
                    @endforeach
                    <?php use App\Task; $tasks = Task::where('owner', 'like', '%' . $team->name . '%')->get(); ?>
                    @if(count($tasks) > 0)
                        <th>Tasks</th>
                        @foreach($tasks as $task)
                            <tr>
                                <td><a href="/actions/show/{{ $task->id }}">{{ $task->body }}</a></td>
                            </tr>
                        @endforeach
                    @endif
                    <?php use App\User; $users = User::where('department', 'like', '%' . $team->name . '%')->get(); ?>
                    @if(count($users) > 0)
                        <th>Users</th>
                        @foreach($users as $user)
                            <tr>
                                <td><a href="/actions/show/{{ $user->id }}">{{ $user->name }}</a></td>
                            </tr>
                        @endforeach
                    @endif
                </table>
            </div>
        </div>
    </div>

@stop
