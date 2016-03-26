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

            $(document).ready(function(){
                $('#btn1').click(function(){
                    $('#step1, #btn1').fadeOut(function(){
                        $('#step2, #btn4').fadeIn();
                    });
                });
                $('#btn4').click(function(){
                    $('#step2, #btn4').fadeOut(function() {
                        $('#step1, #btn1').fadeIn();
                    });
                });
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
                            <!-- Step 1 -->
                            <div class="form-group pb-step" id="step1">
                                <label for="step1Label" class="pb-label">
                                    Step 1: Choose a plan year range:
                                </label>
                                <select name="startdate" id="startpicker"></select>
                                <select name="enddate" id="endpicker"></select>
                            </div>
                            <div id="btn1">
                                <button class="btn btn-primary pb-btn" type="button">Next</button>
                            </div>

                            <!-- Step 2 -->
                            <div class="form-group pb-display pb-step" id="step2">
                                <label for="step2Label" class="pb-label">Step 2:</label>
                                <div class="pb-inner-step">
                                    <label for="goal1Label" class="pb-label">Goal 1 name:</label>
                                    <textarea name="goal1" rows="1" class="pb-text" required></textarea>
                                    <button class="btn btn-primary pb-arrow-btn" type="button"> > </button>
                                </div>
                                <div class="pb-inner-step">
                                    <label for="goal2Label" class="pb-label">Goal 2 name:</label>
                                    <textarea name="goal2" rows="1" class="pb-text" required></textarea>
                                    <button class="btn btn-primary pb-arrow-btn" type="button"> > </button>
                                </div>
                            </div>

                            <div class="pb-display" id="btn4">
                                <button class="btn btn-primary pb-btn" type="button">Back</button>
                            </div>

                            <!-- Step 3 -->
                            <div class="form-group pb-display pb-step" id="step3">
                                <label for="step3Label" class="pb-label-font">Step 3:</label>
                                <div id="step3a" style="display:none">
                                    <label for="G1O1Label" class="col-sm-3 pb-label-font">Objective 1 name:</label>
                                    <textarea name="obj1" rows="1" required style="resize:none"></textarea>
                                </div>
                                <div id="step3a" style="display:none">
                                    <label for="obj2Label" class="col-sm-3" style="font-size: 14pt;">Objective 2 name:</label>
                                    <textarea name="obj2" rows="1" required style="resize:none"></textarea>
                                </div>
                                <div id="step3b" style="display:none">
                                    <label for="G2O1Label" class="col-sm-3" style="font-size: 14pt;">Objective 1 name:</label>
                                    <textarea name="obj3" rows="1" required style="resize:none"></textarea>
                                </div>
                                <div id="step3b" style="display:none">
                                    <label for="G2O2Label" class="col-sm-3" style="font-size: 14pt;">Objective 2 name:</label>
                                    <textarea name="obj4" rows="1" required style="resize:none"></textarea>
                                </div>
                            </div>

                            <!-- Step 4 -->

                            <!-- Step 5 -->

                            <!-- Submit everything -->
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div>
                                <button class="btn btn-primary col-sm-1" type="submit" style="display: none; position: relative; left: 30px; top: 5px">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>







@stop