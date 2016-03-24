@extends('layouts.app')

@section('content')
    <head>
        <meta charset="utf-8">
        <title>jQuery UI Datepicker - Default functionality</title>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <link rel="stylesheet" href="/resources/demos/style.css">
        <script>
            $(function() {
                for (i = 2016; i < 2100; i++)
                {
                    $('#startpicker').append($('<option />').val(i).html(i));
                    $('#endpicker').append($('<option />').val(i).html(i));
                }
            });
        </script>
    </head>
    <body>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Plan Builder</div>

                    <div class="panel-body">
                        Complete the following steps to get your new Business Plan up and running quickly!
                        <form role="form" method="POST" action="{{ url('/plan/new') }}">
                            <div class="form-group" style="padding-left: 25px; padding-top: 30px;">
                                <label for="step1Label" style="font-size: 14pt;">
                                    Step 1: Choose a plan year range:
                                </label>
                                <select name="startdate" id="startpicker"></select>
                                <select name="enddate" id="endpicker"></select>
                            </div>

                            <div class="form-group" style="padding-left: 25px;">
                                <label for="step2Label" style="font-size: 14pt;">Step 2:</label>
                                <div>
                                    <label for="goal1Label" class="col-sm-2" style="font-size: 14pt;">Goal 1 name:</label>
                                    <textarea name="goal1" rows="1" required style="resize:none"></textarea>
                                </div>
                                <div>
                                    <label for="goal2Label" class="col-sm-2" style="font-size: 14pt;">Goal 2 name:</label>
                                    <textarea name="goal2" rows="1" required style="resize:none"></textarea>
                                </div>
                                <div>
                                    <label for="goal3Label" class="col-sm-2" style="font-size: 14pt;">Goal 3 name:</label>
                                    <textarea name="goal3" rows="1" required style="resize:none"></textarea>
                                </div>
                                <div>
                                    <label for="goal4Label" class="col-sm-2" style="font-size: 14pt;">Goal 4 name:</label>
                                    <textarea name="goal4" rows="1" required style="resize:none"></textarea>
                                </div>
                            </div>

                            <div class="form-group" style="padding-left: 25px">
                                <label for="step3Label" style="font-size: 14pt;">Step 3:</label>
                                <div>
                                    <label for="obj1Label" class="col-sm-3" style="font-size: 14pt;">Objective 1 name:</label>
                                    <textarea name="obj1" rows="1" required style="resize:none"></textarea>
                                </div>
                                <div>
                                    <label for="obj2Label" class="col-sm-3" style="font-size: 14pt;">Objective 2 name:</label>
                                    <textarea name="obj2" rows="1" required style="resize:none"></textarea>
                                </div>
                                <div>
                                    <label for="obj3Label" class="col-sm-3" style="font-size: 14pt;">Objective 3 name:</label>
                                    <textarea name="obj3" rows="1" required style="resize:none"></textarea>
                                </div>
                                <div>
                                    <label for="obj4Label" class="col-sm-3" style="font-size: 14pt;">Objective 4 name:</label>
                                    <textarea name="obj4" rows="1" required style="resize:none"></textarea>
                                </div>
                            </div>


                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div>
                                <button class="btn btn-primary col-sm-1" type="submit" style="position: relative; left: 30px; top: 5px">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>







@stop