@extends('layouts.app')

@section('content')
        <!-- div for filter options-->
<!--<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">Filter</div>

        <div class="panel-body"></div>
    </div>
</div>-->

<!-- Goal Group -->
<div class="panel panel-default">
    <div class="panel-heading" style="height: 60px;">
        <div style="float: left; position: relative; top: 50%; transform: translateY(-50%);">
            <p class="panel-title" style="font-size: 120%;">Business Plan</p>
        </div>
        <div style="float: right;">
            <a role="button" class="btn btn-primary" style="background: #009FD7;" href="#">Edit Business Plan</a>
            <a role="button" class="btn btn-primary" style="background: #009FD7;" href="plan/new">New Business Plan</a>
        </div>
    </div>
    <div class="panel-body">
        <div class="filter">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4 class="panel-title">Filter</h4>
                </div>
                <div class="panel-body">
                    <div class="btn-group" role="group">
                        <?php
                        $filter_options = ["Actions", "Tasks"];
                        ?>

                        @foreach($filter_options as $option)
                            <a type="button" class="btn btn-primary" href="/tasks/sort/{{ strtolower(preg_replace('/[^a-z0-9]+/i', '', $option)) }}">{{ $option }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="bs-example" style="padding-left: 40px; padding-right: 40px">
            <div class="panel-group">
                @foreach($plan->goals as $goal)

                    <div class="panel panel-primary">
                        <div  onClick="toggleChevron(this)" class="panel-heading" data-toggle="collapse" href="#collapsegoal{{ $goal->id }}" style="background: #009FD7; cursor: pointer;">
                            <h4 class="panel-title" >
                                <a  data-toggle="collapse" href="#collapsegoal{{ $goal->id }}"><i class="glyphicon glyphicon-chevron-down"></i> {{ $goal->body }} </a>
                            </h4>
                        </div>

                        <!-- Objective Group-->
                        <div id="collapsegoal{{ $goal->id }}" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <div class="bs-example2">
                                    <div class="panel-group">
                                        <div class="panel panel-default">

                                            @foreach($goal->objectives as $objective)

                                                <div onClick="toggleChevron(this)" class="panel-heading" data-toggle="collapse" href="#collapseobjective{{ $objective->id }}" style="cursor: pointer;">
                                                    <h4 class="panel-title">
                                                        <a data-toggle="collapse" href="#collapseobjective{{ $objective->id }}"><i class="glyphicon glyphicon-chevron-right"></i> {{ $objective->body }}</a>
                                                    </h4>
                                                </div>

                                                <div id="collapseobjective{{ $objective->id }}" class="panel-collapse collapse">
                                                    <div class="panel-body">
                                                        <!--<p>{{ $objective->body }}</p>-->


                                                        <table class="table table-condensed table-bordered action-table tablesorter" style="font-size: 12.5%;">
                                                            <thead>
                                                            <tr>
                                                                <th class="table-id">ID</th>
                                                                <th class="table-task">Action/task</th>
                                                                <th class="table-due" style="font-weight: bold;">Due</th>
                                                                <th class="table-owner">Department/Team</th>
                                                                <th class="table-lead">Lead</th>
                                                                <th class="table-success">Success Measures</th>
                                                                <th class="table-status">Status</th>
                                                            </tr>
                                                            </thead>

                                                            <tbody>
                                                            @foreach($objective->actions as $action)

                                                                <tr>
                                                                    <td class="table-id"> {{$action->item}}</td>
                                                                    <td class="table-task">{{ $action->body }}</td>
                                                                    <th class="table-due">{{ $action->date }}</th>
                                                                    <td class="table-owner">{{ $action->owner }}</td>
                                                                    <td class="table-collaborators">{{ $action->lead }}</td>
                                                                    <td class="table-success">{{ $action->success }}</td>
                                                                    <td
                                                                            @if ($action->status == "Completed")
                                                                            class="table-status success"
                                                                            @else
                                                                            class="table-status danger"
                                                                            @endif
                                                                    >
                                                                        @if ($action->status == "Completed")
                                                                            Completed
                                                                        @else
                                                                            In progress
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                                @foreach($action->tasks as $task)
                                                                    <tr>
                                                                        <td></td>
                                                                        <td class="table-task">
                                                                            <a href="tasks/{{ $task->id }}">
                                                                                {{ $task->body }}
                                                                            </a>
                                                                        </td>
                                                                        <td class="table-due">{{ $task->date }}</td>
                                                                        <td class="table-owner">{{ $task->owner }}</td>
                                                                        <td class="table-lead">{{ $task->lead }}</td>
                                                                        <td></td>
                                                                        <td
                                                                                @if ($task->status == "Completed")
                                                                                class="table-status success"
                                                                                @else
                                                                                class="table-status danger"
                                                                                @endif
                                                                        >
                                                                            @if ($task->status == "Completed")
                                                                                Completed
                                                                            @else
                                                                                In progress
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                @endforeach

                                                            </tbody>


                                                            @endforeach
                                                        </table>
                                                    </div>
                                                </div>

                                            @endforeach

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>
        </div>
    </div>
</div>

<!--form method="get" action="/plan/new">
    <div class="form-group" style="padding-left: 40px; padding-right: 40px">
        <button type="submit" class="btn btn-primary" style="background: #009FD7">Create New Business Plan</button>
    </div>
</form-->

<!-- Javascript -->
<!--Chnages Icons arrows in accordion -->
<script type="text/javascript" src="{{URL::asset('js/changeIcon.js')}}"></script>

<script type="application/javascript" src="/js/jquery.tablesorter.min.js"></script>

<script type="application/javascript">
    $(document).ready(function()
            {
                $(".action-table").tablesorter();
            }
    );
</script>


@stop
