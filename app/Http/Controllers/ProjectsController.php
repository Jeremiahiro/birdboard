<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    /**
     * View all projects
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = auth()->user()->accessibleProjects();

        return view('projects.index', compact('projects'));
    }

    /** 
     * show a single project.
     * 
     * @para \App\Project $project
     * 
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AutorizationException
     */
    public function show(Project $project)
    {
        $this->authorize('update', $project);

        return view('projects.show', compact('project'));
    }
    
    /**
     * Create a new project.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Persist a new project
     *
     * 
     * @return mixed
     */
    public function store()
    {
        $project = auth()->user()->projects()->create($this->validateRequest());

        if ($tasks = request('tasks')) {
            $project->addTasks($tasks);
        }
        
        if (request()->wantsJson()) {
            return [
                'message' => $project->path()
            ];
        }
        return redirect($project->path());
    }

     /**
     * Create a new project.
     *
     * @para \App\Project $project
     * 
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    public function update(Project $project)
    {
        $this->authorize('update', $project);

        $project->update($this->validateRequest());

        return redirect($project->path());
    }

     /**
     * Delete a new project.
     *
     * @para \App\Project $project
     * 
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $this->authorize('manage', $project);

        $project->delete();
        
        return redirect('/projects');
    }

    /** 
     * @return array 
     * 
     */
    protected function validateRequest()
    {
        return request()->validate([
            'title' => 'sometimes|required', 
            'description' => 'sometimes|required',
            'notes' => 'nullable',
            ]);
    }
}
