@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Tasks</div>

                    <div class="panel-body">
                        Your Action's Tasks
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Add Task</button>
                </div>
            </div>
        </div>
    </div>
@endsection