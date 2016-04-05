<?php

namespace App\Http\Controllers;

//use Illuminate\Foundation\Auth\User;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

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

        $user->create([
            'name' => $request['name'],
            'email' => $request['email'],
            'department' => $request['department'],
            'permission' => $request['permission'],
            'password' => bcrypt($request['password']),
        ]);
        //$user->assignrole($data['department']);
        return back();
    }
}
