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

<div class="bs-example" style="padding-left: 40px; padding-right: 40px">
    <div class="panel-group" >
        @foreach($plan->goals as $goal)

        <div class="panel panel-primary" >
            <div class="panel-heading" data-toggle="collapse" href="#collapsegoal{{ $goal->id }}" style="background: #009FD7; cursor: pointer;">
                <h4 class="panel-title">
                    <a data-toggle="collapse" href="#collapsegoal{{ $goal->id }}"> {{ $goal->body }} </a>
                </h4>
            </div>

            <!-- Objective Group-->
            <div id="collapsegoal{{ $goal->id }}" class="panel-collapse collapse in">
                <div class="panel-body">
                    <body>
                    <div class="bs-example2">
                        <div class="panel-group">
                            <div class="panel panel-default">

                                @foreach($goal->objectives as $objective)

                                    <div class="panel-heading" data-toggle="collapse" href="#collapseobjective{{ $objective->id }}" style="cursor: pointer;">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" href="#collapseobjective{{ $objective->id }}">{{ $objective->body }}</a>
                                        </h4>
                                    </div>

                                    <div id="collapseobjective{{ $objective->id }}" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <!--<p>{{ $objective->body }}</p>-->

                                            <!-- Action Group -->
                                            <div class="bs-example3">
                                                <div class="panel-group" class="active">
                                                    <div class="panel panel-default">

                                                        @foreach($objective->actions as $action)

                                                            <!-- Action header -->
                                                            <div class="panel-heading" data-toggle="collapse" href="#collapseaction{{ $action->id }}" style="cursor: pointer;">
                                                                <h4 class="panel-title">
                                                                    <a data-toggle="collapse" href="#collapseaction{{ $action->id }}">{{ $action->body }}</a>
                                                                </h4>
                                                                <br/>
                                                                <table class="table table-condensed table-bordered action-table">
                                                                    <tr>
                                                                        <th class="action-table-content">Due</th>
                                                                        <th class="action-table-content">Lead</th>
                                                                        <th class="action-table-content">Collaborators</th>
                                                                        <th class="action-table-content">Status</th>
                                                                        <th class="action-table-content">Success Measures</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="action-table-content">{{ $action->date }}</td>
                                                                        <td class="action-table-content">{{ $action->lead }}</td>
                                                                        <td class="action-table-content">{{ $action->collaborators }}</td>
                                                                        <td class="action-table-content">{{ $action->status }}</td>
                                                                        <td class="action-table-content">{{ $action->success }}</td>
                                                                    </tr>
                                                                </table>
                                                            </div>

                                                            <!-- Action body -->
                                                            <div id="collapseaction{{ $action->id }}" class="panel-collapse collapse">
                                                                <div class="panel-body">

                                                                    <!-- Task Group -->
                                                                    <div class="bs-example4">
                                                                        <div class="panel-group" class="active">
                                                                            <div class="panel panel-default">

                                                                                    <table class="table table-striped table-bordered table-hover task-table">
                                                                                        <!-- Header -->
                                                                                        <tr>
                                                                                            <th class="task-table-task">Task</th>
                                                                                            <th class="task-table-due">Due</th>
                                                                                            <th class="task-table-owner">Owner</th>
                                                                                            <th class="task-table-lead">Lead</th>
                                                                                            <th class="task-table-status">Status</th>
                                                                                        </tr>
                                                                                        <!-- /Header -->

                                                                                        <!-- Body -->
                                                                                        @foreach($action->tasks as $task)
                                                                                        <tr>
                                                                                            <td class="task-table-task">
                                                                                                <a href="tasks/{{ $task->id }}">
                                                                                                    {{ $task->body }}
                                                                                                </a>
                                                                                            </td>
                                                                                            <td class="task-table-due">{{ $task->date }}</td>
                                                                                            <td class="task-table-owner">{{ $task->owner }}</td>
                                                                                            <td class="task-table-lead">{{ $task->lead }}</td>
                                                                                            <td class="task-table-status">
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
                                                                                        <!-- /Body -->

                                                                                    </table>


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
                                    </div>

                                @endforeach

                            </div>

                        </div>
                    </div>
                    </body>
                </div>
            </div>
        </div>

        @endforeach
    </div>
</div>

</body>

<form method="get" action="/plan/new">
    <div class="form-group" style="padding-left: 40px; padding-right: 40px">
        <button type="submit" class="btn btn-primary" style="background: #009FD7">Create New Business Plan</button>
    </div>
</form>

@endsection
