@extends('layouts.app')


@section('content')
    <div class="col-md-6" style="padding: 10px;">


            <div class="panel panel-primary">
                    <div class="panel-heading" style="background: #009FD7">Register</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="/addUser">
                            {!! csrf_field() !!}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Name</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}">

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('department') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Department</label>

                                <div class="col-md-6">
                                    <select class="form-control" name="department" value="{{ old('department') }}">
                                        {{$departments = \App\Department::all()}}
                                        @foreach( $departments as $department)
                                            <option> {{$department->name}} </option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('department'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('department') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('permission') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Permission</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="permission" value="{{ old('permission') }}">
                                        <option>Admin </option>
                                        <option>Business Plan Lead </option>
                                        <option>Department Lead</option>
                                        <option>Team Lead</option>
                                        <option>Basic user </option>
                                    </select>
                                    @if ($errors->has('permission'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('permission') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Password</label>

                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="password">

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Confirm Password</label>

                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="password_confirmation">

                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary" style="background: #009FD7">
                                        <i class="fa fa-btn fa-user"></i>Register
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>



    </div>
    <div class="col-md-6" style="padding: 10px;">

            <div class="panel panel-primary">
                <div class="panel-heading" style="background: #009FD7">Edit</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="/edituser" style="padding: 15px;">
                        <div class="form-group">
                            <label for="userselect">Select a user to edit:</label>
                            <select name="id" class="form-control" id="userselect" size=10 required>
                                @foreach(App\User::orderBy("name", "asc")->get()->all() as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-primary" style="float: right;">Edit</button>
                    </form>
                </div>
            </div>

    </div>
@endsection
