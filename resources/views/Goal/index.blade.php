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


                                                    <table class="table table-condensed table-bordered action-table">
                                                        <thead>
                                                        <tr>
                                                            <th class="table-id">ID</th>
                                                            <th class="table-task">Action /task</th>
                                                            <th class="table-due">Due</th>
                                                            <th class="table-owner">Department/ Team</th>
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
                                                            <td class="table-status">{{ $action->status }}</td>
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
                                                                <td <?php
                                                                        if ($task->status == "Completed") {
                                                                            echo 'class = "table-status success"';
                                                                        }
                                                                        else {
                                                                            echo 'class = "table-status danger"';
                                                                        }
                                                                        ?>>
                                                                    <?php
                                                                    if ($task->status == "Completed") {
                                                                        echo "Completed";
                                                                    } else {
                                                                        echo "In progress";
                                                                    }
                                                                    ?>
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




