@extends('layouts.app')

@section('content')

    <div class="panel panel-primary">
        <div class="panel-heading"><h4 class="panel-title">{{ $objective->body }}</h4></div>
        <div class="panel-body">
            <table class="table table-bordered table-striped table-hover">
                @foreach($objective->actions as $action)
                    <tr>
                        <td><a href="/actions/show/{{ $action->id }}">Action {{ $action->item }}: {{ $action->body }}</a></td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

@stop
