@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <form method="get" action="/objs/new">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Add Objectives</button>
                    </div>
                </form>

                <div class="panel panel-default">
                    <div class="panel-heading">Objectives</div>

                    <div class="panel-body">
                        Your Goal's Objectives
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection