<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ActionsController extends Controller
{
    public function action() {
        return view('action');
    }

    public function newAction() {
        return null;
    }
}
