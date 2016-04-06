@extends('layouts.app')

@section("content")

<div class="col-md-3"></div>
<div class="col-md-6">
    <div class="panel panel-primary">
        <div class="panel-heading" style="background: #009FD7;"><h4 class="panel-title">Editing {{ $user->name }}</h4></div>
        <div class="panel-body">
            <form class="form-horizontal" role="form" method="POST" action="/update" style="padding: 15px;">
                <div class="form-group">
                    <label for="userid">User ID</label>
                    <input type="text" name="visibleid" class="form-control" id="userid" value="{{ $user->id }}" required disabled>
                    <!-- Hidden input with id required as disabled ^ no longer fills the value -->
                    <input type="hidden" name="id" value="{{ $user->id }}">
                    <span id="helpBlock" class="help-block">ID cannot be edited.</span>
                </div>
                <div class="form-group">
                    <label for="username">User Name</label>
                    <input type="text" name="name" class="form-control" id="username" value="{{ $user->name }}" placeholder="{{ $user->name }}" required>
                </div>
                <div class="form-group">
                    <label for="useremail">User E-Mail</label>
                    <input type="text" name="email" class="form-control" id="useremail" value="{{ $user->email }}" required disabled>
                    <span id="helpBlock" class="help-block">E-Mail cannot be edited.</span>
                </div>
                <div class="form-group">
                    <label for="userdepartment">User Department</label>
                    <select name="department" class="form-control" size=5 required>
                        @foreach(App\Department::orderBy("name", "asc")->get()->all() as $department)
                            <option value="{{ $department->name }}" @if($department->name == $user->department) selected @endif>
                                {{ $department->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="userteam">User Team</label>
                    <select name="team" class="form-control" size=5>
                        @foreach(App\Team::orderBy("name", "asc")->get()->all() as $team)
                            <option value="{{ $team->name }}" @if($team->name == $user->team) selected @endif>
                                {{ $team->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="userpermission">User Permission Level</label>
                    <select name="permission" class="form-control" size=5 required>
                        <option value="Admin" @if("Admin" == $user->permission) selected @endif>Administrator</option>
                        <option value="BasicUser" @if("BasicUser" == $user->permission) selected @endif>Basic User</option>
                        <option value="BPLead" @if("BPLead" == $user->permission) selected @endif>BP Lead</option>
                        <option value="DepLead" @if("DepLead" == $user->permission) selected @endif>Department Lead</option>
                        <option value="TeamLead" @if("TeamLead" == $user->permission) selected @endif>Team Lead</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="userpassword">User Password</label>
                    <input type="text" name="email" class="form-control" id="userpassword" value="{{ $user->password }}" required disabled>
                    <span id="helpBlock" class="help-block">Password cannot be edited.</span>
                </div>

                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="btn-group" style="float: right;">
                    <button type="submit" class="btn btn-primary" name="save">Save</button>
                    <button type="submit" class="btn btn-primary" name="delete">Delete User</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="col-md-3"></div>

@endsection
