@extends('layouts.app')


@section('content')

    <div class="bs-example" style="padding-left: 40px; padding-right: 40px;" >
        <div class="panel panel-primary">
            <?php
            $myTasks = DB::table('tasks')->take(1)->get()
            ?>

            <div class="panel-heading" style="background: #009FD7">Task</div>

            <div class="panel-body">
                <table class="table table-striped table-bordered table-hover">

                    <!-- Header -->
                    <tr>
                        <th style="min-width: 100px; max-width: 100px;">Due</th>
                        <th>Owner</th>
                        <th>Lead</th>
                        <th>collaborators</th>
                        <th>Status</th>
                        <th>Success Measures</th>
                    </tr>
                    <!-- /Header -->

                    <!-- Body -->

                    <tr>
                        @foreach($myTasks as $task)
                            <td contenteditable='true'>{{ $task->date }}</td>
                            <td contenteditable='true'>{{ $task->owner }}</td>
                            <td contenteditable="true">{{ $task->lead }}</td>
                            <td contenteditable="true">{{ $task->collaborators }}</td>
                            <td contenteditable="true"> {{$task->status}}</td>
                            <td contenteditable="true"> {{$task->success}}</td>
                        @endforeach
                    </tr>

                    <!-- /Body -->
                </table>
            </div>

        </div>
    </div>

    <div style="padding-left: 40px; padding-right: 40px;">

        <hr>

    </div>

    <div class="bs-example" style="padding-left: 40px; padding-right: 40px;" >
        <div class="panel panel-primary">
            <div class="panel-heading" style="background: #009FD7">Notes</div>
            <div class="panel-body" >
                <div>
                    <ul>
                        <li> something</li>
                        <li> something 2</li>
                    </ul>
                </div>

                <hr>

                <div class="form-group">

                    <textarea name="body" class="form-control">  </textarea>
                </div>


                    <button type="submit" class="btn btn-primary">Add Note</button>

            </div>
        </div>
    </div>

@stop




