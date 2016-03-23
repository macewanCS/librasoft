<?php

namespace App\Http\Controllers;

use App\Team;
use Illuminate\Http\Request;

use App\Http\Requests;

class TeamsController extends Controller
{
    public function show(Team $team)
    {
        return view('teams.show')->with('team', $team);
    }
}
