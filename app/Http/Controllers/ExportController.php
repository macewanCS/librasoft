<?php

namespace App\Http\Controllers;

use App;
use App\Plan;

use App\Http\Requests;
use PDF;
use View;

class ExportController extends Controller
{
    public function minimal()
    {
        return view('export.minimal')->with("plan", Plan::first());
    }
}
