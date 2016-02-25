@extends('layouts.app')

@section('content')
        <!-- div for filter options-->
<div class="container">
    <div>
        <div>
            <div class="panel panel-default">
                <div class="panel-heading">Filter</div>

                <div class="panel-body">
                    stuff and more stuff
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Body for accordion-->
<body>
<div class="bs-example" style="padding-left: 40px; padding-right: 40px">
    <div class="panel-group" id="accordion">

        @foreach($plan->goals as $goal)

        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapsegoal{{ $goal->id }}"> {{ $goal->body }} </a>
                </h4>
            </div>
            <div id="collapsegoal{{ $goal->id }}" class="panel-collapse collapse in">
                <div class="panel-body">
                    <!-- Body for accordion 2-->
                    <body>
                    <div class="bs-example2">
                        <div class="panel-group" id="accordion2">
                            <div class="panel panel-default">

                                @foreach($goal->objectives as $objective)

                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion2" href="#collapseobjective{{ $objective->id }}">{{ $objective->body }}</a>
                                        </h4>
                                    </div>
                                    <div id="collapseobjective{{ $objective->id }}" class="panel-collapse collapse in">
                                        <div class="panel-body">
                                            <!--<p>{{ $objective->body }}</p>-->

                                            <div class="bs-example3">
                                                <div class="panel-group" id="accordion3">
                                                    <div class="panel panel-default">

                                                        @foreach($objective->actions as $action)

                                                            <div class="panel-heading">
                                                                <h4 class="panel-title">
                                                                    <a data-toggle="collapse" data-parent="#accordion3" href="#collapseaction{{ $action->id }}">{{ $action->body }}</a>
                                                                </h4>
                                                            </div>
                                                            <div id="collapseaction{{ $action->id }}" class="panel-collapse collapse in">
                                                                <div class="panel-body">
                                                                    <!--<p>{{ $action->body }}</p>-->

                                                                    <div class="bs-example4">
                                                                        <div class="panel-group" id="accordion4">
                                                                            <div class="panel panel-default">

                                                                                @foreach($action->tasks as $task)

                                                                                    <div class="panel-heading">
                                                                                        <h4 class="panel-title">
                                                                                            <a data-toggle="collapse" data-parent="#accordion4" href="#collapsetask{{ $task->id }}">Task {{ $task->id }}</a>
                                                                                        </h4>
                                                                                    </div>
                                                                                    <div id="collapsetask{{ $task->id }}" class="panel-collapse collapse in">
                                                                                        <div class="panel-body">
                                                                                            <p>{{ $task->body }}</p>
                                                                                        </div>
                                                                                    </div>

                                                                                @endforeach

                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>

                                                        @endforeach

                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                @endforeach

                            </div>

                        </div>
                    </div>
                    </body>
                </div>
            </div>
        </div>

        @endforeach

    </div>
</div>
</body>
@endsection
