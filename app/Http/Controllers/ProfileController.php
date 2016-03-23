<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class ProfileController extends Controller
{
    public function profile() {
        return view('profile');
    }

    public function show($id)
    {
        $user = User::where('id', $id)->first();
        return view('users.show')->with('user', $user);
    }
}
