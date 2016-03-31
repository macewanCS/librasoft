@extends('layouts.app')

@section('content')

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

            <!--<a id="openAll" role="button"` class="btn btn-primary" data-toggle="collapse">Open All Categories</a>
            <a id="closeAll" role="button" class="btn btn-primary" data-toggle="collapse">Close All Categories</a>-->
            <a id="edit" role="button" class="btn btn-primary" href="#">Edit Business Plan</a>
            <a role="button" class="btn btn-primary" href="plan/new">New Business Plan</a>
            <a role="button" class="btn btn-primary" href="/print">Print Plan</a>
            <a role="button" class="btn btn-primary" href="/export/tsv">Export to TSV</a>
        </div>
    </div>
</div>

        <!-- Accordion starts-->
        <div class="plan-content-panel">
            <div class="panel-group" id="accordion">
                @foreach($plan->goals()->orderBy('body', 'asc')->get() as $goal)

                    <div class="panel panel-primary">
                        <div  onClick="toggleChevron(this)" class="panel-heading" data-toggle="collapse" href="#collapsegoal{{ $goal->id }}" style="background: #009FD7; cursor: pointer;">
                            <span class="badge" id="bp-count">{{ count($goal->objectives->all()) }} Objective(s)</span>
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
                                                    <span class="badge" id="bp-count" class="table-edit">{{ count($objective->actions->all()) }} Action(s)</span>
                                                    <h4 class="panel-title">
                                                        <a data-toggle="collapse" href="#collapseobjective{{ $objective->id }}"><i class="glyphicon glyphicon-chevron-down"></i>Objective: {{ $objective->body }}</a>
                                                    </h4>
                                                </div>

                                                <div id="collapseobjective{{ $objective->id }}" class="panel-collapse collapse in">
                                                    <div class="panel-body">
                                                        <!--<p>{{ $objective->body }}</p>-->

                                                        <table id="table-edit" class="table table-condensed table-bordered action-table action-table{{ $objective->id }} tablesorter">
                                                        <table id="table-edit" class="table table-condensed table-bordered action-table tablesorter" style="font-size: 12.5%;">
                                                            <thead>
                                                            <tr>
                                                                <th class="table-task">Description</th>
                                                                <th class="table-due" style="font-weight: bold;">Due</th>
                                                                <th class="table-owner">Department</th>
                                                                <th class="table-lead">Team Lead</th>
                                                                <th class="table-success">Success Measures</th>
                                                                <th class="table-status">Status</th>
                                                            </tr>
                                                            </thead>

                                                            <tbody>
                                                            @foreach($objective->actions()->orderBy('body', 'asc')->get() as $action)

                                                                <tr>
                                                                    <td class="table-task" id="action-description">Action:
                                                                        <a data-pk="{{ $action->id }}" href="/actions/show/{{ $action->id }}">
                                                                            {{ $action->body }}
                                                                        </a>
                                                                    </td>
                                                                    <th class="table-due" id="action-date"><a data-pk="{{ $action->id }}" href="#" class="editable editable-click" data-original-title="">{{ $action->date }}</a></th>
                                                                    <td class="table-owner" id="action-department"><a data-pk="{{ $action->id }}" href="#">{{ $action->owner }}</a></td>
                                                                    <td class="table-collaborators" id="action-lead"><a data-pk="{{ $action->id }}" href="#">
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
                                                                    <td class="table-success" id="success-measures"> @role('admin')<a data-pk="{{ $action->id }}" href="#" class="editable editable-click editable-disabled">@endrole{{ $action->success }}</a></td>
                                                                    <td
                                                                            @if ($action->status == "Completed")
                                                                            class="table-status success" id="action-status"
                                                                            @else
                                                                            class="table-status danger" id="action-status"
                                                                            @endif
                                                                    >
                                                                        @if ($action->status == "Completed")
                                                                            <a data-pk="{{ $action->id }}" href="#">Completed</a>
                                                                        @else
                                                                            <a data-pk="{{ $action->id }}" href="#">In progress</a>
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                                @foreach($action->tasks()->orderBy('body', 'asc')->get() as $task)
                                                                    <tr>
                                                                        <td class="table-task" id="task-description">Task:
                                                                            <a data-pk="{{ $task->id }}" href="/tasks/{{ $task->id }}">
                                                                                {{ $task->body }}
                                                                            </a>
                                                                        </td>
                                                                        <td class="table-due" id="task-date"><a href="#" data-pk="{{ $task->id }}" >{{ $task->date }}</a></td>
                                                                        <td class="table-owner" id="task-department">@role('admin')<a href="#" data-pk="{{ $task->id }}">{{ $task->owner }}</a>@endrole</td>
                                                                        <td class="table-lead" id="task-lead">@role('admin')<a data-pk="{{ $task->id }}" href="#">@endrole
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
                                                                        <td class="table-success" id="task-success"> @role('admin')<a data-pk="{{ $task->id }}" href="#" class="editable editable-click editable-disabled">@endrole{{ $task->success }}</a></td>
                                                                        <td
                                                                                @if ($task->status == "Completed")
                                                                                class="table-status success" id="task-status"
                                                                                @else
                                                                                class="table-status danger" id="task-status"
                                                                                @endif
                                                                        >
                                                                            @if ($task->status == "Completed")
                                                                                <a data-pk="{{ $task->status }}" href="#">Completed</a>
                                                                            @else
                                                                                <a data-pk="{{ $task->status }}" href="#">In progress</a>
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

<!-- Javascript -->
<!--Chnages Icons arrows in accordion -->
<script type="text/javascript" src="{{URL::asset('js/changeIcon.js')}}"></script>


<script type="application/javascript">
    jQuery(document).ready(function () {
        jQuery('#closeAll').on('click', function(e){
            jQuery('.panel-collapse').each(function(){
                if (jQuery(this).hasClass("in")){
                    jQuery(this).removeClass("in");
                }

            });
        });
    });
</script>

<script type="application/javascript">
    jQuery(document).ready(function () {
        jQuery('#openAll').on('click', function(e){
            jQuery('.panel-collapse').each(function(){
                if (!jQuery(this).hasClass("in")){
                    jQuery(this).addClass("in");
                }
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

<!-- Editing Functions -->
@role('admin')
<script>
    $(function() {

        $.fn.editable.defaults.mode = 'popup'

        $('#edit').click(function () {
            $('#table-edit .editable').editable('toggleDisabled')
        });

        $(function(value) {
            if ($.trim(value) == '')
                    return 'Value is required.';
        });

        $('#success-measures a').editable({
            type: 'textarea',
            url: '{{URL::to("/")}}/plan/action/success',
            title: 'Enter Success Measure',
            placement: 'top',
            send: 'always',
            ajaxOptions: {
                datatype: 'json'
            }
        });

        $('#task-success a').editable({
            type: 'textarea',
            url: '{{URL::to("/")}}/plan/task/success',
            title: 'Enter Success Measure',
            placement: 'top',
            send: 'always',
            ajaxOptions: {
                datatype: 'json'
            }
        });

        $('#task-description a').editable({
            type: 'text',
            url: '{{URL::to("/")}}/plan/task/description',
            title: 'Enter Task Description',
            placement: 'top',
            send: 'always',
            ajaxOption: {
                datatype: 'json'
            }
        });

        $('#action-description a').editable({
            type: 'text',
            url: '{{URL::to("/")}}/plan/action/description',
            title: 'Enter Action Description',
            placement: 'top',
            send: 'always',
            ajaxOption: {
                datatype: 'json'
            }
        });

        $('#action-date a').editable({
            showbuttons: false,
            type: 'date',
            viewformat: 'yyyy-mm-dd',
            url: '{{URL::to("/")}}/plan/action/date',
            title: 'Select Due date',
            placement: 'right',
            send: 'always',
            ajaxOptions: {
                datatype: 'json'
            }
        });

        $('#task-date a').editable({
            showbuttons: false,
            type: 'date',
            viewformat: 'yyyy-mm-dd',
            url: '{{URL::to("/")}}/plan/task/date',
            title: 'Select Due date',
            placement: 'right',
            send: 'always',
            ajaxOptions: {
                datatype: 'json'
            }
        });

        $('#action-department a').editable({
            type: 'select',
            url: '{{URL::to("/")}}/plan/action/department',
            title: 'Select Department',
            placement: 'right',
            send: 'always',
            prepend: 'Select',
            source: [
                {value: 'Events Team', text: 'Events Team'},
                {value: 'IT Services', text: 'IT Services'},
                {value: 'Human Resources', text: 'Human Resources'},
                {value: 'Financial Services', text: 'Financial Services'},
                {value: 'Finance', text: 'Finance'},
                {value: 'Fund Development', text: 'Fund Development'},
                {value: 'Collection Management and Access', text: 'Collection Management and Access'}
            ],
            ajaxOptions: {
                datatype: 'json'
            }
        });

        $('#task-department a').editable({
            type: 'select',
            url: '{{URL::to("/")}}/plan/task/department',
            title: 'Select Department',
            placement: 'right',
            send: 'always',
            prepend: 'Select',
            source: [
                {value: 'Events Team', text: 'Events Team'},
                {value: 'IT Services', text: 'IT Services'},
                {value: 'Human Resources', text: 'Human Resources'},
                {value: 'Financial Services', text: 'Financial Services'},
                {value: 'Finance', text: 'Finance'},
                {value: 'Fund Development', text: 'Fund Development'},
                {value: 'Collection Management and Access', text: 'Collection Management and Access'}
            ],
            ajaxOptions: {
                datatype: 'json'
            }
        });


        $('#action-lead a').editable({
            inputclass: 'input-large',
            type: 'select2',
            select2: {
                tags: ['Vicky Varga', 'Admin', 'J McPhee', 'E Jones', 'Jody Crilly', 'Deputy CEO', 'Sharon Karr',
                    'Digital Public Spaces Librarian', 'Peter Schoenberg', 'J Woods', 'S Foremski', 'B Crittenden',
                    'E Stuebing', 'Michael Doe', 'Luc Doe', 'John Doe', 'Andrew Nisbet', 'Chris Doe', 'Alex Carruthers',
                    'Khalil Doe', 'Robin Doe', 'Rachael Collins', 'Jamie Doe'],
                tokenSeparators: [","," "]
            },
            //url: '{{URL::to("/")}}/plan/action/lead',
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
                tokenSeparators: [","," "]
            },
            //url: '{{URL::to("/")}}/plan/task/lead',
            title: 'Input Leads',
            send: 'always',
            ajaxOptions: {
                datatype: 'json'
            }
        });

        $('#action-status a').editable({
            type: 'select',
            url: '{{URL::to("/")}}/plan/action/status',
            title: 'Select Status',
            placement: 'left',
            send: 'always',
            prepend: 'Select',
            source: [
                {value: 'Completed', text: 'Completed'},
                {value: 'In Progress', text: 'In Progress'}
            ],
            ajaxOptions: {
                datatype: 'json'
            }
        });

        $('#task-status a').editable({
            type: 'select',
            url: '{{URL::to("/")}}/plan/task/status',
            title: 'Select Status',
            placement: 'left',
            send: 'always',
            prepend: 'Select',
            source: [
                {value: 'Completed', text: 'Completed'},
                {value: 'In Progress', text: 'In Progress'}
            ],
            ajaxOptions: {
                datatype: 'json'
            }
        });
    });
</script>
@endrole




@stop
