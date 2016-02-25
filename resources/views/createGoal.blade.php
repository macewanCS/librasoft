@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Plan Builder</div>

                    <div class="panel-body">
                        <form role="form" method="POST" action="{{ url('/plan/new') }}">
                            <div class="form-group row" style="padding-left: 25px; padding-top: 15px">
                                <label for="step2Label" class="col-sm-4" style="font-size: 14pt">
                                    Step 2: Enter your Goals!
                                </label>

                                <input class="col-sm-3" name="body">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>







@endsection