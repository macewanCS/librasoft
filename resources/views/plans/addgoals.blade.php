@extends('layouts.app')

@section('content')

    <div class="panel panel-primary">
        <div class="panel-heading" style="background: #009FD7;">
            <h4 class="panel-title">Create A New Business Plan</h4>
        </div>
        <div class="panel-body">
            <!-- Plan pane -->
            <div class="col-md-2">
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

            <!-- Goals Pane -->
            <div class="col-md-4">
                @if(count($plan->goals) > 0)
                    <form>
                        @foreach($plan->goals as $goal)
                            <div class="form-group">
                                <label for="goal{{ $goal->id }}">New Goal</label>
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
                        <button type="submit" class="btn btn-primary" name="add">Add Goal</button>
                        <button type="submit" class="btn btn-primary" name="done">Done</button>
                    </div>
                </form>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-2"></div>
            <div class="col-md-2"></div>
        </div>
    </div>

@stop
