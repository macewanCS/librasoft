@extends('layouts.app')

@section('content')

    <div class="bs-example">
        <div class="panel panel-primary">
            <div class="panel-heading"><h4 class="panel-title">Goal: {{ $goal->body }}</h4></div>
            <div class="panel-body">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                    <tr>
                        <th>Obejctives</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $objectives = $goal->objectives; ?>
                    @foreach($goal->objectives()->orderBy('body', 'asc')->get() as $objective)
                        <tr>
                            <td><a href="/objectives/show/{{ $objective->id }}">{{ $objective->body }}</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@stop
