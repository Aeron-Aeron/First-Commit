<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function store(Project $project)
    {
        $user = User::whereEmail(request('email'))->firstOrFail();
        $project->members()->attach($user);
        return redirect()->back();
    }
}
