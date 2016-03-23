@extends('layouts.app')

@section('content')

    <div class="panel panel-primary">
        <div class="panel-heading"><h4 class="panel-title">{{ $department->name }}</h4></div>
        <div class="panel-body">
            <table class="table table-bordered table-striped table-hover">
            </table>
        </div>
    </div>

@stop
