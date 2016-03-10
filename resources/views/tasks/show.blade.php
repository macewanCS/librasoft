@extends('layouts.app')

@section('content')

    <div class="bs-example" style="padding-left: 40px; padding-right: 40px;" >
        <div class="panel panel-primary">

            <div class="panel-heading" style="background: #009FD7">{{$task->body}}</div>
            <div class="panel-body">
                <!-- table-->
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
                        <td contenteditable='true' id="date">{{ $task->date }}</td>
                        <td contenteditable='true' id="owner">{{ $task->owner }}</td>
                        <td contenteditable="true" id="lead">{{ $task->lead }}</td>
                        <td contenteditable="true" id="collaborators">{{ $task->collaborators }}</td>
                        <td contenteditable="true" id="status">{{ $task->status}}</td>
                        <td contenteditable="true" id="success">{{ $task->success}}</td>
                    </tr>

                    <!-- /Body -->
                </table>
                <!-- table end-->
                <h5>Note: Click on a table cell to edit that cell.</h5>

                <!-- save all button-->
                <div>
                <button type="submit" class="btn btn-primary" style="float: right" id="saveAll">Save All</button>
                </div>
                <!-- save all button end-->

                <!-- page break-->
                <div style="padding-top: 30px;">
                    <hr>
                </div>
                <!-- page break end-->

                <!-- Notes start -->
                <div class="col-md-6 col-md-offset-3">
                    <h4>Notes:</h4>
                    <ul class="list-group">
                        <li class="list-group-item"> a note will go here</li>
                        <li class="list-group-item"> some other note</li>
                    </ul>

                    <hr>

                    <h4>Add a Note:</h4>
                    <form method="POST" action="/tasks/show">

                        <div class="form-group">

                            <div>
                                <textarea name="body" class="form-control" style="resize: none;">  </textarea>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary" style="float: right" id="note">Add Note</button>
                    </form>
                    <!-- Notes end -->
                </div>
            </div>
        </div>
    </div>

@stop
