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
            <div class="col-md-2">
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
            </div>

            <!-- Objectives Pane -->
            <div class="col-md-2">
                <?php
                $objective_count = 0;
                foreach($plan->goals as $goal) {
                    $objective_count += count($goal->objectives);
                }
                ?>
                @if($objective_count > 0)
                    <form>
                        @foreach($plan->goals as $goal)
                            @foreach($goal->objectives as $objective)
                                <div class="form-group">
                                    <label for="objective{{ $objective->id }}">{{ $objective->body }}</label>
                                    <input type="text" class="form-control" id="objective{{ $objective->id }}" placeholder="{{ $objective->body }}" disabled>
                                </div>
                            @endforeach
                        @endforeach
                    </form>
                @endif
            </div>
            <div class="col-md-4">
                <?php
                $action_count = 0;
                    foreach ($plan->goals as $goal) {
                        foreach ($goal->objectives as $objective) {
                            $action_count += count($objective->actions);
                        }
                    }
                ?>
                @if($action_count > 0)
                    <form>
                        @foreach($plan->goals as $goal)
                            @foreach($goal->objectives as $objective)
                                @foreach($objective->actions as $action)
                                    <div class="form-group">
                                        <label for="action{{ $action->id }}">{{ $action->body }}</label>
                                        <input type="text" class="form-control" id="action{{ $action->id }}" placeholder="{{ $action->body }}" disabled>
                                    </div>
                                @endforeach
                            @endforeach
                        @endforeach
                    </form>
                @endif

                <form method="post" action="/createplan/{plan}/addactions">
                    <div class="form-group">
                        <label for="objective_selection">Objective</label>
                        <select name="objective_id" class="form-control" id="objective_selection">
                            @foreach($plan->goals as $goal)
                                @foreach($goal->objectives as $objective)
                                    <option value="{{ $objective->id }}">{{ $objective->body }}</option>
                                @endforeach
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="newactionbody">New Action</label>
                        <input type="text" name="body" class="form-control" id="newactionbody" placeholder="Enter a name...">
                        <span id="helpBlock" class="help-block">Please enter an action name.</span>
                    </div>
                    <div class="form-group">
                        <label for="newactiondate">Action Due Date</label>
                        <input type="text" name="due" class="form-control" id="newactiondate" placeholder="YYYY-MM-DD">
                        <span id="helpBlock" class="help-block">Please enter the action's due date</span>
                    </div>
                    <div class="form-group">
                        <label for="newactionlead">Action Lead</label>
                        <select name="lead" class="form-control" id="newactionlead">
                            @foreach(App\User::all() as $user)
                                <option value="{{ $user->email }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="newactioncollaborators">Action Lead</label>
                        <select name="collabs" class="form-control" id="newactioncollaborators" multiple size=5>
                            @foreach(App\User::all() as $user)
                                <option value="{{ $user->email }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="newactionsuccess">Action Success Measures</label>
                        <input type="text" name="success" class="form-control" id="newactionsuccess" placeholder="Enter success measures...">
                        <span id="helpBlock" class="help-block">Please enter the action's success measures.</span>
                    </div>
                    <input type="hidden" name="status" value="In Progress">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="btn-group" style="float: right;">
                        <button type="submit" class="btn btn-primary" name="add">Add Action</button>
                        <button type="submit" class="btn btn-primary" name="done">Done</button>
                    </div>
                </form>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>

@stop
