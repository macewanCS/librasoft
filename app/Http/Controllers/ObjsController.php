<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ObjsController extends Controller
{
    public function obj() {
        return view('layouts.obj');
    }

    public function newObjs() {
        return null;
    }
}
