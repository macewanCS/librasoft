<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>EPL Business Plan</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Local style -->
    <link rel="stylesheet" href="/css/minimal.css">
</head>
<body>

<button class="btn btn-primary epl-blue-bg" id="print-button" onclick="window.print()">Print</button>
<div class="head">
<div class="page-header">
    <?php
    use Carbon\Carbon;
    $start_year = Carbon::createFromFormat("Y-m-d", $plan->startdate)->format("Y");
    $end_year = Carbon::createFromFormat("Y-m-d", $plan->enddate)->format("Y");
    ?>
    <h1>Business Plan <small>{{ $start_year }}-{{ $end_year }}</small></h1>
</div>
</div>

<div class="business-plan">
    @if(count($plan->goals->all()) > 0)
    @foreach($plan->goals as $goal)
        <div class="panel panel-primary">
            <div class="panel-heading" style="background: #009FD7;">
                <span class="badge" id="bp-count">{{ count($goal->objectives->all()) }} Objectives</span>
                <h4 class="panel-title">{{ $goal->body }}</h4>
            </div>
            <div class="panel-body">

                @if(count($goal->objectives->all()) > 0)
                @foreach($goal->objectives as $objective)
                    <div class="panel panel-success">
                        <div class="panel-heading" style="background: #73C146;">
                            <span class="badge" id="bp-count">{{ count($objective->actions->all()) }} Actions</span>
                            <h4 class="panel-title" id="objective-title">{{ $objective->body }}</h4>
                        </div>
                        <div class="panel-body">

                            @if(count($objective->actions->all()) > 0)
                            @foreach($objective->actions as $action)
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <span class="badge" id="bp-count">{{ count($action->tasks->all()) }} Tasks</span>
                                        <h4 class="panel-title">{{ $action->body }}</h4>
                                        <br/>
                                        <table class="table table-striped table-bordered table-condensed action-table">
                                            <thead>
                                            <tr>
                                                <th id="due">Due</th>
                                                <th id="owner">Owner</th>
                                                <th id="lead">Lead</th>
                                                <th id="collab">Collaborators</th>
                                                <th id="status">Status</th>
                                                <th id="success">Success Measures</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td id="due">{{ $action->date }}</td>
                                                <td id="owner">{{ $action->owner }}</td>
                                                <td id="lead">
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
                                                <td id="collab">
                                                    <?php
                                                    $collaborators = explode("__,__", $action->collaborators);
                                                    foreach ($collaborators as $collaborator) {
                                                        // Check if it's a valid email address
                                                        if (filter_var($collaborator, FILTER_VALIDATE_EMAIL)) {
                                                            echo \App\User::where("email", $collaborator)->first()->name;
                                                        } else {
                                                            echo $collaborator;
                                                        }

                                                        if ($collaborator != $collaborators[count($collaborators)-1]) {
                                                            echo ", ";
                                                        }
                                                    }
                                                    ?>
                                                </td>
                                                <td id="status">{{ $action->status }}</td>
                                                <td id="success">{{ $action->success }}</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    @if(count($action->tasks->all()) > 0)
                                    <div class="panel-body">

                                        <table class="table table-striped table-bordered table-condensed task-table">
                                            <thead>
                                            <tr>
                                                <th id="task">Task</th>
                                                <th id="due">Due</th>
                                                <th id="owner">Owner</th>
                                                <th id="lead">Lead</th>
                                                <th id="collab">Collaborators</th>
                                                <th id="status">Status</th>
                                                <th id="success">Success Measures</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($action->tasks as $task)
                                                <tr>
                                                    <td id="task">{{ $task->body }}</td>
                                                    <td id="due">{{ $task->date }}</td>
                                                    <td id="owner">{{ $task->owner }}</td>
                                                    <td id="lead">
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
                                                    <td id="collab">
                                                        <?php
                                                        $collaborators = explode("__,__", $task->collaborators);
                                                        foreach ($collaborators as $collaborator) {
                                                            // Check if it's a valid email address
                                                            if (filter_var($collaborator, FILTER_VALIDATE_EMAIL)) {
                                                                echo \App\User::where("email", $collaborator)->first()->name;
                                                            } else {
                                                                echo $collaborator;
                                                            }

                                                            if ($collaborator != $collaborators[count($collaborators)-1]) {
                                                                echo ", ";
                                                            }
                                                        }
                                                        ?>
                                                    </td>
                                                    <td id="status">{{ $task->status}}</td>
                                                    <td id="success">{{ $task->success}}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>

                                    </div>
                                    @endif
                                </div>

                            @endforeach
                            @endif

                        </div>
                    </div>
                @endforeach
                @endif

            </div>
        </div>
    @endforeach
    @endif
</div>

</body>
</html>
