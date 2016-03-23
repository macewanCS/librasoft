<?php

namespace App\Http\Controllers;

use App\Objective;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ObjsController extends Controller
{
    public function obj() {
        return view('obj');
    }

    public function newObjs() {
        return null;
    }

    public function show(Objective $objective){
        return view('objectives.show')->with('objective', $objective);
    }
}
