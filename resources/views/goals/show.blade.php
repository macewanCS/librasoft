@extends('layouts.app')

@section('content')

    <div class="bs-example">
        <div class="panel panel-primary">
            <div class="panel-heading" style="background: #009FD7;"><h4 class="panel-title">Goal: {{ $goal->body }}</h4></div>
            <div class="panel-body small-panel-body">
                <?php use Carbon\Carbon; ?>
                <div class="col-md-6">
                    <h4><a href="/plan">Belongs to Plan:
                            {{ Carbon::createFromFormat("Y-m-d", $goal->plan()->get()->first()->startdate)->format("Y") }} -
                            {{ Carbon::createFromFormat("Y-m-d", $goal->plan()->get()->first()->enddate)->format("Y") }}</a></h4>
                </div>
                <div class="col-md-6">
                    <a class="btn btn-primary" role="button" href="/goals/{{ $goal->id }}/delete" style="float: right;">Delete</a>
                </div>
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
