@extends('layouts.app')

@section('content')
<div class="container" class="row" class="col-md-10 col-md-offset-1">
    <div class="panel panel-default">
        <div class="panel-heading">In-Progress</div>

        <div class="panel-body">
            <?php
            $task = DB::table('tasks')->first()
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


<div class="container" class="row" class="col-md-10 col-md-offset-1">
    <div class="panel panel-default">

        <div class="panel-heading">My Work is done here</div>

        <div class="panel-body">Hello</div>

    </div>
</div>
@endsection
