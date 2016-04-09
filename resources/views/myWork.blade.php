@extends('layouts.app')

@section('content')
    <head>
        <meta charset="utf-8">
        <title>jQuery UI Dialog - Default functionality</title>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

    </head>

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
            <div class="panel-heading" style="background: #009FD7">
                Department/Team Work
                <a id="edit" role="button" class="btn btn-primary mw-btn" href="#">Assign actions/tasks</a>
            </div>
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
                            <td id="action-lead" class="mw-table-lead">@role('admin')<a data-pk="{{ $action->id }}" href="#">@endrole
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
                                </a>
                            </td>
                            <td id="action-collab" class="mw-table-collab">@role('admin')<a data-pk="{{ $action->id }}" href="#">@endrole
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
                                </a>
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
                            <td id="task-lead" class="mw-table-lead">@role('admin')<a data-pk="{{ $task->id }}" href="#">@endrole
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
                                </a>
                            </td>
                            <td id="task-collab" class="mw-table-collab">@role('admin')<a data-pk="{{ $task->id }}" href="#">@endrole
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
                                </a>
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
    @role('admin')
    <script>
        $(function() {
            var defaults = {
                disabled: true,
                mode: 'popup',
                showbuttons: true,
                onblur: 'true',
                inputclass: 'input-xxlarge',
            };

            $.extend($.fn.editable.defaults, defaults);

            $('#edit').click(function () {
                $('#table-edit .editable').editable('toggleDisabled');
            });

            $(function(value) {
                if ($.trim(value) == '')
                    return 'Value is required.';
            });

            $('#action-lead a').editable({
                inputclass: 'input-large',
                type: 'select2',
                select2: {
                    tags: ['Vicky Varga', 'Admin', 'J McPhee', 'E Jones', 'Jody Crilly', 'Deputy CEO', 'Sharon Karr',
                        'Digital Public Spaces Librarian', 'Peter Schoenberg', 'J Woods', 'S Foremski', 'B Crittenden',
                        'E Stuebing', 'Michael Doe', 'Luc Doe', 'John Doe', 'Andrew Nisbet', 'Chris Doe', 'Alex Carruthers',
                        'Khalil Doe', 'Robin Doe', 'Rachael Collins', 'Jamie Doe'],
                    tokenSeparators: [",", " "]
                },
                url: '{{URL::to("/")}}/mywork/action/lead',
                title: 'Input Leads',
                send: 'always',
                ajaxOptions: {
                    datatype: 'json'
                }
            });


            $('#task-lead a').editable({
                inputclass: 'input-large',
                type: 'select2',
                select2: {
                    tags: ['Vicky Varga', 'Admin', 'J McPhee', 'E Jones', 'Jody Crilly', 'Deputy CEO', 'Sharon Karr',
                        'Digital Public Spaces Librarian', 'Peter Schoenberg', 'J Woods', 'S Foremski', 'B Crittenden',
                        'E Stuebing', 'Michael Doe', 'Luc Doe', 'John Doe', 'Andrew Nisbet', 'Chris Doe', 'Alex Carruthers',
                        'Khalil Doe', 'Robin Doe', 'Rachael Collins', 'Jamie Doe'],
                    tokenSeparators: [",", " "]
                },
                url: '{{URL::to("/")}}/mywork/task/lead',
                title: 'Input Leads',
                send: 'always',
                ajaxOptions: {
                    datatype: 'json'
                }
            });

            $('#action-collab a').editable({
                inputclass: 'input-large',
                type: 'select2',
                select2: {
                    tags: ['Vicky Varga', 'Admin', 'J McPhee', 'E Jones', 'Jody Crilly', 'Deputy CEO', 'Sharon Karr',
                        'Digital Public Spaces Librarian', 'Peter Schoenberg', 'J Woods', 'S Foremski', 'B Crittenden',
                        'E Stuebing', 'Michael Doe', 'Luc Doe', 'John Doe', 'Andrew Nisbet', 'Chris Doe', 'Alex Carruthers',
                        'Khalil Doe', 'Robin Doe', 'Rachael Collins', 'Jamie Doe'],
                    tokenSeparators: [","," "]
                },
                url: '{{URL::to("/")}}/mywork/action/collab',
                title: 'Input Collaborators',
                send: 'always',
                ajaxOptions: {
                    datatype: 'json'
                }
            });


            $('#task-collab a').editable({
                inputclass: 'input-large',
                type: 'select2',
                select2: {
                    tags: ['Vicky Varga', 'Admin', 'J McPhee', 'E Jones', 'Jody Crilly', 'Deputy CEO', 'Sharon Karr',
                        'Digital Public Spaces Librarian', 'Peter Schoenberg', 'J Woods', 'S Foremski', 'B Crittenden',
                        'E Stuebing', 'Michael Doe', 'Luc Doe', 'John Doe', 'Andrew Nisbet', 'Chris Doe', 'Alex Carruthers',
                        'Khalil Doe', 'Robin Doe', 'Rachael Collins', 'Jamie Doe'],
                    tokenSeparators: [","," "]
                },
                url: '{{URL::to("/")}}/mywork/task/collab',
                title: 'Input Collaborators',
                send: 'always',
                ajaxOptions: {
                    datatype: 'json'
                }
            });
        });
    </script>
    @endrole

@endsection
