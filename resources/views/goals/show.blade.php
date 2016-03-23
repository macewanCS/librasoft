@extends('layouts.app')

@section('content')

    <div class="panel panel-primary">
        <div class="panel-heading"><h4 class="panel-title">{{ $goal->body }}</h4></div>
        <div class="panel-body">
            <table class="table table-bordered table-striped table-hover">
                @foreach($goal->objectives as $objective)
                    <tr>
                        <td><a href="/objectives/show/{{ $objective->id }}">{{ $objective->body }}</a></td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

@stop
