@extends('layouts.app'
)
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Plan Builder</div>

                    <div class="panel-body">
                        <div class="pb-step">
                            <label for="step2Label" class="pb-label">
                                Congratulations! Your new business plan is finished!
                            </label>
                        </div>
                        <form method="get" action="/plan">
                            <button class="pb-btn" type="submit">Next</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>







@endsection