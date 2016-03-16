{{--@permission('mywork')--}}
@extends('layouts.app')

@section('content')

    <div class="dashboard" style="padding: 0; font-size: 70%;">

        <div class="dashboard-row">
            <div class="col-xs-2 dashboard-panel">
                <div class="panel panel-primary">
                    <div class="panel-heading" style="background: #009FD7;">Recently updated</div>

                    <div class="panel-body" style="height: 200px;">
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

    </div>

    <script type="application/javascript">$(".panel-body").css("font-size", "85%");</script>

@endsection
{{--@endpermission--}}
