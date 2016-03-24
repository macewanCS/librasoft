@extends('layouts.app')

@section('content')

    <div class="bs-example" style="padding-left: 40px; padding-right: 40px;" >
        <div class="panel panel-primary">

            <div class="panel-heading" style="background: #009FD7"><h4 class="panel-title">{{$task->body}}</h4></div>
            <div class="panel-body">
                <!-- table-->
                <table class="table table-striped table-bordered table-hover">

                    <thead>
                    <tr>
                        <th style="min-width: 100px; max-width: 100px;">Due</th>
                        <th>Owner</th>
                        <th>Lead</th>
                        <th>Collaborators</th>
                        <th>Status</th>
                        <th>Success Measures</th>
                    </tr>
                    </thead>

                    <tbody>
                    <tr>
                        <td contenteditable='true' id="date">{{ $task->date }}</td>
                        <td contenteditable='true' id="owner">{{ $task->owner }}</td>
                        <td contenteditable="true" id="lead">
                            <?php
                                $leads = explode("__,__", $task->lead);
                                foreach ($leads as $lead) {
                                    // Check if it's a valid email address
                                    if (filter_var($lead, FILTER_VALIDATE_EMAIL)) {
                                        echo \App\User::where("email", $lead)->first()->name;
                                    } else {
                                        echo $lead;
                                    }

                                    if ($lead != $leads[count($leads)-1]) {
                                        echo ", ";
                                    }
                                }
                            ?>
                        </td>
                        <td contenteditable="true" id="collaborators">
                            <?php
                                $collaborators = explode("__,__", $task->collaborators);
                                foreach ($collaborators as $collaborator) {
                                    // Check if it's a valid email address
                                    if (filter_var($collaborator, FILTER_VALIDATE_EMAIL)) {
                                        echo \App\User::where("email", $collaborator)->first()->name;
                                    } else {
                                        echo $collaborator;
                                    }

                                    if ($collaborator != $collaborators[count($collaborators)-1]) {
                                        echo ", ";
                                    }
                                }
                            ?>
                        </td>
                        <td contenteditable="true" id="status">{{ $task->status}}</td>
                        <td contenteditable="true" id="success">{{ $task->success}}</td>
                    </tr>
                    </tbody>

                </table>
                <!-- table end-->

                <h5>Note: Click on a table cell to edit that cell.</h5>

                <!-- save all button-->
                <div>
                <button type="submit" class="btn btn-primary" style="background: #009FD7; float: right;">Save All</button>
                </div>
                <!-- save all button end-->

                <!-- page break-->
                <div style="padding-top: 30px;">
                    <hr>
                </div>
                <!-- page break end-->

                <!-- Notes start -->
                <div class="col-md-6 col-md-offset-3">

                    <div class="panel panel-primary">
                        <div class="panel-heading" style="background: #009FD7">Notes</div>

                        <div class="panel-body">
                            <ul class="list-group">

                                @foreach($task->notes as $note)
                                    <li class="list-group-item">
                                        {{ $note->content }}
                                        <p>Posted by {{ $note->user }} on {{ $note->created_at }}.</p>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                    </div>

                    @role('admin|deplead|teamlead|bplead')<div class="panel panel-primary">

                        <div class="panel-heading" style="background: #009FD7">Add a Note</div>

                        <div class="panel-body">
                            <form method="POST" action="/tasks/{{ $task->id }}/notes">

                                <div class="form-group">
                                    <textarea name="content" class="form-control" style="resize: none;" placeholder="Enter a note..."></textarea>
                                    <input type="hidden" name="user" value="Vicky"/>
                                    <input type="hidden" name="created_at" value="{{ Carbon\Carbon::now()->format('Y-m-d H:i:s') }}"/>
                                    <input type="hidden" name="updated_at" value="{{ Carbon\Carbon::now()->format('Y-m-d H:i:s') }}"/>
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary" style="float: right; background: #009FD7;">Add Note</button>
                                </div>
                            </form>
                        </div>

                    </div>@endrole

                    <!-- Notes end -->
                </div>
            </div>
        </div>
    </div>

@stop
