@extends('layouts.app')


@section('content')
    <head>
        <meta charset="utf-8">
        <title>jQuery UI Dialog - Default functionality</title>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

    </head>
    <body>

    <div class="hide fade">
        <div id="dialog"  title="hello" class="panel panel-primary">
            <div class="panel-body">
                <p>This is the default dialog which is useful for displaying information.</p>
            </div>
        </div>
    </div>

    <div>
        <button onclick="popup()"> hello</button>
    </div>

    </body>

    <script type="text/javascript" src="{{URL::asset('js/popUpWindow.js')}}"></script>
    <script type="text/html" src="{{URL::asset('html/popUpForm.html')}}"></script>
@stop




