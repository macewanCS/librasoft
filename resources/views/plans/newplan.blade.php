@extends('layouts.app')

@section('content')

<div class="panel panel-primary">
    <div class="panel-heading" style="background: #009FD7;">
        <h4 class="panel-title">Create A New Business Plan</h4>
    </div>
    <div class="panel-body">
        <div class="col-md-4">
            <form method="post" action="/createplan/addplan">
                <div class="form-group">
                    <label for="planStartDate">Plan Start Date</label>
                    <input type="text" class="form-control" id="planStartDate" name="startdate" placeholder="YYYY-MM-DD">
                    <span id="helpBlock" class="help-block">Please enter the start date in the form of YYYY-MM-DD. For example, 2018-10-24.</span>
                </div>
                <div class="form-group">
                    <label for="planEndDate">Plan End Date</label>
                    <input type="text" class="form-control" id="planEndDate" name="enddate" placeholder="YYYY-MM-DD">
                    <span id="helpBlock" class="help-block">Please enter the end date in the form of YYYY-MM-DD. For example, 2020-10-24.</span>
                </div>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button type="submit" class="btn btn-primary" style="float: right;">Set Date</button>
            </form>
        </div>
        <div class="col-md-2"></div>
        <div class="col-md-2"></div>
        <div class="col-md-2"></div>
        <div class="col-md-2"></div>
    </div>
</div>

@stop
