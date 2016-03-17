{{--@permission('mywork')--}}
@extends('layouts.app')

@section('content')

    <div class="dashboard" style="padding: 0; font-size: 70%;">

        <div class="dashboard-row">
            <div class="col-xs-2 dashboard-panel">
                <div class="panel panel-primary">
                    <div class="panel-heading" style="background: #009FD7;">Recently updated</div>

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
                    <div class="panel-heading" style="background: #009FD7">Recently Finished</div>

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
                <div class="panel-heading" style="background: #009FD7"> Recent Comments</div>

                <div class="panel-body" style="height: 200px">
                    <ul>
                        <li> Comment added in task 3.1</li>
                        <li> Comment added to Objective 2</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-xs-2 dashboard-panel">
            <div class="panel panel-primary">
                <div class="panel-heading" style="background: #009FD7">Due Dates</div>

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
                                                <td>{{$action->item}}</td>
                                                <td>{{$action->body}}</td>
                                                <td style="min-width: 100px; max-width: 100px;">{{$action->date}}</td>
                                                <td style="min-width: 100px; max-width: 100px;"
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
                                                            <td>{{$task->item}}</td>
                                                            <td><a href="tasks/{{ $task->id }}">
                                                                    {{ $task->body }}
                                                                </a></td>
                                                            <td style="min-width: 100px; max-width: 100px">{{$task->date}}</td>
                                                            <td style="min-width: 100px; max-width: 100px"
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

    <script type="application/javascript">$(".panel-body").css("font-size", "85%");</script>


@stop

{{--@endpermission--}}
