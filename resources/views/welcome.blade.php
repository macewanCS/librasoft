@extends('layouts.app')

@section('content')
<div class="container" class="row" class="col-md-10 col-md-offset-1">
    <div class="panel panel-primary">
        <div class="panel-heading" style="background: #009FD7">In-Progress</div>

        <div class="panel-body">
            <?php
            $tasks = DB::table('tasks')->take(2)->get()
            ?>
                <table class="table table-striped table-bordered table-hover">

                    <!-- Header -->
                    <tr>
                        <th>Task</th>
                        <th>Due</th>
                        <th>Owner</th>
                        <th>Lead</th>
                        <th>Status</th>
                    </tr>
                    <!-- /Header -->

                    <!-- Body -->
                    @foreach($tasks as $task)
                    <tr>
                        <td>
                            <a href="tasks/{{ $task->id }}">
                                {{ $task->body }}
                            </a>
                        </td>
                        <td>{{ $task->date }}</td>
                        <td>{{ $task->owner }}</td>
                        <td>{{ $task->lead }}</td>
                        <td>
                            <?php
                            if ($task->status == "done") {
                                echo "Done";
                            } else {
                                echo "In progress";
                            }
                            ?>
                        </td>
                    </tr>
                    @endforeach
                    <!-- /Body -->

                </table>
        </div>

    </div>
</div>


<div class="container" class="row" class="col-md-10 col-md-offset-1">
    <div class="panel panel-primary">

        <div class="panel-heading" style="background: #009FD7">Completed Tasks</div>

        <div class="panel-body">
            <?php
            $task = DB::table('tasks')->find(10);
            $task->status = "done";
            ?>
            <table class="table table-striped table-bordered table-hover">

                <!-- Header -->
                <tr>
                    <th>Task</th>
                    <th>Due</th>
                    <th>Owner</th>
                    <th>Lead</th>
                    <th>Status</th>
                </tr>
                <!-- /Header -->

                <!-- Body -->
                <tr>
                    <td>
                        <a href="tasks/{{ $task->id }}">
                            {{ $task->body }}
                        </a>
                    </td>
                    <td>{{ $task->date }}</td>
                    <td>{{ $task->owner }}</td>
                    <td>{{ $task->lead }}</td>
                    <td>
                        <?php
                        if ($task->status == "done") {
                            echo "Done";
                        } else {
                            echo "In progress";
                        }
                        ?>
                    </td>
                </tr>
                <!-- /Body -->

            </table>
        </div>

    </div>
</div>
@endsection
