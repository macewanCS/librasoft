<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Plan;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PlansController extends Controller
{
    public function plan() {
        return view('layouts.plan');
    }

    public function newPlan() {
        return null;
    }
}
