<?php

namespace App\Http\Controllers;

use App\Task;
use App\Project;
use Illuminate\Http\Request;

class ProjectTasksController extends Controller
{
       /**
     * Add a task to a given project
     * 
     *
     * @param Project $project
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Project $project)
    {
        $this->authorize('update', $project);

        request()->validate(['body' => 'required']);

        $project->addTask(request('body'));

        return redirect($project->path());
    }

    /**
     * Update the projects
     * 
     *
     * @param Project $project
     * @param Task $task
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Project $project, Task $task)
    {
        $this->authorize('update', $task->project);

        $task->update(request()->validate(['body' => 'required']));

        request('completed') ? $task->complete() : $task->incomplete();

        return redirect($project->path());

    }
}
