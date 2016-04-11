@extends('layouts.app')

@section('content')
<head>
        <meta charset="utf-8">
        <title>jQuery UI Datepicker - Default functionality</title>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <script type="text/javascript" src="{{ URL::asset('js/createPlan.js') }}"></script>
        <script>
            $(function() {
                $( "#datepicker" ).datepicker();
                $( "#datepicker" ).datepicker("show");
            });
        </script>
    </head>
    @role('bplead')
    <body>
    <div class="container">
        <div class="row">
            <div>
                <div class="panel panel-primary">
                    <div class="panel-heading" style="background: #009FD7;">Plan Builder</div>

                    <div class="panel-body">
                        Complete the following steps to get your new Business Plan up and running quickly!
                        <form role="form" method="POST" action="{{ url('/plan/new') }}">
                            <?php
                            $users = DB::table('users')->orderBy('name', 'asc')->get();
                            $depts = DB::table('departments')->orderBy('name', 'asc')->get();
                            $teams = DB::table('teams')->orderBy('name', 'asc')->get();
                             ?>
                            <!-- Step 1 -->
                            <div class="form-group pb-step" id="step1">
                                <label for="step1Label" class="pb-label">
                                    Step 1: Choose a plan year range:
                                </label>
                                <select name="startdate" id="startpicker"></select>
                                <select name="enddate" id="endpicker"></select>

                                <div id="toGoals">
                                    <button class="btn btn-primary pb-btn" type="button">Next</button>
                                </div>
                            </div>

                            <!-- Step 2 -->
                            <div class="form-group pb-display pb-step" id="step2">
                                <label for="step2Label" class="pb-label">Step 2:</label>
                                <div class="pb-inner-step">
                                    <label for="goal1Label" class="pb-label">Goal 1 name:</label>
                                    <textarea name="goal1" rows="1" class="pb-text"></textarea>
                                    <button id="toObjs1" class="btn btn-primary pb-arrow-btn" type="button"> > </button>
                                </div>
                                <div class="pb-inner-step">
                                    <label for="goal2Label" class="pb-label">Goal 2 name:</label>
                                    <textarea name="goal2" rows="1" class="pb-text"></textarea>
                                    <button id="toObjs2" class="btn btn-primary pb-arrow-btn" type="button"> > </button>
                                </div>

                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <div class="pb-display" id="backToPlan">
                                    <button class="btn btn-primary pb-btn" type="button">Back</button>
                                </div>

                            </div>

                            <!-- Step 3 -->
                            <!-- Step 3a -->
                            <div class="form-group pb-display pb-step" id="step3a">
                                <label for="step3Label" class="pb-label">Step 3:</label>
                                <div id="step3a" class="pb-display pb-inner-step">
                                    <label for="G1O1Label" class="pb-label">Objective 1 name:</label>
                                    <textarea name="obj1" rows="1" class="pb-text"></textarea>
                                    <button id="toActions1" class="btn btn-primary pb-arrow-btn" type="button"> > </button>
                                </div>
                                <div id="step3a" class="pb-display pb-inner-step">
                                    <label for="G1O2Label" class="pb-label">Objective 2 name:</label>
                                    <textarea name="obj2" rows="1" class="pb-text"></textarea>
                                    <button id="toActions2" class="btn btn-primary pb-arrow-btn" type="button"> > </button>
                                </div>

                                <div class="pb-display" id="backToGoals1">
                                    <button class="btn btn-primary pb-btn" type="button">Back</button>
                                </div>
                            </div>

                            <!-- Step 3b -->
                            <div class="form-group pb-display pb-step" id="step3b">
                                <label for="step3Label" class="pb-label">Step 3:</label>
                                <div id="step3b" class="pb-display pb-inner-step">
                                    <label for="G2O1Label" class="pb-label">Objective 1 name:</label>
                                    <textarea name="obj3" rows="1" class="pb-text"></textarea>
                                    <button id="toActions3" class="btn btn-primary pb-arrow-btn" type="button"> > </button>
                                </div>
                                <div id="step3b" class="pb-display pb-inner-step">
                                    <label for="G2O2Label" class="pb-label">Objective 2 name:</label>
                                    <textarea name="obj4" rows="1" class="pb-text"></textarea>
                                    <button id="toActions4" class="btn btn-primary pb-arrow-btn" type="button"> > </button>
                                </div>

                                <div class="pb-display" id="backToGoals2">
                                    <button class="btn btn-primary pb-btn" type="button">Back</button>
                                </div>
                            </div>

                            <!-- Step 4 -->
                            <!-- Step 4a -->
                            <div class="form-group pb-display pb-step" id="step4a">
                                <label for="step4Label" class="pb-label">Step 4:</label>
                                <div id="step4a" class="pb-display pb-inner-step">
                                    <label for="G1O1A1Label" class="pb-label">Action 1 name:</label>
                                    <textarea name="action1" rows="1" class="pb-text"></textarea>
                                    <button id="toTasks1" class="btn btn-primary pb-arrow-btn" type="button"> > </button>
                                    <table name="actiontable1" class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th class="pb-table-date">Due Date</th>
                                                <th class="pb-table-owner">Owner</th>
                                                <th class="pb-table-lead">Lead</th>
                                                <th class="pb-table-collab">Collaborators</th>
                                                <th class="pb-table-status">Status</th>
                                                <th class="pb-table-success">Success Measures</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="pb-table-date"><input name="dateA1" type="date" id="datepicker" class="pb-table-input"></td>
                                                <td class="pb-table-owner">
                                                    <select name="ownerA1" class="pb-table-select">
                                                        <option selected value>Select</option>
                                                        @foreach ($users as $user)
                                                            <option value="{{$user->name}}">{{ $user->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td class="pb-table-lead">
                                                    <select name="leadA1[]" class="pb-table-select-lead" multiple>
                                                        <option selected value>Select</option>
                                                        @foreach ($users as $user)
                                                            <option value="{{$user->name}}">{{ $user->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td class="pb-table-collab">
                                                    <select name="collabA1[]" class="pb-table-select-collab" multiple>
                                                        <option selected value>Select</option>
                                                        @foreach ($users as $user)
                                                            <option value="{{$user->name}}">{{ $user->name }}</option>
                                                            @endforeach
                                                        @foreach ($depts as $dept)
                                                            <option value="{{ $dept->name}}">{{ $dept->name }}</option>
                                                            @endforeach
                                                        @foreach ($teams as $team)
                                                            <option value="{{$team->name}}">{{ $team->name }}</option>
                                                            @endforeach
                                                    </select>
                                                </td>
                                                <td class="pb-table-status">
                                                    <select name="statusA1" class="pb-table-select-status">
                                                        <option selected value>Select</option>
                                                        <option value="In-Progress">In-Progress</option>
                                                        <option value="Completed">Completed</option>
                                                    </select>
                                                </td>
                                                <td class="pb-table-success"><textarea name="successA1" rows="3" class="pb-text pb-table-text"></textarea></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div id="step4a" class="pb-display pb-inner-step">
                                    <label for="G1O1A2Label" class="pb-label">Action 2 name:</label>
                                    <textarea name="action2" rows="1" class="pb-text"></textarea>
                                    <button id="toTasks2" class="btn btn-primary pb-arrow-btn" type="button"> > </button>
                                    <table name="actiontable2" class="table table-striped table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th class="pb-table-date">Due Date</th>
                                            <th class="pb-table-owner">Owner</th>
                                            <th class="pb-table-lead">Lead</th>
                                            <th class="pb-table-collab">Collaborators</th>
                                            <th class="pb-table-status">Status</th>
                                            <th class="pb-table-success">Success Measures</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td class="pb-table-date"><input name="dateA2" type="date" id="datepicker" class="pb-table-input"></td>
                                            <td class="pb-table-owner">
                                                <select name="ownerA2" class="pb-table-select">
                                                    <option selected value>Select</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->name }}">{{ $user->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="pb-table-lead">
                                                <select name="leadA2[]" class="pb-table-select-lead" multiple>
                                                    <option selected value>Select</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->name }}">{{ $user->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="pb-table-collab">
                                                <select name="collabA2[]" id="collabA2" class="pb-table-select-collab" multiple>
                                                    <option selected value>Select</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->name }}">{{ $user->name }}</option>
                                                    @endforeach
                                                    @foreach ($depts as $dept)
                                                        <option value="{{ $user->name }}">{{ $dept->name }}</option>
                                                    @endforeach
                                                    @foreach ($teams as $team)
                                                        <option value="{{ $user->name }}">{{ $team->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="pb-table-status">
                                                <select name="statusA2" class="pb-table-select-status">
                                                    <option selected value>Select</option>
                                                    <option value="In-Progress">In-Progress</option>
                                                    <option value="Completed">Completed</option>
                                                </select>
                                            </td>
                                            <td class="pb-table-success"><textarea name="successA2" rows="3" class="pb-text pb-table-text"></textarea></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="pb-display" id="backToObjs1">
                                    <button class="btn btn-primary pb-btn" type="button">Back</button>
                                </div>
                            </div>

                            <!-- Step 4b -->
                            <div class="form-group pb-display pb-step" id="step4b">
                                <label for="step4Label" class="pb-label">Step 4:</label>
                                <div id="step4b" class="pb-display pb-inner-step">
                                    <label for="G1O2A1Label" class="pb-label">Action 1 name:</label>
                                    <textarea name="action3" rows="1" class="pb-text"></textarea>
                                    <button id="toTasks3" class="btn btn-primary pb-arrow-btn" type="button"> > </button>
                                    <table name="actiontable3" class="table table-striped table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th class="pb-table-date">Due Date</th>
                                            <th class="pb-table-owner">Owner</th>
                                            <th class="pb-table-lead">Lead</th>
                                            <th class="pb-table-collab">Collaborators</th>
                                            <th class="pb-table-status">Status</th>
                                            <th class="pb-table-success">Success Measures</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td class="pb-table-date"><input name="dateA3" type="date" id="datepicker" class="pb-table-input"></td>
                                            <td class="pb-table-owner">
                                                <select name="ownerA3" class="pb-table-select">
                                                    <option selected value>Select</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->name }}">{{ $user->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="pb-table-lead">
                                                <select name="leadA3[]" class="pb-table-select-lead" multiple>
                                                    <option selected value>Select</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->name }}">{{ $user->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="pb-table-collab">
                                                <select name="collabA3[]" class="pb-table-select-collab" multiple>
                                                    <option selected value>Select</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->name }}">{{ $user->name }}</option>
                                                    @endforeach
                                                    @foreach ($depts as $dept)
                                                        <option value="{{ $user->name }}">{{ $dept->name }}</option>
                                                    @endforeach
                                                    @foreach ($teams as $team)
                                                        <option value="{{ $user->name }}">{{ $team->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="pb-table-status">
                                                <select name="statusA3" class="pb-table-select-status">
                                                    <option selected value>Select</option>
                                                    <option value="In-Progress">In-Progress</option>
                                                    <option value="Completed">Completed</option>
                                                </select>
                                            </td>
                                            <td class="pb-table-success"><textarea name="successA3" rows="3" class="pb-text pb-table-text"></textarea></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div id="step4b" class="pb-display pb-inner-step">
                                    <label for="G1O2A2Label" class="pb-label">Action 2 name:</label>
                                    <textarea name="action4" rows="1" class="pb-text"></textarea>
                                    <button id="toTasks4" class="btn btn-primary pb-arrow-btn" type="button"> > </button>
                                    <table name="actiontable4" class="table table-striped table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th class="pb-table-date">Due Date</th>
                                            <th class="pb-table-owner">Owner</th>
                                            <th class="pb-table-lead">Lead</th>
                                            <th class="pb-table-collab">Collaborators</th>
                                            <th class="pb-table-status">Status</th>
                                            <th class="pb-table-success">Success Measures</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td class="pb-table-date"><input name="dateA4" type="date" id="datepicker" class="pb-table-input"></td>
                                            <td class="pb-table-owner">
                                                <select name="ownerA4" class="pb-table-select">
                                                    <option selected value>Select</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->name }}">{{ $user->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="pb-table-lead">
                                                <select name="leadA4[]" class="pb-table-select-lead" multiple>
                                                    <option selected value>Select</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->name }}">{{ $user->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="pb-table-collab">
                                                <select name="collabA4[]" class="pb-table-select-collab" multiple>
                                                    <option selected value>Select</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->name }}">{{ $user->name }}</option>
                                                    @endforeach
                                                    @foreach ($depts as $dept)
                                                        <option value="{{ $user->name }}">{{ $dept->name }}</option>
                                                    @endforeach
                                                    @foreach ($teams as $team)
                                                        <option value="{{ $user->name }}">{{ $team->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="pb-table-status">
                                                <select name="statusA4" class="pb-table-select-status">
                                                    <option selected value>Select</option>
                                                    <option value="In-Progress">In-Progress</option>
                                                    <option value="Completed">Completed</option>
                                                </select>
                                            </td>
                                            <td class="pb-table-success"><textarea name="successA4" rows="3" class="pb-text pb-table-text"></textarea></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="pb-display" id="backToObjs2">
                                    <button class="btn btn-primary pb-btn" type="button">Back</button>
                                </div>
                            </div>

                            <!-- Step 4c -->
                            <div class="form-group pb-display pb-step" id="step4c">
                                <label for="step4Label" class="pb-label">Step 4:</label>
                                <div id="step4c" class="pb-display pb-inner-step">
                                    <label for="G2O1A1Label" class="pb-label">Action 1 name:</label>
                                    <textarea name="action5" rows="1" class="pb-text"></textarea>
                                    <button id="toTasks5" class="btn btn-primary pb-arrow-btn" type="button"> > </button>
                                    <table name="actiontable5" class="table table-striped table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th class="pb-table-date">Due Date</th>
                                            <th class="pb-table-owner">Owner</th>
                                            <th class="pb-table-lead">Lead</th>
                                            <th class="pb-table-collab">Collaborators</th>
                                            <th class="pb-table-status">Status</th>
                                            <th class="pb-table-success">Success Measures</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td class="pb-table-date"><input name="dateA5" type="date" id="datepicker" class="pb-table-input"></td>
                                            <td class="pb-table-owner">
                                                <select name="ownerA5" class="pb-table-select">
                                                    <option selected value>Select</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->name }}">{{ $user->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="pb-table-lead">
                                                <select name="leadA5[]" class="pb-table-select-lead" multiple>
                                                    <option selected value>Select</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->name }}">{{ $user->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="pb-table-collab">
                                                <select name="collabA5[]" class="pb-table-select-collab" multiple>
                                                    <option selected value>Select</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->name }}">{{ $user->name }}</option>
                                                    @endforeach
                                                    @foreach ($depts as $dept)
                                                        <option value="{{ $user->name }}">{{ $dept->name }}</option>
                                                    @endforeach
                                                    @foreach ($teams as $team)
                                                        <option value="{{ $user->name }}">{{ $team->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="pb-table-status">
                                                <select name="statusA5" class="pb-table-select-status">
                                                    <option selected value>Select</option>
                                                    <option value="In-Progress">In-Progress</option>
                                                    <option value="Completed">Completed</option>
                                                </select>
                                            </td>
                                            <td class="pb-table-success"><textarea name="successA5" rows="3" class="pb-text pb-table-text"></textarea></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div id="step4c" class="pb-display pb-inner-step">
                                    <label for="G2O1A2Label" class="pb-label">Action 2 name:</label>
                                    <textarea name="action6" rows="1" class="pb-text"></textarea>
                                    <button id="toTasks6" class="btn btn-primary pb-arrow-btn" type="button"> > </button>
                                    <table name="actiontable6" class="table table-striped table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th class="pb-table-date">Due Date</th>
                                            <th class="pb-table-owner">Owner</th>
                                            <th class="pb-table-lead">Lead</th>
                                            <th class="pb-table-collab">Collaborators</th>
                                            <th class="pb-table-status">Status</th>
                                            <th class="pb-table-success">Success Measures</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td class="pb-table-date"><input name="dateA6" type="date" id="datepicker" class="pb-table-input"></td>
                                            <td class="pb-table-owner">
                                                <select name="ownerA6" class="pb-table-select">
                                                    <option selected value>Select</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->name }}">{{ $user->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="pb-table-lead">
                                                <select name="leadA6[]" class="pb-table-select-lead" multiple>
                                                    <option selected value>Select</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->name }}">{{ $user->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="pb-table-collab">
                                                <select name="collabA6[]" class="pb-table-select-collab" multiple>
                                                    <option selected value>Select</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->name }}">{{ $user->name }}</option>
                                                    @endforeach
                                                    @foreach ($depts as $dept)
                                                        <option value="{{ $user->name }}">{{ $dept->name }}</option>
                                                    @endforeach
                                                    @foreach ($teams as $team)
                                                        <option value="{{ $user->name }}">{{ $team->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="pb-table-status">
                                                <select name="statusA6" class="pb-table-select-status">
                                                    <option selected value>Select</option>
                                                    <option value="In-Progress">In-Progress</option>
                                                    <option value="Completed">Completed</option>
                                                </select>
                                            </td>
                                            <td class="pb-table-success"><textarea name="successA6" rows="3" class="pb-text pb-table-text"></textarea></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="pb-display" id="backToObjs3">
                                    <button class="btn btn-primary pb-btn" type="button">Back</button>
                                </div>
                            </div>

                            <!-- Step 4d -->
                            <div class="form-group pb-display pb-step" id="step4d">
                                <label for="step4Label" class="pb-label">Step 4:</label>
                                <div id="step4d" class="pb-display pb-inner-step">
                                    <label for="G2O2A1Label" class="pb-label">Action 1 name:</label>
                                    <textarea name="action7" rows="1" id="G2O2A1Label" class="pb-text"></textarea>
                                    <button id="toTasks7" class="btn btn-primary pb-arrow-btn" type="button"> > </button>
                                    <table name="actiontable7" class="table table-striped table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th class="pb-table-date">Due Date</th>
                                            <th class="pb-table-owner">Owner</th>
                                            <th class="pb-table-lead">Lead</th>
                                            <th class="pb-table-collab">Collaborators</th>
                                            <th class="pb-table-status">Status</th>
                                            <th class="pb-table-success">Success Measures</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td class="pb-table-date"><input name="dateA7" type="date" id="datepicker" class="pb-table-input"></td>
                                            <td class="pb-table-owner">
                                                <select name="ownerA7" class="pb-table-select">
                                                    <option selected value>Select</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->name }}">{{ $user->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="pb-table-lead">
                                                <select name="leadA7[]" class="pb-table-select-lead" multiple>
                                                    <option selected value>Select</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->name }}">{{ $user->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="pb-table-collab">
                                                <select name="collabA7[]" class="pb-table-select-collab" multiple>
                                                    <option selected value>Select</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->name }}">{{ $user->name }}</option>
                                                    @endforeach
                                                    @foreach ($depts as $dept)
                                                        <option value="{{ $user->name }}">{{ $dept->name }}</option>
                                                    @endforeach
                                                    @foreach ($teams as $team)
                                                        <option value="{{ $user->name }}">{{ $team->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="pb-table-status">
                                                <select name="statusA7" class="pb-table-select-status">
                                                    <option selected value>Select</option>
                                                    <option value="In-Progress">In-Progress</option>
                                                    <option value="Completed">Completed</option>
                                                </select>
                                            </td>
                                            <td class="pb-table-success"><textarea name="successA7" rows="3" class="pb-text pb-table-text"></textarea></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div id="step4d" class="pb-display pb-inner-step">
                                    <label for="G2O2A2Label" class="pb-label">Action 2 name:</label>
                                    <textarea name="action8" rows="1" class="pb-text"></textarea>
                                    <button id="toTasks8" class="btn btn-primary pb-arrow-btn" type="button"> > </button>
                                    <table name="actiontable8" class="table table-striped table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th class="pb-table-date">Due Date</th>
                                            <th class="pb-table-owner">Owner</th>
                                            <th class="pb-table-lead">Lead</th>
                                            <th class="pb-table-collab">Collaborators</th>
                                            <th class="pb-table-status">Status</th>
                                            <th class="pb-table-success">Success Measures</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td class="pb-table-date"><input name="dateA8" type="date" id="datepicker" class="pb-table-input"></td>
                                            <td class="pb-table-owner">
                                                <select name="ownerA8" class="pb-table-select">
                                                    <option selected value>Select</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->name }}">{{ $user->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="pb-table-lead">
                                                <select name="leadA8[]" class="pb-table-select-lead" multiple>
                                                    <option selected value>Select</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->name }}">{{ $user->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="pb-table-collab">
                                                <select name="collabA8[]" class="pb-table-select-collab" multiple>
                                                    <option selected value>Select</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->name }}">{{ $user->name }}</option>
                                                    @endforeach
                                                    @foreach ($depts as $dept)
                                                        <option value="{{ $user->name }}">{{ $dept->name }}</option>
                                                    @endforeach
                                                    @foreach ($teams as $team)
                                                        <option value="{{ $user->name }}">{{ $team->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="pb-table-status">
                                                <select name="statusA8" class="pb-table-select-status">
                                                    <option selected value>Select</option>
                                                    <option value="In-Progress">In-Progress</option>
                                                    <option value="Completed">Completed</option>
                                                </select>
                                            </td>
                                            <td class="pb-table-success"><textarea name="successA8" rows="3" class="pb-text pb-table-text"></textarea></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="pb-display" id="backToObjs4">
                                    <button class="btn btn-primary pb-btn" type="button">Back</button>
                                </div>
                            </div>

                            <!-- Step 5 -->
                            <!-- Step 5a -->
                            <div class="form-group pb-display pb-step" id="step5a">
                                <label for="step5Label" class="pb-label">Step 5:</label>
                                <div id="step5a" class="pb-display pb-inner-step">
                                    <label for="G1O1A1T1Label" class="pb-label">Task 1 name:</label>
                                    <textarea name="task1" rows="1" class="pb-text"></textarea>
                                    <table name="tasktable1" class="table table-striped table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th class="pb-table-date">Due Date</th>
                                            <th class="pb-table-owner">Owner</th>
                                            <th class="pb-table-lead">Lead</th>
                                            <th class="pb-table-collab">Collaborators</th>
                                            <th class="pb-table-status">Status</th>
                                            <th class="pb-table-success">Success Measures</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td class="pb-table-date"><input name="dateT1" type="date" id="datepicker" class="pb-table-input"></td>
                                            <td class="pb-table-owner">
                                                <select name="ownerT1" class="pb-table-select">
                                                    <option selected value>Select</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->name }}">{{ $user->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="pb-table-lead">
                                                <select name="leadT1[]" class="pb-table-select-lead" multiple>
                                                    <option selected value>Select</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->name }}">{{ $user->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="pb-table-collab">
                                                <select name="collabT1[]" class="pb-table-select-collab" multiple>
                                                    <option selected value>Select</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->name }}">{{ $user->name }}</option>
                                                    @endforeach
                                                    @foreach ($depts as $dept)
                                                        <option value="{{ $user->name }}">{{ $dept->name }}</option>
                                                    @endforeach
                                                    @foreach ($teams as $team)
                                                        <option value="{{ $user->name }}">{{ $team->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="pb-table-status">
                                                <select name="statusT1" class="pb-table-select-status">
                                                    <option selected value>Select</option>
                                                    <option value="In-Progress">In-Progress</option>
                                                    <option value="Completed">Completed</option>
                                                </select>
                                            </td>
                                            <td class="pb-table-success"><textarea name="successT1" rows="3" class="pb-text pb-table-text"></textarea></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div id="step5a" class="pb-display pb-inner-step">
                                    <label for="G1O1A1T2Label" class="pb-label">Task 2 name:</label>
                                    <textarea name="task2" rows="1" class="pb-text"></textarea>
                                    <table name="tasktable2" class="table table-striped table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th class="pb-table-date">Due Date</th>
                                            <th class="pb-table-owner">Owner</th>
                                            <th class="pb-table-lead">Lead</th>
                                            <th class="pb-table-collab">Collaborators</th>
                                            <th class="pb-table-status">Status</th>
                                            <th class="pb-table-success">Success Measures</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td class="pb-table-date"><input name="dateT2" type="date" id="datepicker" class="pb-table-input"></td>
                                            <td class="pb-table-owner">
                                                <select name="ownerT2" class="pb-table-select">
                                                    <option selected value>Select</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->name }}">{{ $user->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="pb-table-lead">
                                                <select name="leadT2[]" class="pb-table-select-lead" multiple>
                                                    <option selected value>Select</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->name }}">{{ $user->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="pb-table-collab">
                                                <select name="collabT2[]" class="pb-table-select-collab" multiple>
                                                    <option selected value>Select</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->name }}">{{ $user->name }}</option>
                                                    @endforeach
                                                    @foreach ($depts as $dept)
                                                        <option value="{{ $user->name }}">{{ $dept->name }}</option>
                                                    @endforeach
                                                    @foreach ($teams as $team)
                                                        <option value="{{ $user->name }}">{{ $team->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="pb-table-status">
                                                <select name="statusT2" class="pb-table-select-status">
                                                    <option selected value>Select</option>
                                                    <option value="In-Progress">In-Progress</option>
                                                    <option value="Completed">Completed</option>
                                                </select>
                                            </td>
                                            <td class="pb-table-success"><textarea name="successT2" rows="3" class="pb-text pb-table-text"></textarea></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="pb-display" id="backToActions1">
                                    <button class="btn btn-primary pb-btn" type="button">Back</button>
                                    <button class="btn btn-primary pb-submit-btn" type="submit">Submit</button>
                                </div>
                            </div>

                            <!-- Step 5b -->
                            <div class="form-group pb-display pb-step" id="step5b">
                                <label for="step5Label" class="pb-label">Step 5:</label>
                                <div id="step5b" class="pb-display pb-inner-step">
                                    <label for="G1O1A2T1Label" class="pb-label">Task 1 name:</label>
                                    <textarea name="task3" rows="1" class="pb-text"></textarea>
                                    <table name="tasktable3" class="table table-striped table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th class="pb-table-date">Due Date</th>
                                            <th class="pb-table-owner">Owner</th>
                                            <th class="pb-table-lead">Lead</th>
                                            <th class="pb-table-collab">Collaborators</th>
                                            <th class="pb-table-status">Status</th>
                                            <th class="pb-table-success">Success Measures</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td class="pb-table-date"><input name="dateT3" type="date" id="datepicker" class="pb-table-input"></td>
                                            <td class="pb-table-owner">
                                                <select name="ownerT3" class="pb-table-select">
                                                    <option selected value>Select</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->name }}">{{ $user->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="pb-table-lead">
                                                <select name="leadT3[]" class="pb-table-select-lead" multiple>
                                                    <option selected value>Select</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->name }}">{{ $user->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="pb-table-collab">
                                                <select name="collabT3[]" class="pb-table-select-collab" multiple>
                                                    <option selected value>Select</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->name }}">{{ $user->name }}</option>
                                                    @endforeach
                                                    @foreach ($depts as $dept)
                                                        <option value="{{ $user->name }}">{{ $dept->name }}</option>
                                                    @endforeach
                                                    @foreach ($teams as $team)
                                                        <option value="{{ $user->name }}">{{ $team->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="pb-table-status">
                                                <select name="statusT3" class="pb-table-select-status">
                                                    <option selected value>Select</option>
                                                    <option value="In-Progress">In-Progress</option>
                                                    <option value="Completed">Completed</option>
                                                </select>
                                            </td>
                                            <td class="pb-table-success"><textarea name="successT3" rows="3" class="pb-text pb-table-text"></textarea></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div id="step5b" class="pb-display pb-inner-step">
                                    <label for="G1O1A2T2Label" class="pb-label">Task 2 name:</label>
                                    <textarea name="task4" rows="1" class="pb-text"></textarea>
                                    <table name="tasktable4" class="table table-striped table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th class="pb-table-date">Due Date</th>
                                            <th class="pb-table-owner">Owner</th>
                                            <th class="pb-table-lead">Lead</th>
                                            <th class="pb-table-collab">Collaborators</th>
                                            <th class="pb-table-status">Status</th>
                                            <th class="pb-table-success">Success Measures</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td class="pb-table-date"><input name="dateT4" type="date" id="datepicker" class="pb-table-input"></td>
                                            <td class="pb-table-owner">
                                                <select name="ownerT4" class="pb-table-select">
                                                    <option selected value>Select</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->name }}">{{ $user->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="pb-table-lead">
                                                <select name="leadT4[]" class="pb-table-select-lead" multiple>
                                                    <option selected value>Select</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->name }}">{{ $user->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="pb-table-collab">
                                                <select name="collabT4[]" class="pb-table-select-collab" multiple>
                                                    <option selected value>Select</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->name }}">{{ $user->name }}</option>
                                                    @endforeach
                                                    @foreach ($depts as $dept)
                                                        <option value="{{ $user->name }}">{{ $dept->name }}</option>
                                                    @endforeach
                                                    @foreach ($teams as $team)
                                                        <option value="{{ $user->name }}">{{ $team->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="pb-table-status">
                                                <select name="statusT4" class="pb-table-select-status">
                                                    <option selected value>Select</option>
                                                    <option value="In-Progress">In-Progress</option>
                                                    <option value="Completed">Completed</option>
                                                </select>
                                            </td>
                                            <td class="pb-table-success"><textarea name="successT4" rows="3" class="pb-text pb-table-text"></textarea></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="pb-display" id="backToActions2">
                                    <button class="btn btn-primary pb-btn" type="button">Back</button>
                                    <button class="btn btn-primary pb-submit-btn" type="submit">Submit</button>
                                </div>
                            </div>

                            <!-- Step 5c -->
                            <div class="form-group pb-display pb-step" id="step5c">
                                <label for="step5Label" class="pb-label">Step 5:</label>
                                <div id="step5c" class="pb-display pb-inner-step">
                                    <label for="G1O2A1T1Label" class="pb-label">Task 1 name:</label>
                                    <textarea name="task5" rows="1" class="pb-text"></textarea>
                                    <table name="tasktable5" class="table table-striped table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th class="pb-table-date">Due Date</th>
                                            <th class="pb-table-owner">Owner</th>
                                            <th class="pb-table-lead">Lead</th>
                                            <th class="pb-table-collab">Collaborators</th>
                                            <th class="pb-table-status">Status</th>
                                            <th class="pb-table-success">Success Measures</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td class="pb-table-date"><input name="dateT5" type="date" id="datepicker" class="pb-table-input"></td>
                                            <td class="pb-table-owner">
                                                <select name="ownerT5" class="pb-table-select">
                                                    <option selected value>Select</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->name }}">{{ $user->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="pb-table-lead">
                                                <select name="leadT5[]" class="pb-table-select-lead" multiple>
                                                    <option selected value>Select</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->name }}">{{ $user->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="pb-table-collab">
                                                <select name="collabT5[]" class="pb-table-select-collab" multiple>
                                                    <option selected value>Select</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->name }}">{{ $user->name }}</option>
                                                    @endforeach
                                                    @foreach ($depts as $dept)
                                                        <option value="{{ $user->name }}">{{ $dept->name }}</option>
                                                    @endforeach
                                                    @foreach ($teams as $team)
                                                        <option value="{{ $user->name }}">{{ $team->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="pb-table-status">
                                                <select name="statusT5" class="pb-table-select-status">
                                                    <option selected value>Select</option>
                                                    <option value="In-Progress">In-Progress</option>
                                                    <option value="Completed">Completed</option>
                                                </select>
                                            </td>
                                            <td class="pb-table-success"><textarea name="successT5" rows="3" class="pb-text pb-table-text"></textarea></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div id="step5b" class="pb-display pb-inner-step">
                                    <label for="G1O2A1T2Label" class="pb-label">Task 2 name:</label>
                                    <textarea name="task6" rows="1" class="pb-text"></textarea>
                                    <table name="tasktable6" class="table table-striped table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th class="pb-table-date">Due Date</th>
                                            <th class="pb-table-owner">Owner</th>
                                            <th class="pb-table-lead">Lead</th>
                                            <th class="pb-table-collab">Collaborators</th>
                                            <th class="pb-table-status">Status</th>
                                            <th class="pb-table-success">Success Measures</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td class="pb-table-date"><input name="dateT6" type="date" id="datepicker" class="pb-table-input"></td>
                                            <td class="pb-table-owner">
                                                <select name="ownerT6" class="pb-table-select">
                                                    <option selected value>Select</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->name }}">{{ $user->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="pb-table-lead">
                                                <select name="leadT6[]" class="pb-table-select-lead" multiple>
                                                    <option selected value>Select</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->name }}">{{ $user->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="pb-table-collab">
                                                <select name="collabT6[]" class="pb-table-select-collab" multiple>
                                                    <option selected value>Select</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->name }}">{{ $user->name }}</option>
                                                    @endforeach
                                                    @foreach ($depts as $dept)
                                                        <option value="{{ $user->name }}">{{ $dept->name }}</option>
                                                    @endforeach
                                                    @foreach ($teams as $team)
                                                        <option value="{{ $user->name }}">{{ $team->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="pb-table-status">
                                                <select name="statusT6" class="pb-table-select-status">
                                                    <option selected value>Select</option>
                                                    <option value="In-Progress">In-Progress</option>
                                                    <option value="Completed">Completed</option>
                                                </select>
                                            </td>
                                            <td class="pb-table-success"><textarea name="successT6" rows="3" class="pb-text pb-table-text"></textarea></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="pb-display" id="backToActions3">
                                    <button class="btn btn-primary pb-btn" type="button">Back</button>
                                    <button class="btn btn-primary pb-submit-btn" type="submit">Submit</button>
                                </div>
                            </div>

                            <!-- Step 5d -->
                            <div class="form-group pb-display pb-step" id="step5d">
                                <label for="step5Label" class="pb-label">Step 5:</label>
                                <div id="step5d" class="pb-display pb-inner-step">
                                    <label for="G1O2A2T1Label" class="pb-label">Task 1 name:</label>
                                    <textarea name="task7" rows="1" class="pb-text"></textarea>
                                    <table name="tasktable7" class="table table-striped table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th class="pb-table-date">Due Date</th>
                                            <th class="pb-table-owner">Owner</th>
                                            <th class="pb-table-lead">Lead</th>
                                            <th class="pb-table-collab">Collaborators</th>
                                            <th class="pb-table-status">Status</th>
                                            <th class="pb-table-success">Success Measures</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td class="pb-table-date"><input name="dateT7" type="date" id="datepicker" class="pb-table-input"></td>
                                            <td class="pb-table-owner">
                                                <select name="ownerT7" class="pb-table-select">
                                                    <option selected value>Select</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->name }}">{{ $user->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="pb-table-lead">
                                                <select name="leadT7[]" class="pb-table-select-lead" multiple>
                                                    <option selected value>Select</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->name }}">{{ $user->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="pb-table-collab">
                                                <select name="collabT7[]" class="pb-table-select-collab" multiple>
                                                    <option selected value>Select</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->name }}">{{ $user->name }}</option>
                                                    @endforeach
                                                    @foreach ($depts as $dept)
                                                        <option value="{{ $user->name }}">{{ $dept->name }}</option>
                                                    @endforeach
                                                    @foreach ($teams as $team)
                                                        <option value="{{ $user->name }}">{{ $team->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="pb-table-status">
                                                <select name="statusT7" class="pb-table-select-status">
                                                    <option selected value>Select</option>
                                                    <option value="In-Progress">In-Progress</option>
                                                    <option value="Completed">Completed</option>
                                                </select>
                                            </td>
                                            <td class="pb-table-success"><textarea name="successT7" rows="3" class="pb-text pb-table-text"></textarea></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div id="step5d" class="pb-display pb-inner-step">
                                    <label for="G1O2A2T2Label" class="pb-label">Task 2 name:</label>
                                    <textarea name="task8" rows="1" class="pb-text"></textarea>
                                    <table name="tasktable8" class="table table-striped table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th class="pb-table-date">Due Date</th>
                                            <th class="pb-table-owner">Owner</th>
                                            <th class="pb-table-lead">Lead</th>
                                            <th class="pb-table-collab">Collaborators</th>
                                            <th class="pb-table-status">Status</th>
                                            <th class="pb-table-success">Success Measures</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td class="pb-table-date"><input name="dateT8" type="date" id="datepicker" class="pb-table-input"></td>
                                            <td class="pb-table-owner">
                                                <select name="ownerT8" class="pb-table-select">
                                                    <option selected value>Select</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->name }}">{{ $user->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="pb-table-lead">
                                                <select name="leadT8[]" class="pb-table-select-lead" multiple>
                                                    <option selected value>Select</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->name }}">{{ $user->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="pb-table-collab">
                                                <select name="collabT8[]" class="pb-table-select-collab" multiple>
                                                    <option selected value>Select</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->name }}">{{ $user->name }}</option>
                                                    @endforeach
                                                    @foreach ($depts as $dept)
                                                        <option value="{{ $user->name }}">{{ $dept->name }}</option>
                                                    @endforeach
                                                    @foreach ($teams as $team)
                                                        <option value="{{ $user->name }}">{{ $team->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="pb-table-status">
                                                <select name="statusT8" class="pb-table-select-status">
                                                    <option selected value>Select</option>
                                                    <option value="In-Progress">In-Progress</option>
                                                    <option value="Completed">Completed</option>
                                                </select>
                                            </td>
                                            <td class="pb-table-success"><textarea name="successT8" rows="3" class="pb-text pb-table-text"></textarea></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="pb-display" id="backToActions4">
                                    <button class="btn btn-primary pb-btn" type="button">Back</button>
                                    <button class="btn btn-primary pb-submit-btn" type="submit">Submit</button>
                                </div>
                            </div>

                            <!-- Step 5e -->
                            <div class="form-group pb-display pb-step" id="step5e">
                                <label for="step5Label" class="pb-label">Step 5:</label>
                                <div id="step5e" class="pb-display pb-inner-step">
                                    <label for="G2O1A1T1Label" class="pb-label">Task 1 name:</label>
                                    <textarea name="task9" rows="1" class="pb-text"></textarea>
                                    <table name="tasktable9" class="table table-striped table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th class="pb-table-date">Due Date</th>
                                            <th class="pb-table-owner">Owner</th>
                                            <th class="pb-table-lead">Lead</th>
                                            <th class="pb-table-collab">Collaborators</th>
                                            <th class="pb-table-status">Status</th>
                                            <th class="pb-table-success">Success Measures</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td class="pb-table-date"><input name="dateT9" type="date" id="datepicker" class="pb-table-input"></td>
                                            <td class="pb-table-owner">
                                                <select name="ownerT9" class="pb-table-select">
                                                    <option selected value>Select</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->name }}">{{ $user->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="pb-table-lead">
                                                <select name="leadT9[]" class="pb-table-select-lead" multiple>
                                                    <option selected value>Select</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->name }}">{{ $user->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="pb-table-collab">
                                                <select name="collabT9[]" class="pb-table-select-collab" multiple>
                                                    <option selected value>Select</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->name }}">{{ $user->name }}</option>
                                                    @endforeach
                                                    @foreach ($depts as $dept)
                                                        <option value="{{ $user->name }}">{{ $dept->name }}</option>
                                                    @endforeach
                                                    @foreach ($teams as $team)
                                                        <option value="{{ $user->name }}">{{ $team->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="pb-table-status">
                                                <select name="statusT9" class="pb-table-select-status">
                                                    <option selected value>Select</option>
                                                    <option value="In-Progress">In-Progress</option>
                                                    <option value="Completed">Completed</option>
                                                </select>
                                            </td>
                                            <td class="pb-table-success"><textarea name="successT9" rows="3" class="pb-text pb-table-text"></textarea></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div id="step5e" class="pb-display pb-inner-step">
                                    <label for="G2O1A1T2Label" class="pb-label">Task 2 name:</label>
                                    <textarea name="task10" rows="1" class="pb-text"></textarea>
                                    <table name="tasktable10" class="table table-striped table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th class="pb-table-date">Due Date</th>
                                            <th class="pb-table-owner">Owner</th>
                                            <th class="pb-table-lead">Lead</th>
                                            <th class="pb-table-collab">Collaborators</th>
                                            <th class="pb-table-status">Status</th>
                                            <th class="pb-table-success">Success Measures</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td class="pb-table-date"><input name="dateT10" type="date" id="datepicker" class="pb-table-input"></td>
                                            <td class="pb-table-owner">
                                                <select name="ownerT10" class="pb-table-select">
                                                    <option selected value>Select</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->name }}">{{ $user->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="pb-table-lead">
                                                <select name="leadT10[]" class="pb-table-select-lead" multiple>
                                                    <option selected value>Select</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->name }}">{{ $user->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="pb-table-collab">
                                                <select name="collabT10[]" class="pb-table-select-collab" multiple>
                                                    <option selected value>Select</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->name }}">{{ $user->name }}</option>
                                                    @endforeach
                                                    @foreach ($depts as $dept)
                                                        <option value="{{ $user->name }}">{{ $dept->name }}</option>
                                                    @endforeach
                                                    @foreach ($teams as $team)
                                                        <option value="{{ $user->name }}">{{ $team->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="pb-table-status">
                                                <select name="statusT10" class="pb-table-select-status">
                                                    <option selected value>Select</option>
                                                    <option value="In-Progress">In-Progress</option>
                                                    <option value="Completed">Completed</option>
                                                </select>
                                            </td>
                                            <td class="pb-table-success"><textarea name="successT10" rows="3" class="pb-text pb-table-text"></textarea></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="pb-display" id="backToActions5">
                                    <button class="btn btn-primary pb-btn" type="button">Back</button>
                                    <button class="btn btn-primary pb-submit-btn" type="submit">Submit</button>
                                </div>
                            </div>

                            <!-- Step 5f -->
                            <div class="form-group pb-display pb-step" id="step5f">
                                <label for="step5Label" class="pb-label">Step 5:</label>
                                <div id="step5f" class="pb-display pb-inner-step">
                                    <label for="G2O1A2T1Label" class="pb-label">Task 1 name:</label>
                                    <textarea name="task11" rows="1" class="pb-text"></textarea>
                                    <table name="tasktable11" class="table table-striped table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th class="pb-table-date">Due Date</th>
                                            <th class="pb-table-owner">Owner</th>
                                            <th class="pb-table-lead">Lead</th>
                                            <th class="pb-table-collab">Collaborators</th>
                                            <th class="pb-table-status">Status</th>
                                            <th class="pb-table-success">Success Measures</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td class="pb-table-date"><input name="dateT11" type="date" id="datepicker" class="pb-table-input"></td>
                                            <td class="pb-table-owner">
                                                <select name="ownerT11" class="pb-table-select">
                                                    <option selected value>Select</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->name }}">{{ $user->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="pb-table-lead">
                                                <select name="leadT11[]" class="pb-table-select-lead" multiple>
                                                    <option selected value>Select</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->name }}">{{ $user->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="pb-table-collab">
                                                <select name="collabT11[]" class="pb-table-select-collab" multiple>
                                                    <option selected value>Select</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->name }}">{{ $user->name }}</option>
                                                    @endforeach
                                                    @foreach ($depts as $dept)
                                                        <option value="{{ $user->name }}">{{ $dept->name }}</option>
                                                    @endforeach
                                                    @foreach ($teams as $team)
                                                        <option value="{{ $user->name }}">{{ $team->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="pb-table-status">
                                                <select name="statusT11" class="pb-table-select-status">
                                                    <option selected value>Select</option>
                                                    <option value="In-Progress">In-Progress</option>
                                                    <option value="Completed">Completed</option>
                                                </select>
                                            </td>
                                            <td class="pb-table-success"><textarea name="successT11" rows="3" class="pb-text pb-table-text"></textarea></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div id="step5f" class="pb-display pb-inner-step">
                                    <label for="G2O1A2T2Label" class="pb-label">Task 2 name:</label>
                                    <textarea name="task12" rows="1" class="pb-text"></textarea>
                                    <table name="tasktable12" class="table table-striped table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th class="pb-table-date">Due Date</th>
                                            <th class="pb-table-owner">Owner</th>
                                            <th class="pb-table-lead">Lead</th>
                                            <th class="pb-table-collab">Collaborators</th>
                                            <th class="pb-table-status">Status</th>
                                            <th class="pb-table-success">Success Measures</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td class="pb-table-date"><input name="dateT12" type="date" id="datepicker" class="pb-table-input"></td>
                                            <td class="pb-table-owner">
                                                <select name="ownerT12" class="pb-table-select">
                                                    <option selected value>Select</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->name }}">{{ $user->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="pb-table-lead">
                                                <select name="leadT12[]" class="pb-table-select-lead" multiple>
                                                    <option selected value>Select</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->name }}">{{ $user->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="pb-table-collab">
                                                <select name="collabT12[]" class="pb-table-select-collab" multiple>
                                                    <option selected value>Select</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->name }}">{{ $user->name }}</option>
                                                    @endforeach
                                                    @foreach ($depts as $dept)
                                                        <option value="{{ $user->name }}">{{ $dept->name }}</option>
                                                    @endforeach
                                                    @foreach ($teams as $team)
                                                        <option value="{{ $user->name }}">{{ $team->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="pb-table-status">
                                                <select name="statusT12" class="pb-table-select-status">
                                                    <option selected value>Select</option>
                                                    <option value="In-Progress">In-Progress</option>
                                                    <option value="Completed">Completed</option>
                                                </select>
                                            </td>
                                            <td class="pb-table-success"><textarea name="successT12" rows="3" class="pb-text pb-table-text"></textarea></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="pb-display" id="backToActions6">
                                    <button class="btn btn-primary pb-btn" type="button">Back</button>
                                    <button class="btn btn-primary pb-submit-btn" type="submit">Submit</button>
                                </div>
                            </div>

                            <!-- Step 5g -->
                            <div class="form-group pb-display pb-step" id="step5g">
                                <label for="step5Label" class="pb-label">Step 5:</label>
                                <div id="step5g" class="pb-display pb-inner-step">
                                    <label for="G2O2A1T1Label" class="pb-label">Task 1 name:</label>
                                    <textarea name="task13" rows="1" class="pb-text"></textarea>
                                    <table name="tasktable13" class="table table-striped table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th class="pb-table-date">Due Date</th>
                                            <th class="pb-table-owner">Owner</th>
                                            <th class="pb-table-lead">Lead</th>
                                            <th class="pb-table-collab">Collaborators</th>
                                            <th class="pb-table-status">Status</th>
                                            <th class="pb-table-success">Success Measures</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td class="pb-table-date"><input name="dateT13" type="date" id="datepicker" class="pb-table-input"></td>
                                            <td class="pb-table-owner">
                                                <select name="ownerT13" class="pb-table-select">
                                                    <option selected value>Select</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->name }}">{{ $user->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="pb-table-lead">
                                                <select name="leadT13[]" class="pb-table-select-lead" multiple>
                                                    <option selected value>Select</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->name }}">{{ $user->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="pb-table-collab">
                                                <select name="collabT13[]" class="pb-table-select-collab" multiple>
                                                    <option selected value>Select</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->name }}">{{ $user->name }}</option>
                                                    @endforeach
                                                    @foreach ($depts as $dept)
                                                        <option value="{{ $user->name }}">{{ $dept->name }}</option>
                                                    @endforeach
                                                    @foreach ($teams as $team)
                                                        <option value="{{ $user->name }}">{{ $team->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="pb-table-status">
                                                <select name="statusT13" class="pb-table-select-status">
                                                    <option selected value>Select</option>
                                                    <option value="In-Progress">In-Progress</option>
                                                    <option value="Completed">Completed</option>
                                                </select>
                                            </td>
                                            <td class="pb-table-success"><textarea name="successT13" rows="3" class="pb-text pb-table-text"></textarea></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div id="step5g" class="pb-display pb-inner-step">
                                    <label for="G2O2A1T2Label" class="pb-label">Task 2 name:</label>
                                    <textarea name="task14" rows="1" class="pb-text"></textarea>
                                    <table name="tasktable14" class="table table-striped table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th class="pb-table-date">Due Date</th>
                                            <th class="pb-table-owner">Owner</th>
                                            <th class="pb-table-lead">Lead</th>
                                            <th class="pb-table-collab">Collaborators</th>
                                            <th class="pb-table-status">Status</th>
                                            <th class="pb-table-success">Success Measures</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td class="pb-table-date"><input name="dateT14" type="date" id="datepicker" class="pb-table-input"></td>
                                            <td class="pb-table-owner">
                                                <select name="ownerT14" class="pb-table-select">
                                                    <option selected value>Select</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->name }}">{{ $user->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="pb-table-lead">
                                                <select name="leadT14[]" class="pb-table-select-lead" multiple>
                                                    <option selected value>Select</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->name }}">{{ $user->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="pb-table-collab">
                                                <select name="collabT14[]" class="pb-table-select-collab" multiple>
                                                    <option selected value>Select</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->name }}">{{ $user->name }}</option>
                                                    @endforeach
                                                    @foreach ($depts as $dept)
                                                        <option value="{{ $user->name }}">{{ $dept->name }}</option>
                                                    @endforeach
                                                    @foreach ($teams as $team)
                                                        <option value="{{ $user->name }}">{{ $team->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="pb-table-status">
                                                <select name="statusT14" class="pb-table-select-status">
                                                    <option selected value>Select</option>
                                                    <option value="In-Progress">In-Progress</option>
                                                    <option value="Completed">Completed</option>
                                                </select>
                                            </td>
                                            <td class="pb-table-success"><textarea name="successT14" rows="3" class="pb-text pb-table-text"></textarea></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="pb-display" id="backToActions7">
                                    <button class="btn btn-primary pb-btn" type="button">Back</button>
                                    <button class="btn btn-primary pb-submit-btn" type="submit">Submit</button>
                                </div>
                            </div>

                            <!-- Step 5h -->
                            <div class="form-group pb-display pb-step" id="step5h">
                                <label for="step5Label" class="pb-label">Step 5:</label>
                                <div id="step5h" class="pb-display pb-inner-step">
                                    <label for="G2O2A2T1Label" class="pb-label">Task 1 name:</label>
                                    <textarea name="task15" rows="1" class="pb-text"></textarea>
                                    <table name="tasktable15" class="table table-striped table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th class="pb-table-date">Due Date</th>
                                            <th class="pb-table-owner">Owner</th>
                                            <th class="pb-table-lead">Lead</th>
                                            <th class="pb-table-collab">Collaborators</th>
                                            <th class="pb-table-status">Status</th>
                                            <th class="pb-table-success">Success Measures</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td class="pb-table-date"><input name="dateT15" type="date" id="datepicker" class="pb-table-input"></td>
                                            <td class="pb-table-owner">
                                                <select name="ownerT15" class="pb-table-select">
                                                    <option selected value>Select</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->name }}">{{ $user->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="pb-table-lead">
                                                <select name="leadT15[]" class="pb-table-select-lead" multiple>
                                                    <option selected value>Select</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->name }}">{{ $user->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="pb-table-collab">
                                                <select name="collabT15[]" class="pb-table-select-collab" multiple>
                                                    <option selected value>Select</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->name }}">{{ $user->name }}</option>
                                                    @endforeach
                                                    @foreach ($depts as $dept)
                                                        <option value="{{ $user->name }}">{{ $dept->name }}</option>
                                                    @endforeach
                                                    @foreach ($teams as $team)
                                                        <option value="{{ $user->name }}">{{ $team->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="pb-table-status">
                                                <select name="statusT15" class="pb-table-select-status">
                                                    <option selected value>Select</option>
                                                    <option value="In-Progress">In-Progress</option>
                                                    <option value="Completed">Completed</option>
                                                </select>
                                            </td>
                                            <td class="pb-table-success"><textarea name="successT15" rows="3" class="pb-text pb-table-text"></textarea></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div id="step5h" class="pb-display pb-inner-step">
                                    <label for="G2O2A2T2Label" class="pb-label">Task 2 name:</label>
                                    <textarea name="task16" rows="1" class="pb-text"></textarea>
                                    <table name="tasktable16" class="table table-striped table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th class="pb-table-date">Due Date</th>
                                            <th class="pb-table-owner">Owner</th>
                                            <th class="pb-table-lead">Lead</th>
                                            <th class="pb-table-collab">Collaborators</th>
                                            <th class="pb-table-status">Status</th>
                                            <th class="pb-table-success">Success Measures</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td class="pb-table-date"><input name="dateT16" type="date" id="datepicker" class="pb-table-input"></td>
                                            <td class="pb-table-owner">
                                                <select name="ownerT16" class="pb-table-select">
                                                    <option selected value>Select</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->name }}">{{ $user->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="pb-table-lead">
                                                <select name="leadT16[]" class="pb-table-select-lead" multiple>
                                                    <option selected value>Select</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->name }}">{{ $user->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="pb-table-collab">
                                                <select name="collabT16[]" class="pb-table-select-collab" multiple>
                                                    <option selected value>Select</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->name }}">{{ $user->name }}</option>
                                                    @endforeach
                                                    @foreach ($depts as $dept)
                                                        <option value="{{ $user->name }}">{{ $dept->name }}</option>
                                                    @endforeach
                                                    @foreach ($teams as $team)
                                                        <option value="{{ $user->name }}">{{ $team->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="pb-table-status">
                                                <select name="statusT16" class="pb-table-select-status">
                                                    <option selected value>Select</option>
                                                    <option value="In-Progress">In-Progress</option>
                                                    <option value="Completed">Completed</option>
                                                </select>
                                            </td>
                                            <td class="pb-table-success"><textarea name="successT16" rows="3" class="pb-text pb-table-text"></textarea></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="pb-display" id="backToActions8">
                                    <button class="btn btn-primary pb-btn" type="button">Back</button>
                                    <button class="btn btn-primary pb-submit-btn" type="submit">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
    @endrole

    @role('admin|teamlead|deptlead|basicuser')
    <div class="bs-example">
        <div class="panel panel-primary">
            <div class="panel-body small-panel-body">
                <h4>Sorry! You don't have permission to access this page!</h4>
            </div>
        </div>
    </div>
    @endrole






@stop