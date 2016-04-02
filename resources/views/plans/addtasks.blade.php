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
    <div class="col-md-2">
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
            </div>
        </div>
    </div>

    <!-- Objectives Pane -->
    <div class="col-md-2">
        <div class="panel panel-primary">
            <div class="panel-heading" style="background: #E40D5D">
                <h4 class="panel-title">Add Objectives</h4>
            </div>
            <div class="panel-body">
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
        </div>
    </div>

    <!-- Actions Pane -->
    <div class="col-md-2">
        <div class="panel panel-primary">
            <div class="panel-heading" style="background: #7F4094">
                <h4 class="panel-title">Add Actions</h4>
            </div>
            <div class="panel-body">
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
            </div>
        </div>
    </div>

    <!-- Task Pane -->
    <div class="col-md-4">
    <div class="panel panel-primary">
        <div class="panel-heading" style="background: #009FD7">
            <h4 class="panel-title">Add Tasks</h4>
        </div>
        <div class="panel-body">
            <?php
            $task_count = 0;
            foreach ($plan->goals as $goal) {
                foreach ($goal->objectives as $objective) {
                    foreach ($objective->actions as $action) {
                        $task_count += count($action->tasks);
                    }
                }
            }
            ?>
            @if($task_count > 0)
                <form>
                    @foreach($plan->goals as $goal)
                        @foreach($goal->objectives as $objective)
                            @foreach($objective->actions as $action)
                                @foreach($action->tasks as $task)
                                    <div class="form-group">
                                        <label for="action{{ $task->id }}">{{ $task->body }}</label>
                                        <input type="text" class="form-control" id="task{{ $task->id }}" placeholder="{{ $task->body }}" disabled>
                                    </div>
                                @endforeach
                            @endforeach
                        @endforeach
                    @endforeach
                </form>
            @endif

            <form method="post" action="/createplan/{{ $plan->id }}/addtasks">
                <div class="form-group">
                    <label for="newtaskbody">New Task</label>
                    <input type="text" name="body" class="form-control" id="newtaskbody" placeholder="Enter a name...">
                    <span id="helpBlock" class="help-block">Please enter a task name.</span>
                </div>
                <div class="form-group">
                    <label for="action_selection">Action</label>
                    <select name="action_id" class="form-control" id="action_selection">
                        @foreach($plan->goals as $goal)
                            @foreach($goal->objectives as $objective)
                                @foreach($objective->actions as $action)
                                    <option value="{{ $action->id }}">{{ $action->body }}</option>
                                @endforeach
                            @endforeach
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="newtaskdate">Task Due Date</label>
                    <input type="text" name="duedate" class="form-control" id="newtaskdate" placeholder="YYYY-MM-DD">
                    <span id="helpBlock" class="help-block">Please enter the task's due date</span>
                </div>
                <div class="form-group">
                    <label for="newtaskowner">Task Owner</label>
                    <select name="owner" class="form-control" id="newtaskowner">
                        @foreach(App\Department::all() as $department)
                            <option value="{{ $department->name }}">{{ $department->name }}</option>
                        @endforeach
                        @foreach(App\Team::all() as $team)
                            <option value="{{ $team->name }}">{{ $team->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="newtasklead">Task Lead</label>
                    <select name="lead" class="form-control" id="newtasklead">
                        @foreach(App\User::all() as $user)
                            <option value="{{ $user->email }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="newtaskcollaborators">Task Collaborators</label>
                    <select name="collabs[]" class="form-control" id="newtaskcollaborators" multiple size=5>
                        @foreach(App\User::all() as $user)
                            <option value="{{ $user->email }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="newtasksuccess">Task Success Measures</label>
                    <input type="text" name="success" class="form-control" id="newtasksuccess" placeholder="Enter success measures...">
                    <span id="helpBlock" class="help-block">Please enter the task's success measures.</span>
                </div>
                <input type="hidden" name="status" value="In Progress">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="btn-group" style="float: right;">
                    <button type="submit" class="btn btn-primary"style="background: #009FD7">Add Task</button>
                    <a href="/plan/{{ $plan->id }}" role="button" class="btn btn-primary" style="background: #009FD7">Done</a>
                </div>
            </form>
        </div>
    </div>
</div>

@stop
