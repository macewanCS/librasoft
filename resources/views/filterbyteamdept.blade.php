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
                                <li @if($lower_option == $dept) class="disabled" @endif><a href="/sort/dept/{{ $lower_option }}">{{ $dept_option->name }}</a></li>
                            @endforeach
                            <li role="separator" class="divider"></li>
                            <li class="dropdown-header">Teams</li>
                            @foreach($team_options as $team_option)
                                <?php $lower_option = strtolower($team_option->name); ?>
                                <li @if($lower_option == $dept) class="disabled" @endif><a href="/sort/team/{{ $lower_option }}">{{ $team_option->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>

                    <a type="button" class="btn btn-primary" href="/plan">Clear Filter</a>
                </div>
            </div>
        </div>
    </div>

    <div class="sort-panel">
    <div class="panel panel-primary">
        <div class="panel-heading" style="background: #009FD7;">
            <h4 class="panel-title">{{ ucwords(strtolower($dept)) }}</h4>
        </div>
        <?php
        use \App\Action;
            $results = Action::where('owner', strtolower($dept))->get();
        ?>

        @if(count($results) < 1)
            <div class="panel-body"><h4>No records found.</h4></div>
        @else
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
                @foreach($results as $result)
                    <tr>
                        <td class="desc"><a href="/actions/show/{{ $result->id }}">Action: {{ $result->body }}</a></td>
                        <td class="due">{{ $result->date }}</td>
                        <td class="dept">{{ $result->owner }}</td>
                        <td class="action-lead">
                            <?php
                                $leads = explode("__,__", $result->lead);
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
                        <td class="suc">{{ $result->success }}</td>
                        <td class="stat">{{ $result->status }}</td>
                    </tr>
                    @foreach($result->tasks as $task)
                        <tr>
                            <td class="desc"><a href="/tasks/show/{{ $task->id }}">Task: {{ $task->body }}</a></td>
                            <td class="due">{{ $task->date }}</td>
                            <td class="dept">{{ $task->owner }}</td>
                            <td class="action-lead">
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
                            <td class="suc">{{ $task->success }}</td>
                            <td class="stat">{{ $task->status }}</td>
                        </tr>
                    @endforeach
                @endforeach
                </tbody>
            </table>

        @endif
    </div></div>

    <script type="application/javascript" src="/js/jquery.tablesorter.min.js"></script>

    <script type="application/javascript">
        $(document).ready(function()
                {
                    $(".filter-table").tablesorter();
                }
        );
    </script>



@stop
