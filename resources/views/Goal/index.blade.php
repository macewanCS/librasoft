@extends('layouts.app')


@section('content')



    <body>
    <div class="bs-example" style="padding-left: 40px; padding-right: 40px">
        <div class="panel-group" id="accordion">
            @foreach ($goals as $goal)
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion{{$goal->id}}" href="#collapse{{$goal->id}}goal"> {{$goal->body}} </a>
                    </h4>
                </div>
                <div id="collapse{{$goal->id}}goal" class="panel-collapse collapse in">
                    <div class="panel-body">
<<<<<<< HEAD
                        <!--Attempt accordin 2 , if you want to see the first accordion cut this part out tell end-->

=======
                        {{--Attempt accordin 2 , if you want to see the first accordion cut this part out tell end--}}
>>>>>>> 922e685f41ef148bfbf230911f49d01f67fa7ec6
                        <body>
                        <div class="bs-example" style="padding-left: 40px; padding-right: 40px">
                            <div class="panel-group" id="accordion">
                                @foreach ($goal->objectives as $objective)
                                    {{!!!$counter++}}
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion{{$objective->id}}" href="#collapse{{$objective->id}}objective"> {{$objective->body}} </a>
                                            </h4>
                                        </div>
                                        <div id="collapse{{$objective->id}}objective" class="panel-collapse collapse in">
                                            <div class="panel-body">


                                            </div>
                                        </div>
                                    </div>

                                @endforeach
                            </div>
                        </div>
                        </body>
<<<<<<< HEAD
=======
                        {{--Attempt accordin 2, here here here--}}
>>>>>>> 922e685f41ef148bfbf230911f49d01f67fa7ec6

                    </div>
                </div>
            </div>

            @endforeach
        </div>
    </div>
    </body>

@stop



