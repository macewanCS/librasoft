{{--@permission('mywork')--}}
@extends('layouts.app')

@section('content')
    <head>
        <meta charset="utf-8">
        <title>jQuery UI Dialog - Default functionality</title>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

    </head>

    <div class="dashboard" style="padding: 0; font-size: 70%;">

        <div class="dashboard-row">
            <div class="col-xs-2 dashboard-panel">
                <div class="panel panel-primary">
                    <div class="panel-heading" style="background: #009FD7;">Recently updated
                        <a onclick="popupUpdated()" role="button" class="btn btn-primary" style="background: #009FD7; float: right;">More</a>
                    </div>

                    <div class="panel-body" style="height: 200px;">
                        <ul>
                            <li>Goal 1, Objective 1 description has been updated</li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>

        <div class="dashboard-row">
            <div class="col-xs-2 dashboard-panel">
                <div class="panel panel-primary">
                    <div class="panel-heading" style="background: #009FD7">Recently Finished
                        <a onclick="popupFinished()" role="button" class="btn btn-primary" style="background: #009FD7; float: right;">More</a>
                    </div>

                    <div class="panel-body" style="height: 200px">
                        <ul>
                            <li>Goal 1, Objective1, Action 2 has been completed</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="dashboard-row">
        <div class="col-xs-2 dashboard-panel">
            <div class="panel panel-primary">
                <div class="panel-heading" style="background: #009FD7"> Recent Comments
                    <a onclick="popupComments()" role="button" class="btn btn-primary" style="background: #009FD7; float: right;">More</a>
                </div>

                <div class="panel-body" style="height: 200px; overflow-y: scroll;">
                    <ul>
                        @foreach($plan->goals as $goal)
                            @foreach($goal->objectives as $objective)
                                @foreach($objective->actions as $action)
                                    @foreach($action->tasks as $task)
                                        @foreach($task->notes as $note)
                                            <li> <a href="tasks/{{ $task->id }}">{{$note->content}}</a><p style="font-size: 13px">- Posted by {{$note->user}} at {{$note->created_at}}</p>
                                            </li>
                                        @endforeach
                                    @endforeach
                                @endforeach
                            @endforeach
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-xs-2 dashboard-panel">
            <div class="panel panel-primary">
                <div class="panel-heading" style="background: #009FD7">Due Dates
                    <a onclick="popupDates()" role="button" class="btn btn-primary" style="background: #009FD7; float: right;">More</a>
                </div>

                <div class="panel-body" style="height: 200px; overflow-y: scroll">
                    <table class="table table-condensed table-bordered action-table" style="font-size: 60%">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Action/Task</th>
                            <th>Date</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                    @foreach($plan->goals as $goal)
                        @foreach($goal->objectives as $objective)
                            @foreach($objective->actions as $action)
                                    <?php
                                        $today = Carbon\Carbon::now();
                                    ?>
                                    @if ($action->date == $today)

                                    @elseif($action->date < $today)
                                        @if($action->status != 'Completed')
                                        <tbody>
                                            <tr>
                                                <td class="ui-table-id">{{$action->item}}</td>
                                                <td class="ui-table-body">{{$action->body}}</td>
                                                <td class="ui-table-due">{{$action->date}}</td>
                                                <td style="font-size: 13px; min-width: 100px; max-width: 100px;"
                                                    @if($action->status == 'Ongoing')
                                                        class="success"
                                                    @elseif($action->status == 'In progress')
                                                        class="danger"
                                                    @endif

                                                >{{$action->status}}</td>
                                            </tr>

                                            @foreach($action->tasks as $task)
                                                @if($task->date == $today)
                                                @elseif($task->date < $today)
                                                    @if($task->status != 'Completed')
                                                        <tr>
                                                            <td class="ui-table-id">{{$task->item}}</td>
                                                            <td class="ui-table-body"><a href="tasks/{{ $task->id }}">
                                                                    {{ $task->body }}
                                                                </a></td>
                                                            <td class="ui-table-due">{{$task->date}}</td>
                                                            <td style="font-size: 13px; min-width: 100px; max-width: 100px;"
                                                                @if($task->status == 'Ongoing')
                                                                    class="success"
                                                                @elseif($task->status == 'In progress')
                                                                    class="danger"
                                                                @endif
                                                            >{{$task->status}}</td>
                                                        </tr>
                                                    @endif
                                                @elseif($task->date > $today)
                                                @endif
                                            @endforeach
                                        </tbody>
                                            @endif
                                    @elseif ($action->date > $today) 

                                    @endif
                            @endforeach
                        @endforeach
                    @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>

    </div>

    <!-- Popup divs-->
    <!--Due date popup -->
    <div class="hide fade">
        <div id="date"  title="Dute Dates" class="panel panel-primary">
            <div class="panel-body overflow-y: scroll" >
                <table class="table table-condensed table-bordered action-table" style="font-size: 60%">
                    <thead>
                    <tr>
                        <th class="ui-table-id">ID</th>
                        <th class="ui-table-body">Action/Task</th>
                        <th class="ui-table-owner">Department/ Team</th>
                        <th class="ui-table-lead">Lead</th>
                        <th class="ui-table-due">Date</th>
                        <th class="ui-table-status">Status</th>
                    </tr>
                    </thead>
                    @foreach($plan->goals as $goal)
                        @foreach($goal->objectives as $objective)
                            @foreach($objective->actions as $action)
                                <?php
                                $today = Carbon\Carbon::now();
                                ?>
                                @if ($action->date == $today)

                                @elseif($action->date < $today)
                                    @if($action->status != 'Completed')
                                        <tbody>
                                        <tr>
                                            <td class="ui-table-id">{{$action->item}}</td>
                                            <td class="ui-table-body">{{$action->body}}</td>
                                            <td class="ui-table-owner">{{$action->owner}}</td>
                                            <td class="ui-table-lead">
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
                                            <td class="ui-table-due">{{$action->date}}</td>
                                            <td style="font-size: 13px; min-width: 100px; max-width: 100px;"
                                                @if($action->status == 'Ongoing')
                                                class="success"
                                                @elseif($action->status == 'In progress')
                                                class="danger"
                                                    @endif

                                            >{{$action->status}}</td>
                                        </tr>

                                        @foreach($action->tasks as $task)
                                            @if($task->date == $today)
                                            @elseif($task->date < $today)
                                                @if($task->status != 'Completed')
                                                    <tr>
                                                        <td class="ui-table-id">{{$task->item}}</td>
                                                        <td class="ui-table-body">
                                                            <a href="tasks/{{ $task->id }}" style="color: #0EBFE9">
                                                                {{ $task->body }}
                                                            </a></td>
                                                        <td class="ui-table-owner">{{$task->owner}}</td>
                                                        <td class="ui-table-lead">
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
                                                        <td class="ui-table-due">{{$task->date}}</td>
                                                        <td style="font-size: 13px; min-width: 100px; max-width: 100px;"
                                                            @if($task->status == 'Ongoing')
                                                            class="success"
                                                            @elseif($task->status == 'In progress')
                                                            class="danger"
                                                                @endif
                                                        >{{$task->status}}</td>
                                                    </tr>
                                                @endif
                                            @elseif($task->date > $today)
                                            @endif
                                        @endforeach
                                        </tbody>
                                    @endif
                                @elseif ($action->date > $today) 

                                @endif
                            @endforeach
                        @endforeach
                    @endforeach
                </table>
            </div>
        </div>
    </div>

    <!--Comments popup -->
    <div class="hide fade">
        <div id="comments"  title="Recent Comments" class="panel panel-primary">
            <div class="panel-body overflow-y: scroll" >
                <ul class="list-group">
                    @foreach($plan->goals as $goal)
                        @foreach($goal->objectives as $objective)
                            @foreach($objective->actions as $action)
                                @foreach($action->tasks as $task)
                                    @foreach($task->notes as $note)
                                        <li class="list-group-item">
                                            <a href="tasks/{{ $task->id }}" style="color: #0EBFE9">{{$note->content}}</a>
                                            <p style="font-size: 13px">- Posted by {{$note->user}} at {{$note->created_at}}</p>
                                        </li>
                                    @endforeach
                                @endforeach
                            @endforeach
                        @endforeach
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <!--Updated popup -->
    <div class="hide fade">
        <div id="updated"  title="Recently Updated" class="panel panel-primary">
            <div class="panel-body overflow-y: scroll" >

                bye
            </div>
        </div>
    </div>

    <!--Finished popup -->
    <div class="hide fade">
        <div id="finished"  title="Recently Finished" class="panel panel-primary">
            <div class="panel-body overflow-y: scroll" >

                Hello
            </div>
        </div>
    </div>


    <script type="application/javascript">$(".panel-body").css("font-size", "85%");</script>

    <script type="text/javascript" src="{{URL::asset('js/popUpWindow.js')}}"></script>

@stop

{{--@endpermission--}}
