@extends('layouts.app')

@section('content')

<?php
$user = Auth::user();
?>

<div class="col-md-3"></div>
<div class="col-md-6">
    <div class="panel panel-primary">
        <div class="panel-heading"><h4 class="panel-title">Password Change</h4></div>
        <div class="panel-body">
            <form class="form-horizontal" role="form" method="POST" action="/changepassword" style="padding: 15px;">
                <div class="form-group">
                    <label for="oldpass">Current Password</label>
                    <input type="password" name="oldpass" class="form-control" id="oldpass" placeholder="Current password" required>
                    <span id="helpBlock" class="help-block">Confirm your current password.</span>
                </div>
                <div class="form-group">
                    <label for="newpass">New Password</label>
                    <input type="password" name="newpass" class="form-control" id="newpass" placeholder="New password" required>
                    <span id="helpBlock" class="help-block">Enter a new password.</span>
                </div>
                <div class="form-group">
                    <label for="confirmpass">Confirm New Password</label>
                    <input type="password" name="confirmpass" class="form-control" id="confirmpass" placeholder="New password" required>
                    <span id="helpBlock" class="help-block">Confirm your new password.</span>
                </div>

                <input type="hidden" name="id" value="{{ $user->id }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button type="submit" class="btn btn-primary">Change</button>
            </form>
        </div>
    </div>
</div>
<div class="col-md-3"></div>

@stop
