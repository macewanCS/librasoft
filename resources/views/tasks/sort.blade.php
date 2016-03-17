@extends('layouts.app')

@section('content')

    <?php

        switch ($option) {
            case "goals":
                break;
            case "objectives":
                break;
            case "actions":
                break;
            case "tasks":
                break;
            case "departmentteam":
                break;
            case "nonbusinessplan":
                break;
        }

    ?>

    <div class="content" style="padding: 10px;">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4 class="panel-title">Hello World</h4>
            </div>
            <div class="panel-body">
                <p>$option</p>
            </div>
            <table class="table" @if($option != "goals") hidden="hidden" @endif>
                <thead>
                <tr>
                    <td>Hello</td>
                </tr>
                </thead>

                <tbody>
                <tr>
                    <td>World</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>



@stop
