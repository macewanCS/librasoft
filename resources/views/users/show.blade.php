@extends('layouts.app')

@section('content')

    <div class="bs-example">
        <div class="panel panel-primary">
            <div class="panel-heading"><h4 class="panel-title">{{ $user->name }}</h4></div>
            <div class="panel-body">
                <?php
                    use App\Action;
                    use App\Task;
                    use App\Department;
                    use App\Team;
                    $user_stuff = array();
                    $user_stuff = array_merge($user_stuff, Action::where('lead', 'like', '%' . $user->email . '%')->get()->all());
                    $user_stuff = array_merge($user_stuff, Action::where('collaborators', 'like', '%' . $user->email . '%')->get()->all());
                    $user_stuff = array_merge($user_stuff, Task::where('lead', 'like', '%' . $user->email . '%')->get()->all());
                    $user_stuff = array_merge($user_stuff, Task::where('collaborators', 'like', '%' . $user->email . '%')->get()->all());
                    $user_stuff = array_merge($user_stuff, Department::where('name', 'like', '%' . $user->department . '%')->get()->all());
                ?>

                <table class="table table-striped table-hover table-bordered table-responsive">
                    <tbody>
                    @foreach($user_stuff as $item)
                        <?php $result_class = str_replace("app\\", "", strtolower(get_class($item))); ?>
                        <tr>

                            <td><a href="/{{  $result_class }}s/show/{{ $item->id }}">{{ ucwords($result_class) }}: @if(!in_array($result_class, ["department", "team"])){{ $item->body }}@else{{ $item->name }}@endif</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@stop
