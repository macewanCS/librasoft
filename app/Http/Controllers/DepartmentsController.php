<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Http\Request;

use App\Http\Requests;

class DepartmentsController extends Controller
{
    public function show(Department $department){
        return view('departments.show')->with('department', $department);
    }
}
