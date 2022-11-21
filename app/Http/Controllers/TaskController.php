<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Task;


class TaskController extends Controller
{

public function store(Project $project)
    {
        $project->task()->create([
        'body' =>request('body')
        ]);
        return redirect()->back();
    }
    public function update(Project $project, $task)
    {
        $task = Task::where('id',$task)->firstOrFail();

        if(request('completed')){
            $task->update([
                'completed' => 1,
                'body' => request('body')
            ]);
        }else{
            $task->update([
                'completed' => 0,
                'body' => request('body')
            ]);
        }
        return redirect()->back();
    }
}
