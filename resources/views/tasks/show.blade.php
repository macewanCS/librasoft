@extends('layouts.app')

@section('content')

    <div class="bs-example">
        <div class="panel panel-primary">

            <div class="panel-heading" style="background: #009FD7">
                <h4 class="panel-title">{{$task->body}}</h4>
            </div>
            <div class="panel-body small-panel-body">
                <div class="row">
                    <div class="col-md-6">
                    <h4><a href="/actions/show/{{ $task->action()->get()->first()->id }}">Belongs to Action: {{ $task->action()->get()->first()->body }}</a></h4>
                    </div>
                    <div class="col-md-6">
                        @if($task->status != "Completed")
                            @role('admin|deplead|teamlead|bplead')
                            <a role="button" class="btn btn-primary" style="float:right;" href="/tasks/{{ $task->id }}/markcomplete">Mark Completed</a>
                            @endrole
                        @endif
                        @role('bplead|teamlead|deplead')
                        <a class="btn btn-primary" role="button" href="/tasks/{{ $task->id }}/delete" style="float: right;">Delete</a>
                        @endrole
                    </div>
                </div>
                <table class="table table-striped table-bordered table-hover">

                    <thead>
                    <tr>
                        <th>Due</th>
                        <th>Owner</th>
                        <th>Lead</th>
                        <th>Collaborators</th>
                        <th>Status</th>
                        <th>Success Measures</th>
                    </tr>
                    </thead>

                    <tbody>
                    <tr>
                        <td id="date">{{ $task->date }}</td>
                        <td id="owner">{{ $task->owner }}</td>
                        <td id="lead">
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
                        <td id="collaborators">
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
                        <td id="status">{{ $task->status}}</td>
                        <td id="success">{{ $task->success}}</td>
                    </tr>
                    </tbody>

                </table>
                <!-- table end-->

                {{--<h5>Note: Click on a table cell to edit that cell.</h5>

                <!-- save all button-->
                <div>
                <button type="submit" class="btn btn-primary" id="save-button">Save All</button>
                </div>
                <!-- save all button end-->

                <div id="page-break">
                    <hr/>
                </div>--}}

                <!-- Notes start -->
                <div class="col-md-6 col-md-offset-3">

                    <div class="panel panel-primary">
                        <div class="panel-heading" style="background: #009FD7">Notes</div>

                        <div class="panel-body small-panel-body">
                            <ul class="list-group">

                                @foreach($task->notes as $note)
                                    <li class="list-group-item">
                                        {{ $note->content }}
                                        <br><em class="ul-fontSize">- Posted by {{ $note->user }} on {{ $note->created_at }}.</em>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                    </div>

                    @role('admin|deplead|teamlead|bplead')<div class="panel panel-primary">

                        <div class="panel-heading" style="background: #009FD7">Add a Note</div>

                        <div class="panel-body small-panel-body">
                            <form method="POST" action="/tasks/{{ $task->id }}/notes">

                                <div class="form-group">
                                    <textarea name="content" class="form-control note-entry" placeholder="Enter a note..."></textarea>
                                    <input type="hidden" name="user" value=@if(!Auth::guest())"{{ Auth::user()->name }}"@else"Unknown User"@endif/>
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
