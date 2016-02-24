@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <form method="get" action="/goals/new">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Add Goals</button>
                    </div>
                </form>

                <div class="panel panel-default">
                    <div class="panel-heading">Goals</div>

                    <div class="panel-body">
                        Your Plan's Goals
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection