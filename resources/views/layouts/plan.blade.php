@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <form method="get" action="/plans/new">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Create New Business Plan</button>
                    </div>
                </form>

                <div class="panel panel-default">
                    <div class="panel-heading">Business Plans</div>

                    <div class="panel-body">
                        Your Current Business Plans
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
