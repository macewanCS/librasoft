<?php

namespace App\Http\Controllers;

use App;
use App\Plan;

use App\Http\Requests;
use App\User;
use PDF;
use View;

class ExportController extends Controller
{
    public function minimal()
    {
        return view('export.minimal')->with("plan", Plan::first());
    }

    public function tabs()
    {
        // Take a business plan and create a tsv representation
        $tsv = "Type\tDescription\tDue\tOwner\tLead\tCollaborators\tStatus\tSuccess Measures\r\n";

        foreach (Plan::first()->goals()->orderBy('body', 'asc')->get() as $goal) {
            $tsv .= "Goal\t" . $goal->body . str_repeat("\t", 6) . "\r\n";

            if (count($goal->objectives->all()) > 0) {
                foreach ($goal->objectives()->orderBy('body', 'asc')->get() as $objective) {
                    $tsv .= "Objective\t" . $objective->body . str_repeat("\t", 6) . "\r\n";

                    if (count($objective->actions->all()) > 0) {
                        foreach ($objective->actions()->orderBy('body', 'asc')->get() as $action) {
                            $tsv .= "Action\t"
                                . $action->body . "\t"
                                . $action->date . "\t"
                                . $action->owner . "\t"
                                . $this->split_username_delimiters($action->lead) . "\t"
                                . $this->split_username_delimiters($action->collaborators) . "\t"
                                . $action->status . "\t"
                                . $action->success . "\r\n";

                            if (count($action->tasks->all()) > 0) {
                                foreach ($action->tasks()->orderBy('body', 'asc')->get() as $task) {
                                    $tsv .= "Task\t"
                                        . $task->body . "\t"
                                        . $task->date . "\t"
                                        . $task->owner . "\t"
                                        . $this->split_username_delimiters($task->lead) . "\t"
                                        . $this->split_username_delimiters($task->collaborators) . "\t"
                                        . $task->status . "\t"
                                        . $task->success . "\r\n";
                                }
                            }
                        }
                    }
                }
            }
        }

        file_put_contents("bp.tsv", $tsv);
        return view('export.tsv');
    }

    private function split_username_delimiters($target) {
        $split = "";
        $users = explode("__,__", $target);
        foreach ($users as $user) {
            // Check if it's a valid email address
            if (filter_var($user, FILTER_VALIDATE_EMAIL)) {
                $split .= User::where("email", $user)->first()->name;
            } else {
                $split .= $user;
            }

            if ($user != $users[count($users)-1]) {
                $split .= ", ";
            }
        }

        return $split;
    }
}
