@extends('layouts.app')


@section('content')



    <script type="application/javascript" src="{{URL::asset('js/addInput.js')}}"></script>
    <head>
        <meta charset="utf-8">
        <title>jQuery UI Datepicker - Default functionality</title>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <link rel="stylesheet" href="/resources/demos/style.css">
        <script type="text/javascript" src="{{ URL::asset('js/createPlan.js') }}"></script>

    </head>

    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-heading">Plan Builder</div>
                            <div class="panel-body">
                                <!-- Step 1-->
                                <div class="form-group pb-step" id="step1">
                                    <form id="date">
                                        <label for="step1Label" class="pb-label">
                                            Step 1: Choose a plan year range:
                                        </label>
                                        <select name="startdate" id="startpicker"></select>
                                        <select name="enddate" id="endpicker"></select>

                                        <div id="toGoals">
                                        <button class="btn btn-primary pb-btn" type="button">Next</button>
                                        </div>
                                    </form>
                                </div>

                                <!-- Step 2 --> 
                                <div class="form-group pb-display pb-step" id="step2"> 
                                    <label for="step2Label" class="pb-label">Step 2: Add goals</label> 
                                    <br>  
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">  
                                    <form id="goals">
                                        <div style="margin-bottom:4px;" class="clonedInput">
                                            <input type="button" class="btnDel" value="-" disabled="disabled" />
                                            <input type="text" name="input1" />
                                        </div>

                                        <div>
                                            <input type="button" id="btnAdd" value="+" />
                                        </div>
                                    </form>
                                    <div class="pb-display" id="backToPlan" style="padding-top: 20px;"> 
                                        <button class="btn btn-primary pb-btn" type="button">Back</button> 
                                        <button class="btn btn-primary pb-submit-btn" type="submit">Submit</button> 
                                        <button id="toObjs2" class="btn btn-primary pb-arrow-btn" type="button" style="float: right"> Next</button> 
                                    </div>  
                                </div>




                            </div>
                    </div>
                </div>
            </div>
        </div>
    </body>


@stop




