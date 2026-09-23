<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\View\View;

class ProjectController extends Controller
{
    public function index(): View
    {
        return view('site.projects-index', [
            'projects' => Project::with('sector')->orderBy('order')->get(),
        ]);
    }

    public function show(Project $project): View
    {
        return view('site.projects-show', ['project' => $project->load('sector')]);
    }
}
