@extends('layouts.app')

@section('content')

    <div class="content">

        <div class="filter">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4 class="panel-title">Filter</h4>
                </div>
                <div class="panel-body">
                    <div class="btn-group" role="group">
                        <?php
                            use App\Department;
                            use App\Team;
                            $filter_options = ["Actions", "Tasks"];
                            $dept_options = Department::all();
                            $team_options = Team::all();
                        ?>

                        @foreach($filter_options as $filter_option)
                            <?php $lower_option = strtolower(preg_replace('/[^a-z0-9]+/i', '', $filter_option)); ?>
                            <a type="button" class="btn btn-primary acttskbutton" href="/sort/{{ $lower_option }}" @if($lower_option == $option) disabled="disabled" @endif>{{ $filter_option }}</a>
                        @endforeach
                    </div>
                    <div class="dropdown">
                        <button class="btn btn-default dropdown-toggle" type="button" id="teamDeptDropdown" data-toggle="dropdown">
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
                </div>
            </div>
        </div>

        <div class="panel panel-primary sort-panel">
            <div class="panel-heading">
                <h4 class="panel-title">{{ ucwords(strtolower($option)) }}</h4>
            </div>

            <!-- Action table -->
            <table class="table table-bordered table-striped table-hover filter-table tablesorter">
                <thead>
                <tr>
                    @if($option == 'actions')<th class="item">Action</th>@endif
                    <th class="desc">Description</th>
                    <th class="due">Due</th>
                    <th class="dept">Department/Team</th>
                    <th class="action-lead">Lead</th>
                    <th class="suc">Success Measures</th>
                    <th class="stat">Status</th>
                </tr>
                </thead>

                <tbody>
                <?php
                    if ($option == 'actions') {
                        $results = DB::table('actions')->orderBy('item', 'asc')->get();
                    } else {
                        $results = DB::table('tasks')->orderBy('body', 'asc')->get();
                    }
                ?>

                @foreach($results as $data)

                    <tr>
                        @if($option == 'actions') <td class="item">{{ $data->item }}</td> @endif
                        <td class="desc">@if($option == 'tasks')<a href="tasks/{{ $task->id }}">@endif{{ $data->body }}@if($option == 'tasks')</a>@endif</td>
                        <td class="due">{{ $data->date }}</td>
                        <td class="dept">{{ $data->owner }}</td>
                        <td class="action-lead">
                            <?php
                                $leads = explode("__,__", $data->lead);
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
                        <td class="suc">{{ $data->success }}</td>
                        <td class="stat">{{ $data->status }}</td>
                    </tr>

                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script type="application/javascript" src="/js/jquery.tablesorter.min.js"></script>

    <script type="application/javascript">
        $(document).ready(function()
            {
                $(".filter-table").tablesorter();
            }
        );
    </script>


@stop
