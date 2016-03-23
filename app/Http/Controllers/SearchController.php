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

        $goals = Goal::where('body', 'like', '%' . $term . '%')->get();
        $objectives = Objective::where('body', 'like', '%' . $term . '%')->get();
        $actions = Action::where('body', 'like', '%' . $term . '%')->get();

        foreach (Action::where('item', 'like', '%' . $term . '%') as $matching_action_item) {
            $actions[] = $matching_action_item;
        }

        $tasks = Task::where('body', 'like', '%' . $term . '%')->get();
        $teams = Team::where('name', 'like', '%' . $term . '%')->get();
        $departments = Department::where('name', 'like', '%' . $term . '%')->get();
        $users = User::where('name', 'like', '%' . $term . '%')->get();

        foreach (User::where('email', 'like', '%' . $term . '%') as $matching_user_email) {
            $users[] = $matching_user_email;
        }

        $notes = Note::where('content', 'like', '%' . $term . '%')->get();

        $types = [$goals, $objectives, $actions, $tasks, $teams, $departments, $users, $notes];

        foreach ($types as $type) {
            foreach ($type as $result) {
                $results[] = $result;
            }
        }

        return view('search.show')->with('results', $results)->with('term', $term);
    }
}
