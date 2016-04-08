<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Department;
use App\Team;
use App\Http\Requests;
use App\User;
use App\Goal;
use App\Objective;
use App\Action;
use App\Task;
use App\Note;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $results = array();
        $term = $request->get('term');

        $goals = Goal::where('body', 'like', '%' . $term . '%')->orderBy('body', 'asc')->get();
        $objectives = Objective::where('body', 'like', '%' . $term . '%')->orderBy('body', 'asc')->get();
        $actions = Action::where('body', 'like', '%' . $term . '%')->orderBy('body', 'asc')->get();

        $tasks = Task::where('body', 'like', '%' . $term . '%')->orderBy('body', 'asc')->get();
        $teams = Team::where('name', 'like', '%' . $term . '%')->orderBy('name', 'asc')->get();
        $departments = Department::where('name', 'like', '%' . $term . '%')->orderBy('name', 'asc')->get();
        $users = User::where('name', 'like', '%' . $term . '%')->orderBy('name', 'asc')->get()->all();

        foreach (User::where('email', 'like', '%' . $term . '%')->orderBy('name', 'asc')->get() as $matching_user_email) {
            if (in_array($matching_user_email, $users))
                continue;
            $users[] = $matching_user_email;
        }

        $notes = Note::where('content', 'like', '%' . $term . '%')->orderBy('content', 'asc')->get();

        $types = [$goals, $objectives, $actions, $tasks, $teams, $departments, $users, $notes];

        foreach ($types as $type) {
            foreach ($type as $result) {
                $results[] = $result;
            }
        }

        return view('search.show')->with('results', $results)->with('term', $term);
    }
}
