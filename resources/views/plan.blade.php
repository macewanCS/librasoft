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
<div class="panel panel-primary options-panel">
    <div class="panel-heading options-panel-div options-panel-head"><h4 class="panel-title">Options</h4></div>
    <div class="panel-body options-panel-div">
        <div class="btn-group-vertical" role="group">
            <?php
            use App\Department;
            use App\Team;
            $filter_options = ["Actions", "Tasks"];
            $dept_options = Department::all();
            $team_options = Team::all();
            ?>

            @foreach($filter_options as $option)
                <a type="button" class="btn btn-primary" href="/sort/{{ strtolower(preg_replace('/[^a-z0-9]+/i', '', $option)) }}">{{ $option }}</a>
            @endforeach


            <div class="dropdown btn-group">
                <button class="btn btn-primary dropdown-toggle" type="button" id="teamDeptDropdown" data-toggle="dropdown">
                    Team/Department
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li class="dropdown-header">Departments</li>
                    @foreach($dept_options as $dept_option)
                        <?php $lower_option = strtolower($dept_option->name); ?>
                        <li><a href="/sort/dept/{{ $lower_option }}">{{ $dept_option->name }}</a></li>
                    @endforeach
                    <li role="separator" class="divider"></li>
                    <li class="dropdown-header">Teams</li>
                    @foreach($team_options as $team_option)
                        <?php $lower_option = strtolower($team_option->name); ?>
                        <li><a href="/sort/team/{{ $lower_option }}">{{ $team_option->name }}</a></li>
                    @endforeach
                </ul>
            </div>

            <a id="openAll" role="button" class="btn btn-primary">Open All Categories</a>
            <a id="closeAll" role="button" class="btn btn-primary">Close All Categories</a>
            <a role="button" class="btn btn-primary" href="#">Edit Business Plan</a>
            <a role="button" class="btn btn-primary" href="plan/new">New Business Plan</a>
            <a role="button" class="btn btn-primary" href="/print">Print Plan</a>
        </div>
    </div>
</div>

        <!-- Accordion starts-->
        <div class="plan-content-panel">
            <div class="panel-group" id="accordion">
                @foreach($plan->goals()->orderBy('body', 'asc')->get() as $goal)

                    <div class="panel panel-primary">
                        <div  onClick="toggleChevron(this)" class="panel-heading" data-toggle="collapse" href="#collapsegoal{{ $goal->id }}" style="background: #009FD7; cursor: pointer;">
                            <h4 class="panel-title" >
                                <a  data-toggle="collapse" href="#collapsegoal{{ $goal->id }}"><i class="glyphicon glyphicon-chevron-down"></i>Goal: {{ $goal->body }} </a>
                            </h4>
                        </div>

                        <!-- Objective Group-->
                        <div id="collapsegoal{{ $goal->id }}" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <div class="bs-example2">
                                    <div class="panel-group">
                                        <div class="panel panel-default">

                                            @foreach($goal->objectives()->orderBy('body', 'asc')->get() as $objective)

                                                <div onClick="toggleChevron(this)" class="panel-heading" data-toggle="collapse" href="#collapseobjective{{ $objective->id }}" style="cursor: pointer;">
                                                    <h4 class="panel-title">
                                                        <a data-toggle="collapse" href="#collapseobjective{{ $objective->id }}"><i class="glyphicon glyphicon-chevron-down"></i>Objective: {{ $objective->body }}</a>
                                                    </h4>
                                                </div>

                                                <div id="collapseobjective{{ $objective->id }}" class="panel-collapse collapse in">
                                                    <div class="panel-body">
                                                        <!--<p>{{ $objective->body }}</p>-->


                                                        <table class="table table-condensed table-bordered action-table action-table{{ $objective->id }} tablesorter" style="font-size: 12.5%;">
                                                            <thead>
                                                            <tr>
                                                                <th class="table-task">Description</th>
                                                                <th class="table-due" style="font-weight: bold;">Due</th>
                                                                <th class="table-owner">Department/Team</th>
                                                                <th class="table-lead">Lead</th>
                                                                <th class="table-success">Success Measures</th>
                                                                <th class="table-status">Status</th>
                                                            </tr>
                                                            </thead>

                                                            <tbody>
                                                            @foreach($objective->actions()->orderBy('body', 'asc')->get() as $action)

                                                                <tr>
                                                                    <td class="table-task">Action: <a href="/actions/show/{{ $action->id }}">{{ $action->body }}</a></td>
                                                                    <th class="table-due">{{ $action->date }}</th>
                                                                    <td class="table-owner">{{ $action->owner }}</td>
                                                                    <td class="table-collaborators">
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
                                                                @foreach($action->tasks()->orderBy('body', 'asc')->get() as $task)
                                                                    <tr>
                                                                        <td class="table-task">Task:
                                                                            <a href="/tasks/{{ $task->id }}">
                                                                                {{ $task->body }}
                                                                            </a>
                                                                        </td>
                                                                        <td class="table-due">{{ $task->date }}</td>
                                                                        <td class="table-owner">{{ $task->owner }}</td>
                                                                        <td class="table-lead">
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


                                                            @endforeach

                                                            </tbody>
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


<script type="application/javascript">
    jQuery(document).ready(function () {
        jQuery('#closeAll').on('click', function(e){
            jQuery('.panel-collapse').each(function(){
                jQuery(this).removeClass("in");
            });
        });
    });
</script>

<script type="application/javascript">
    jQuery(document).ready(function () {
        jQuery('#openAll').on('click', function(e){
            jQuery('.panel-collapse').each(function(){
                jQuery(this).addClass("in");
            });
        });
    });
</script>

<script type="application/javascript" src="/js/jquery.tablesorter.min.js"></script>

<script type="application/javascript">
    $(document).ready(function()
        {
            <?php use App\Objective; ?>
            @for($i = 1; $i < count(Objective::get()->all()); $i++)
            $(".action-table{{ $i }}").tablesorter();
            @endfor
        }
    );
</script>




@stop
