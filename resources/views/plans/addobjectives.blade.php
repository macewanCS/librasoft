@extends('layouts.app')

@section('content')
    <?php
    function sort_by_name($a, $b) {
        return strcmp($a->name, $b->name);
    }
    function sort_by_body($a, $b) {
        return strcmp($a->body, $b->body);
    }
    use Carbon\Carbon;
    ?>

    <!-- Plan pane -->
    <div class="col-md-2">
        <div class="panel panel-primary">
            <div class="panel-heading" style="background: #FBBB2A;">
                <h4 class="panel-title">Create A New Business Plan</h4>
            </div>
            <div class="panel-body">
                <form>
                    <div class="form-group">
                        <label for="planStartDate">Plan Start Date</label>
                        <input type="text" class="form-control" id="planStartDate" name="startdate" placeholder="{{ Carbon::createFromFormat("Y-m-d", $plan->startdate)->format("Y") }}" disabled>
                        <span id="helpBlock" class="help-block">Please enter the start date in the form of YYYY-MM-DD. For example, 2018-10-24.</span>
                    </div>
                    <div class="form-group">
                        <label for="planEndDate">Plan End Date</label>
                        <input type="text" class="form-control" id="planEndDate" name="enddate" placeholder="{{ Carbon::createFromFormat("Y-m-d", $plan->enddate)->format("Y") }}" disabled>
                        <span id="helpBlock" class="help-block">Please enter the end date in the form of YYYY-MM-DD. For example, 2020-10-24.</span>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Goals Pane -->
    <div class="col-md-2">
        <div class="panel panel-primary">
            <div class="panel-heading" style="background: #6FC144">
                <h4 class="panel-title">Add Goals</h4>
            </div>
            <div class="panel-body">
                <?php
                $allgoals = array();
                foreach($plan->goals as $goal)
                    $allgoals[] = $goal;
                usort($allgoals, "sort_by_body");
                $goalcount = count($allgoals);
                ?>
                @if($goalcount > 0)
                    <form>
                        @foreach($allgoals as $goal)
                            <div class="form-group">
                                <label for="goal{{ $goal->id }}">{{ $goal->body }}</label>
                                <input type="text" class="form-control" id="goal{{ $goal->id }}" placeholder="{{ $goal->body }}" disabled>
                            </div>
                        @endforeach
                    </form>
                @endif
            </div>
        </div>
    </div>

    <!-- Objectives Pane -->
    <div class="col-md-4">
        <div class="panel panel-primary">
            <div class="panel-heading" style="background: #E40D5D">
                <h4 class="panel-title">Add Objectives</h4>
            </div>
            <div class="panel-body">
                <?php
                $allobjectives = array();
                foreach($plan->goals as $goal)
                    foreach($goal->objectives as $objective)
                        $allobjectives[] = $objective;
                usort($allobjectives, "sort_by_body");
                $objective_count = count($allobjectives);
                ?>
                @if($objective_count > 0)
                    <form>
                        @foreach($allobjectives as $objective)
                            <div class="form-group">
                                <label for="objective{{ $objective->id }}">{{ $objective->body }}</label>
                                <input type="text" class="form-control" id="objective{{ $objective->id }}" placeholder="{{ $objective->body }}" disabled>
                            </div>
                        @endforeach
                    </form>
                @endif
                <form method="post" action="/createplan/{{ $plan->id }}/addobjectives">
                    <div class="form-group">
                        <label for="goal_selection">Goal</label>
                        <select name="goal_id" class="form-control" id="goal_selection">
                            <?php
                            $allgoals = array();
                            foreach($plan->goals as $goal)
                                $allgoals[] = $goal;
                            usort($allgoals, "sort_by_body");
                            ?>
                            @foreach($allgoals as $goal)
                                <option value="{{ $goal->id }}">{{ $goal->body }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="newobjective">New Objective</label>
                        <input type="text" name="body" class="form-control" id="newobjective" placeholder="Enter a name...">
                        <span id="helpBlock" class="help-block">Please enter an objective name.</span>
                    </div>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="btn-group" style="float: right;">
                        <button type="submit" class="btn btn-primary" name="add" style="background: #E40D5D">Add Objective</button>
                        <button type="submit" class="btn btn-primary" name="done" style="background: #E40D5D">Done</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-2">
        <div class="panel panel-primary">
            <div class="panel-heading" style="background: #7F4094">
                <h4 class="panel-title">Add Actions</h4>
            </div>
            <div class="panel-body"></div>
        </div>
    </div>
    <div class="col-md-2">
        <div class="panel panel-primary">
            <div class="panel-heading" style="background: #009FD7">
                <h4 class="panel-title">Add Tasks</h4>
            </div>
            <div class="panel-body"></div>
        </div>
    </div>

@stop
