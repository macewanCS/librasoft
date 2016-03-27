@extends('layouts.app')

@section('content')
    <div class="bs-example" style="padding-left: 40px; padding-right: 40px;" >
        <div class="panel panel-primary">
            <div class="panel-heading" style="background: #009FD7">In Progress</div>

            <div class="panel-body" style="padding: 0px">
                <?php
                    $id =  Auth::user()->email;
                    $myTasks = array();
                    $alltasks = \App\Task::all();
                    foreach ($alltasks as $sometask) {
                        $leads = explode("__,__", $sometask->lead);
                        $collaborators = explode("__,__", $sometask->collaborators);

                        if (in_array($id, $leads) || in_array($id, $collaborators)) {
                            $myTasks[] = $sometask;
                        }
                    }
                    $myActions = array();
                    $allactions = \App\Action::all();
                    foreach ($allactions as $someaction) {
                        $leads = explode("__,__", $someaction->lead);
                        $collaborators = explode("__,__", $someaction->collaborators);

                        if (in_array($id, $leads) || in_array($id, $collaborators)) {
                            $myActions[] = $someaction;
                        }
                    }
                ?>
                <table class="table table-striped table-bordered table-hover tablesorter mywork-table">
                    <thead>
                        <tr>
                            <th>Description</th>
                            <th>Due</th>
                            <th>Owner</th>
                            <th>Lead</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>
                    @foreach($myActions as $action)
                        <tr>
                            <td><a href="/actions/show/{{ $action->id }}">Action: {{ $action->body }}</a></td>
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
                                if ($action->status == "done") {
                                    echo "Done";
                                } else {
                                    echo "In progress";
                                }
                                ?>
                            </td>
                        </tr>
                    @endforeach
                    @foreach($myTasks as $task)
                        <tr>
                            <td>
                                <a href="/tasks/{{ $task->id }}">
                                    Task: {{ $task->body }}
                                </a>
                            </td>
                            <td>{{ $task->date }}</td>
                            <td>{{ $task->owner }}</td>
                            <td>
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
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <script type="application/javascript" src="/js/jquery.tablesorter.min.js"></script>

    <script type="application/javascript">
        $(document).ready(function()
            {
                $(".mywork-table").tablesorter();
            }
        );
    </script>

@endsection
