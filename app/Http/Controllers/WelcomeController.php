<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use DB;
use Illuminate\Http\Request;
use App\Plan;

class WelcomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function welcome()
    {
        return view('welcome')->
        with('act',DB::table('actions')->orderby('updated_at', 'desc')->get())->
        with('tasks', DB::table('tasks')->orderby('updated_at', 'desc')->get())->
        with('notes', DB::table('notes')->orderby('created_at', 'desc')->get());
    }

}
