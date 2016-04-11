@extends('layouts.app')

@section('content')

    <div class="bs-example">
        <div class="panel panel-primary">
            <div class="panel-heading" style="background: #009FD7;"><h4 class="panel-title">Action: {{ $action->body }}</h4></div>
            <div class="panel-body small-panel-body">
                <div class="col-md-6">
                <h4><a href="/objectives/show/{{ $action->objective()->get()->first()->id }}">Belongs to Objective: {{ $action->objective()->get()->first()->body }}</a></h4>
                </div>
                <div class="col-md-6">
                    @if($action->status != "Completed")
                        @role('admin|deplead|teamlead|bplead')
                        <a role="button" class="btn btn-primary" style="float:right;" href="/actions/{{ $action->id }}/markcomplete">Mark Completed</a>
                        @endrole
                    @endif
                    @role('bplead')
                        <a class="btn btn-primary" role="button" href="/actions/{{ $action->id }}/delete" style="float: right;">Delete</a>
                    @endrole
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
                        <td>{{ $action->date }}</td>
                        <td>{{ $action->owner }}</td>
                        <td>
                            <?php
                            $leads = explode("__,__", $action->lead);
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
                        <td>
                            <?php
                            $collaborators = explode("__,__", $action->collaborators);
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
                        <td>{{ $action->status }}</td>
                        <td>{{ $action->success }}</td>
                    </tr>
                    </tbody>
                </table>
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Tasks</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($action->tasks()->orderBy('body', 'asc')->get() as $task)
                        <tr>
                            <td><a href="/tasks/show/{{ $task->id }}">{{ $task->body }}</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@stop
