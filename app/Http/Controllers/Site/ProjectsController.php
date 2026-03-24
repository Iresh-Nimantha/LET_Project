<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Project;

class ProjectsController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->paginate(12);
        
        // Get unique categories for filtering
        $categories = Project::select('category')->distinct()->whereNotNull('category')->pluck('category');
        
        return view('site.projects.index', compact('projects', 'categories'));
    }

    public function show(Project $project)
    {
        $relatedProjects = Project::where('id', '!=', $project->id)
            ->when($project->category, function($query) use ($project) {
                return $query->where('category', $project->category);
            })
            ->take(3)
            ->get();
            
        return view('site.projects.show', compact('project', 'relatedProjects'));
    }
}
