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
                        <a onclick="popupUpdated()" role="button" class="btn btn-primary background-blue-float">More</a>
                    </div>

                    <div class="panel-body overflow-y-height">
                        <ul class="list-group">
                        <?php
                            $today = Carbon\Carbon::today();
                            $today = $today->subMonth(1);
                        ?>
                        <li class="list-group-item"> Actions:</li>
                        @foreach($act as $action)
                            @if( $action->updated_at > $today)
                            <li class="list-group-item"><a href="">{{$action->body}}</a>
                                <p class="ul-fontSize">
                                    - <bold>Lead:</bold>
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
                                    , <bold>Updated:</bold> {{$action->updated_at}}, <bold>Status:</bold> {{$action->status}}
                                </p>
                            </li>
                            @endif
                        @endforeach
                        <li class="list-group-item"> Tasks:</li>
                        @foreach($tasks as $task)
                            @if($task->updated_at > $today)
                                <li class="list-group-item">
                                    <a href="tasks/{{ $task->id }}">{{$task->body}}</a>
                                    <p class="ul-fontSize">
                                        - <bold>Lead:</bold>
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
                                        , <bold>Updated:</bold> {{$task->updated_at}}, <bold>Status:</bold> {{$task->status}}
                                    </p>
                                </li>
                            @endif
                        @endforeach
                        </ul>
                    </div>
                </div>
            </div>

        </div>

        <div class="dashboard-row">
            <div class="col-xs-2 dashboard-panel">
                <div class="panel panel-primary">
                    <div class="panel-heading" style="background: #009FD7">Recently Finished
                        <a onclick="popupFinished()" role="button" class="btn btn-primary background-blue-float">More</a>
                    </div>

                    <div class="panel-body overflow-y-height">
                        <ul class="list-group">
                            <?php
                                $today = Carbon\Carbon::today();
                                $today = $today->subMonth(1);
                            ?>
                            <li class="list-group-item"> Actions:</li>
                            @foreach($act as $action)
                                @if( $action->updated_at > $today)
                                    @if($action->status == "Completed")
                                    <li class="list-group-item"><a href="">{{$action->body}}</a>
                                        <p class="ul-fontSize">
                                            - <bold>Lead:</bold>
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
                                            , <bold>Department:</bold> {{$task->owner}}, <bold>Updated:</bold> {{$action->updated_at}}
                                            </p>
                                        </li>
                                        @endif
                                @endif
                            @endforeach
                            <li class="list-group-item"> Tasks:</li>
                            @foreach($tasks as $task)
                                @if($task->updated_at > $today)
                                    @if($task->status == "Completed")
                                        <li class="list-group-item">
                                            <a href="tasks/{{ $task->id }}">{{$task->body}}</a>
                                            <p class="ul-fontSize">
                                                - <bold>Lead:</bold>
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
                                                , <bold>Department:</bold> {{$task->owner}}, <bold>Updated:</bold> {{$task->updated_at}}
                                            </p>
                                        </li>
                                    @endif
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="dashboard-row">
        <div class="col-xs-2 dashboard-panel">
            <div class="panel panel-primary">
                <div class="panel-heading" style="background: #009FD7"> Recent Comments
                    <a onclick="popupComments()" role="button" class="btn btn-primary background-blue-float">More</a>
                </div>

                <div class="panel-body overflow-y-height">
                    <ul class="list-group">
                        <?php
                            $today = Carbon\Carbon::now();
                            $today = $today->subMonth(1);
                        ?>
                        @foreach($notes as $note)
                            @if($note->created_at > $today)
                            <li class="list-group-item"> 
                                <a href="tasks/{{ $task->id }}">{{$note->content}}</a> 
                                <p class="ul-fontSize">- Posted by {{$note->user}} at {{$note->created_at}}</p> 
                            </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-xs-2 dashboard-panel">
            <div class="panel panel-primary">
                <div class="panel-heading" style="background: #009FD7">Due Dates
                    <a onclick="popupDates()" role="button" class="btn btn-primary background-blue-float">More</a>
                </div>

                <div class="panel-body overflow-y-height">
                    <ul class="list-group">
                        <?php
                            $today = Carbon\Carbon::now();
                            $monthLess = $today->subMonth(1);
                            $monthGreater = $today->addMonth(3);
                        ?>
                        @foreach($act as $action)
                            @if($action->status != "Completed")
                                @if($action->date > $today)
                                    @if($action->date < $monthGreater)
                                        <li class="list-group-item">{{$action->item}}---{{$action->body}}---{{$action->status}}--{{$action->date}}</li>
                                        <li class="list-group-item">{{$monthLess}}----{{$monthGreater}}</li>
                                    @endif
                                @endif
                            @endif
                        @endforeach
                    </ul>
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
                                                            <a href="tasks/{{ $task->id }}" style="color: #3D80BA">
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
                    <?php
                    $today = Carbon\Carbon::now();
                    $today = $today->subMonth(1);
                    ?>
                    @foreach($notes as $note)
                        @if($note->created_at > $today)
                            <li class="list-group-item"> 
                                <a href="tasks/{{ $task->id }}" style="color: #3D80BA">{{$note->content}}</a> 
                                <p class="ul-fontSize">- Posted by {{$note->user}} at {{$note->created_at}}</p> 
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <!--Updated popup -->
    <div class="hide fade">
        <div id="updated"  title="Recently Updated" class="panel panel-primary">
            <div class="panel-body overflow-y: scroll" >
                <ul class="list-group">
                    <?php
                        $today = Carbon\Carbon::today();
                        $today = $today->subMonth(1);
                    ?>
                    <li class="list-group-item"> Actions:</li>
                    @foreach($act as $action)
                        @if( $action->updated_at > $today)
                        <li class="list-group-item">
                            <a href="" style="color: #3D80BA">{{$action->body}}</a>
                            <p class="ul-fontSize">
                                - <bold>Lead:</bold>
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
                                , <bold>Updated:</bold> {{$action->updated_at}}, <bold>Status:</bold> {{$action->status}}
                            </p>
                        </li>
                        @endif
                    @endforeach
                    <li class="list-group-item"> Tasks:</li>
                    @foreach($tasks as $task)
                         @if($task->updated_at > $today)
                            <li class="list-group-item">
                                <a href="tasks/{{ $task->id }}" style="color: #3D80BA">{{$task->body}}</a>
                                <p class="ul-fontSize">
                                    - <bold>Lead:</bold>
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
                                    , <bold>Updated:</bold> {{$task->updated_at}}, <bold>Status:</bold> {{$task->status}}
                                </p>
                            </li>
                         @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <!--Finished popup -->
    <div class="hide fade">
        <div id="finished"  title="Recently Finished" class="panel panel-primary">
            <div class="panel-body overflow-y: scroll" >
                <ul class="list-group">
                    <?php
                    $today = Carbon\Carbon::today();
                    $today = $today->subMonth(1);
                    ?>
                    <li class="list-group-item"> Actions:</li>
                    @foreach($act as $action)
                        @if( $action->updated_at > $today)
                            @if($action->status == "Completed")
                                <li class="list-group-item"><a href="" style="color: #3D80BA">{{$action->body}}</a>
                                    <p class="ul-fontSize">
                                        - <bold>Lead:</bold>
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
                                        , <bold>Department:</bold> {{$task->owner}}, <bold>Updated:</bold> {{$action->updated_at}}
                                </li>
                            @endif
                        @endif
                    @endforeach
                    <li class="list-group-item"> Tasks:</li>
                    @foreach($tasks as $task)
                        @if($task->updated_at > $today)
                            @if($task->status == "Completed")
                                <li class="list-group-item">
                                    <a href="tasks/{{ $task->id }}" style="color: #3D80BA">{{$task->body}}</a>
                                    <p class="ul-fontSize">
                                        - <bold>Lead:</bold>
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
                                        , <bold>Department:</bold> {{$task->owner}}, <bold>Updated:</bold> {{$task->updated_at}}
                                    </p>
                                </li>
                            @endif
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <script type="application/javascript">$(".panel-body").css("font-size", "85%");</script>

    <script type="text/javascript" src="{{URL::asset('js/popUpWindow.js')}}"></script>

@stop
{{--@endpermission--}}
