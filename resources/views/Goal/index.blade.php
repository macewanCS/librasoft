@extends('layouts.app')


@section('content')

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
                                                    @foreach($objective->actions as $action)


                                                    <table class="table table-condensed table-bordered action-table">
                                                        <thead>
                                                        <tr>
                                                            <th class="action-table-id">ID</th>
                                                            <th class="task-table-task">Action /task</th>
                                                            <th class="action-table-due">Due</th>
                                                            <th class="action-table-owner">Department/ Team</th>
                                                            <th class="action-table-lead">Lead</th>
                                                            <th class="action-table-success">Success Measures</th>
                                                            <th class="action-table-status">Status</th>
                                                        </tr>
                                                        </thead>

                                                        <tbody>

                                                        <tr>
                                                            <td class="action-table-id"> {{$action->item}}</td>
                                                            <td class="task-table-task">{{ $action->body }}</td>
                                                            <th class="action-table-due">{{ $action->date }}</th>
                                                            <td class="action-table-owner">{{ $action->owner }}</td>
                                                            <td class="action-table-collaborators">{{ $action->lead }}</td>
                                                            <td class="action-table-success">{{ $action->success }}</td>
                                                            <td class="action-table-status">{{ $action->status }}</td>
                                                        </tr>
                                                        @foreach($action->tasks as $task)
                                                            <tr>
                                                                <td></td>
                                                                <td class="task-table-task">
                                                                    <a href="tasks/{{ $task->id }}">
                                                                        {{ $task->body }}
                                                                    </a>
                                                                </td>
                                                                <td class="task-table-due">{{ $task->date }}</td>
                                                                <td class="task-table-owner">{{ $task->owner }}</td>
                                                                <td class="task-table-lead">{{ $task->lead }}</td>
                                                                <td></td>
                                                                <td <?php
                                                                        if ($task->status == "done") {
                                                                            echo 'class = "task-table-status success"';
                                                                        }
                                                                        else {
                                                                            echo 'class = "task-table-status danger"';
                                                                        }
                                                                        ?>>
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


                                                    @endforeach
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

    <!--form method="get" action="/plan/new">
        <div class="form-group" style="padding-left: 40px; padding-right: 40px">
            <button type="submit" class="btn btn-primary" style="background: #009FD7">Create New Business Plan</button>
        </div>
    </form-->

    <!-- Javascript -->
    <!--Chnages Icons arrows in accordion -->
    <script type="text/javascript" src="{{URL::asset('js/changeIcon.js')}}"></script>
    <!-- Create pop up window-->

@stop




