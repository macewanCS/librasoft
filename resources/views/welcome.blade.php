{{--@permission('mywork')--}}
@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-xs-2" style="left: 6%; width: 625px;">
            <div class="panel panel-primary">
                <div class="panel-heading" style="background: #009FD7">Announcements</div>

                <div class="panel-body" style="height: 200px">
                    <ul>
                        <li> The EPL is having Bill gates as a guest speaker sometime this year.</li>
                        <li> EPL Day celebrations at all branches on March 13, 2016</li>
                        <li> The EPL is having Reza Aslan to speak on confronting islamaphobia on May 18, 2016</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-xs-2" style="left: 7.5%; width: 625px">
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

    <div class="row">
        <div class="col-xs-2" style="left: 6%; width: 625px">
            <div class="panel panel-primary">
                <div class="panel-heading" style="background: #009FD7">Recently update</div>

                <div class="panel-body" style="height: 200px">
                    Hello
                </div>
            </div>
        </div>
        <div class="col-xs-2" style="left: 7.5%; width: 625px">
            <div class="panel panel-primary">
                <div class="panel-heading" style="background: #009FD7">Recently Finished</div>

                <div class="panel-body" style="height: 200px">
                    objective 1 is all done
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-2" style="left: 6%; width: 625px">
            <div class="panel panel-primary">
                <div class="panel-heading" style="background: #009FD7"> Recent Comments</div>

                <div class="panel-body" style="height: 200px">
                    <ul>
                        <li> comment in task 3.1</li>
                        <li> comment from objective something</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-xs-2" style="left: 7.5%; width: 625px">
            <div class="panel panel-primary">
                <div class="panel-heading" style="background: #009FD7">Due Date Approaching</div>

                <div class="panel-body" style="height: 200px">
                    <ul>
                        <li> task 3.1 is overdue </li>
                        <li> task 3.4 is due in 10 days </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection
{{--@endpermission--}}
