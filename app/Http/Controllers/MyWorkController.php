<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class MyWorkController extends Controller
{
    public function work(){
        return view('myWork');
    }

    public function edit() {
        return null;
    }

}
