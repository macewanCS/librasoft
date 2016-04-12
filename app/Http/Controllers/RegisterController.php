<?php

namespace App\Http\Controllers;

//use Illuminate\Foundation\Auth\User;
use App\User;
use DB;
use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;

class RegisterController extends Controller
{
    protected $fillable = [
        'name',
        'email',
        'password',
        'department',
        'permission',
    ];


    public function register(){
        return view('auth/addUser');
    }

    public function addNewUser(Request $request){
        $user = new User();

        $newUser = $user->create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'department' => $request['department'],
            'team' => '',
            'permission' => $request['permission']
        ]);

        $perm = '';

        if($request['permission'] == "Admin")
            $perm = 'admin';
        elseif($request['permission'] == "Business Plan Lead")
            $perm = 'bplead';
        elseif($request['permission'] == "Basic User")
            $perm = 'basicuser';
        elseif($request['permission'] == "Department Lead")
            $perm = 'deplead';
        elseif($request['permission'] == "Team Lead")
            $perm = 'teamlead';

        $newUser->assignrole($perm);
        return back();
    }

    public function edit(Request $request)
    {
        $user = User::find($request->id);
        return view('auth/editUser')->with("user", $user);
    }

    public function update(Request $request)
    {
        $user = User::find($request->id);
        if (isset($request->save)) {
            $user->name = $request->name;
            $user->department = $request->department;
            $user->team = $request->team;
            $user->permission = $request->permission;
            $user->assignRole(strtolower($request->permission));
            $user->save();
        } else {
            $user->delete();
        }
        return view('auth/addUser');
    }

    public function changePassword(Request $request)
    {
        $oldpassword = $request->oldpass;
        $newpassword = $request->newpass;
        $confirmedpassword = $request->confirmpass;
        $userid = $request->id;
        $user = User::find($userid);

        if (!Auth::attempt(['id' => $userid, 'password' => $oldpassword]) || $newpassword != $confirmedpassword) {
            return back();
        }
        $user->password = bcrypt($newpassword);
        $user->save();
        return view('welcome')->
            with('act',DB::table('actions')->orderby('updated_at', 'desc')->get())->
            with('tasks', DB::table('tasks')->orderby('updated_at', 'desc')->get())->
            with('notes', DB::table('notes')->orderby('created_at', 'desc')->get());
    }
}
