@extends('layouts.app')

@section('content')

    <div class="bs-example">
        <div class="panel panel-primary">
            <div class="panel-heading"><h4 class="panel-title">Objective: {{ $objective->body }}</h4></div>
            <div class="panel-body">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                    <tr>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($objective->actions()->orderBy('body', 'asc')->get() as $action)
                        <tr>
                            <td><a href="/actions/show/{{ $action->id }}">Action {{ $action->item }}: {{ $action->body }}</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@stop
