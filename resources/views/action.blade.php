@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <form method="get" action="/actions/new">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Add Actions</button>
                    </div>
                </form>

                <div class="panel panel-default">
                    <div class="panel-heading">Actions</div>

                    <div class="panel-body">
                        Your Objective's Actions
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection