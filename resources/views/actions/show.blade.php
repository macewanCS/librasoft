@extends('layouts.app')

@section('content')

    <div class="bs-example">
        <div class="panel panel-primary">
            <div class="panel-heading"><h4 class="panel-title">Action: {{ $action->body }}</h4></div>
            <div class="panel-body">
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
                    @foreach($action->tasks as $task)
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
