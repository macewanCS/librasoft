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
                    <table class="table table-condensed table-bordered action-table">
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
                                        <tbody>
                                            <tr>
                                                <td>{{$action->item}}</td>
                                                <td>{{$action->body}}</td>
                                                <td>{{$action->date}}</td>
                                                <td>{{$action->status}}</td>
                                            </tr>

                                            @foreach($action->tasks as $task)
                                                @if($task->date == $today)
                                                @elseif($task->date < $today)
                                                    <tr>
                                                        <td>{{$task->item}}</td>
                                                        <td>{{$task->body}}</td>
                                                        <td>{{$task->date}}</td>
                                                        <td>{{$task->status}}</td>
                                                    </tr>
                                                @elseif($task->date > $today)
                                                @endif
                                            @endforeach
                                        </tbody>
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
>>>>>>> Add Due Date functionality in dashboard
{{--@endpermission--}}
