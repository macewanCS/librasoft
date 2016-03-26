@extends('layouts.app')

@section('content')

    <div class="content">

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

                    @foreach($filter_options as $filter_option)
                        <?php $lower_option = strtolower(preg_replace('/[^a-z0-9]+/i', '', $filter_option)); ?>
                        <a type="button" class="btn btn-primary" href="/sort/{{ $lower_option }}" @if($lower_option == $option) disabled="disabled" @endif>{{ $filter_option }}</a>
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
                    <a type="button" class="btn btn-primary" href="/plan">Clear Filter</a>
                </div>
            </div>
        </div>

        <div class="sort-panel">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4 class="panel-title">&nbsp;</h4>
                </div>

                <!-- Action table -->
                <table class="table table-bordered table-striped table-hover filter-table tablesorter">
                    <thead>
                    <tr>
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
                            <td class="desc"><a href="/{{ $option }}/show/{{ $data->id }}">{{ $data->body }}</a></td>
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
