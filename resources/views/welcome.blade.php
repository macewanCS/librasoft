{{--@permission('mywork')--}}
@extends('layouts.app')

@section('content')

    <div class="dashboard-row">
        <div class="col-xs-2 dashboard-panel">
            <div class="panel panel-primary">
                <div class="panel-heading" style="background: #009FD7">Recently update</div>

                <div class="panel-body" style="height: 200px">
                    <ul>
                        <li>Goal 1, Objective 1 description has been updated</li>
                    </ul>
                </div>
            </div>
        </div>

    </div>

    <div class="dashboard-row">
        <div class="col-xs-2 dashboard-panel">
            <div class="panel panel-primary">
                <div class="panel-heading" style="background: #009FD7">Recently Finished</div>

                <div class="panel-body" style="height: 200px">
                    <ul>
                        <li>Goal 1, Objective1, Action 2 has been completed</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="dashboard-row">
        <div class="col-xs-2 dashboard-panel">
            <div id="test" class="col-xs-2" style="left: 7.5%; width: 625px">
                <div class="panel panel-primary">
                    <div class="panel-heading" style="background: #009FD7">News Feed</div>

                    <div class="panel-body" style="height: 200px">
                        <ul>
                            <li> Place holder </li>
                            <li> another place holder </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xs-2 dashboard-panel">
            <div id="test" class="col-xs-2" style="left: 7.5%; width: 625px">
                <div class="panel panel-primary">
                    <div class="panel-heading" style="background: #009FD7">News Feed</div>

                    <div class="panel-body" style="height: 200px">
                        <ul>
                            <li> Place holder </li>
                            <li> another place holder </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="dashboard-row">
        <div class="col-xs-2 dashboard-panel">
            <div class="panel panel-primary">
                <div class="panel-heading" style="background: #009FD7"> Recent Comments</div>

                <div class="panel-body" style="height: 200px">
                    <ul>
                        <li> Comment added in task 3.1</li>
                        <li> Comment added to Objective 2</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-xs-2 dashboard-panel">
            <div class="panel panel-primary">
                <div class="panel-heading" style="background: #009FD7">Due Dates</div>

                <div class="panel-body" style="height: 200px">
                    <ul>
                        <li> Task 3.1 is overdue </li>
                        <li> Task 3.4 due in 10 days </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection
{{--@endpermission--}}
