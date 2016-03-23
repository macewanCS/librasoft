@extends('layouts.app')

@section('content')

    <div class="panel panel-primary">
        <div class="panel-heading"><h4 class="panel-title">{{ $note->task->body }}</h4></div>
        <div class="panel-body">
            <p>{{ $note->content }}</p>
            <p>Posted by {{ $note->user }} on {{ $note->created_at }}</p>
        </div>
    </div>

@stop
