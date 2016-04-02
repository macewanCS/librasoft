@extends('layouts.app')

@section('content')

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
                        <input type="text" class="form-control" id="planStartDate" name="startdate" placeholder="{{ $plan->startdate }}" disabled>
                        <span id="helpBlock" class="help-block">Please enter the start date in the form of YYYY-MM-DD. For example, 2018-10-24.</span>
                    </div>
                    <div class="form-group">
                        <label for="planEndDate">Plan End Date</label>
                        <input type="text" class="form-control" id="planEndDate" name="enddate" placeholder="{{ $plan->enddate }}" disabled>
                        <span id="helpBlock" class="help-block">Please enter the end date in the form of YYYY-MM-DD. For example, 2020-10-24.</span>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Goals Pane -->
    <div class="col-md-4">
        <div class="panel panel-primary">
            <div class="panel-heading" style="background: #6FC144">
                <h4 class="panel-title">Add Goals</h4>
            </div>
            <div class="panel-body">
                @if(count($plan->goals) > 0)
                    <form>
                        @foreach($plan->goals as $goal)
                            <div class="form-group">
                                <label for="goal{{ $goal->id }}">{{ $goal->body }}</label>
                                <input type="text" class="form-control" id="goal{{ $goal->id }}" placeholder="{{ $goal->body }}" disabled>
                            </div>
                        @endforeach
                    </form>
                @endif
                <form method="post" action="/createplan/{{ $plan->id }}/addgoals">
                    <div class="form-group">
                        <label for="newGoal">New Goal</label>
                        <input type="text" name="body" class="form-control" id="newGoal" placeholder="Enter a name...">
                        <span id="helpBlock" class="help-block">Please enter a goal name.</span>
                    </div>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="plan_id" value="{{ $plan->id }}">
                    <div class="btn-group" style="float: right;">
                        <button type="submit" class="btn btn-primary" name="add" style="background: #6FC144">Add Goal</button>
                        <button type="submit" class="btn btn-primary" name="done" style="background: #6FC144">Done</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-2">
        <div class="panel panel-primary">
            <div class="panel-heading" style="background: #E40D5D">
                <h4 class="panel-title">Add Objectives</h4>
            </div>
            <div class="panel-body"></div>
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
