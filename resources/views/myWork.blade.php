@extends('layouts.app')

@section('content')
    <div class="bs-example">
        <div class="panel panel-primary">
            <div class="panel-heading" style="background: #009FD7">Current Work</div>

            <div class="panel-body small-panel-body">
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
                            <th class="mw-table-due">Due</th>
                            <th class="mw-table-owner">Owner</th>
                            <th class="mw-table-lead">Lead</th>
                            <th class="mw-table-collab">Collaborators</th>
                            <th class="mw-table-status">Status</th>
                        </tr>
                    </thead>

                    <tbody>
                    @foreach($myActions as $action)
                        <tr>
                            <td><a href="/actions/show/{{ $action->id }}">Action: {{ $action->body }}</a></td>
                            <td class="mw-table-due">{{ $action->date }}</td>
                            <td class="mw-table-owner">{{ $action->owner }}</td>
                            <td class="mw-table-lead">
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
                            <td class="mw-table-collab">
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
                            <td class="mw-table-status">
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
                            <td class="mw-table-due">{{ $task->date }}</td>
                            <td class="mw-table-owner">{{ $task->owner }}</td>
                            <td class="mw-table-lead">
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
                            <td class="mw-table-collab">
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
                            <td class="mw-table-status">
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

    <div class="bs-example">
        <div class="panel panel-primary">
            <div class="panel-heading" style="background: #009FD7">Department/Team Work</div>
            <div class="panel-body small-panel-body">
                <?php
                $myDept =  Auth::user()->department;
                $myTeam = Auth::user()->team;
                $myTasks = array();
                $alltasks = \App\Task::all();
                foreach ($alltasks as $sometask) {
                    $owners = explode("__,__", $sometask->owner);
                    $collaborators = explode("__,__", $sometask->collaborators);

                    if (in_array($myTeam, $owners) || in_array($myDept, $owners) || in_array($myTeam, $collaborators) || in_array($myDept, $collaborators)) {
                        $myTasks[] = $sometask;
                    }
                }
                $myActions = array();
                $allactions = \App\Action::all();
                foreach ($allactions as $someaction) {
                    $owners = explode("__,__", $someaction->owner);
                    $collaborators = explode("__,__", $someaction->collaborators);

                    if (in_array($myTeam, $owners) || in_array($myDept, $owners) || in_array($myTeam, $collaborators) || in_array($myDept, $collaborators)) {
                        $myActions[] = $someaction;
                    }
                }
                ?>
                <table class="table table-striped table-bordered table-hover tablesorter mywork-table">
                    <thead>
                    <tr>
                        <th>Description</th>
                        <th class="mw-table-due">Due</th>
                        <th class="mw-table-owner">Owner</th>
                        <th class="mw-table-lead">Lead</th>
                        <th class="mw-table-collab">Collaborators</th>
                        <th class="mw-table-status">Status</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($myActions as $action)
                        <tr>
                            <td><a href="/actions/show/{{ $action->id }}">Action: {{ $action->body }}</a></td>
                            <td class="mw-table-due">{{ $action->date }}</td>
                            <td class="mw-table-owner">{{ $action->owner }}</td>
                            <td class="mw-table-lead">
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
                            <td class="mw-table-collab">
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
                            <td class="mw-table-status">
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
                            <td class="mw-table-due">{{ $task->date }}</td>
                            <td class="mw-table-owner">{{ $task->owner }}</td>
                            <td class="mw-table-lead">
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
                            <td class="mw-table-collab">
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
                            <td class="mw-table-status">
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
