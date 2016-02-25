@extends('layouts.app')


@section('content')



    <body>
    <div class="bs-example" style="padding-left: 40px; padding-right: 40px">
        <div class="panel-group" id="accordion">
            @foreach ($goals as $goal)
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$counter}}"> {{$goal->body}} </a>
                    </h4>
                </div>
                <div id="collapse{{$counter}}" class="panel-collapse collapse in">
                    <div class="panel-body">
                        {{--Attempt accordin 2 , if you want to see the first accordion cut this part out tell end--}}
                        <body>
                        <div class="bs-example" style="padding-left: 40px; padding-right: 40px">
                            <div class="panel-group" id="accordion">
                                @foreach ($objectives as $objective)
                                    {{!!!$counter++}}
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$counter}}"> {{$objective->body}} </a>
                                            </h4>
                                        </div>
                                        <div id="collapse{{$counter}}" class="panel-collapse collapse in">
                                            <div class="panel-body">


                                            </div>
                                        </div>
                                    </div>

                                @endforeach
                            </div>
                        </div>
                        </body>
                        {{--Attempt accordin 2, here here here--}}

                    </div>
                </div>
            </div>
                {{!!!$counter++}}
            @endforeach
        </div>
    </div>
    </body>

@stop




