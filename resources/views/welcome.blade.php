@permission('myWork')
@extends('layouts.app')

@section('content')
<div class="bs-example" style="padding-left: 40px; padding-right: 40px;" >
    <div class="panel panel-primary">
        <div class="panel-heading" style="background: #009FD7">In-Progress</div>

        <div class="panel-body" style="padding: 0px">
            <?php
            $myTasks = DB::table('tasks')->take(2)->get()
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
                    @foreach($myTasks as $task)
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

<div class="bs-example" style="padding-left: 40px; padding-right: 40px">
    <div class="panel panel-primary">

        <div class="panel-heading" style="background: #009FD7">Completed Tasks</div>

        <div class="panel-body" style="padding: 0px">
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
                        <a class="fancybox" href="tasks/{{ $task->id }}">
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
@endpermission
