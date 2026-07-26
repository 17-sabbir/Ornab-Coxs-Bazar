<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Project;

class PageController extends Controller
{
    public function projects()
    {
        $projects = Project::orderBy('priority', 'desc')->latest()->get();

        return view('frontend.pages.projects', compact('projects'));
    }
}
