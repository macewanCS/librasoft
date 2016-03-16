@extends('layouts.app'
)
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Plan Builder</div>

                    <div class="panel-body">
                        <form role="form" method="POST" action="{{ url('/plan/new/goal') }}">
                            <div class="form-group row" style="padding-left: 25px; padding-top: 15px">
                                <label for="step2Label" class="col-sm-8" style="font-size: 14pt">
                                    Congratulations! Your new business plan is finished!
                                </label>
                            </div>
                            <div>
                                <button class="col-sm-1" type="submit" style="position: relative; left: 30px; top: 10px">Next</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>







@endsection