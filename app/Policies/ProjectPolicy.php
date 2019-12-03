<?php

namespace App\Policies;

use App\User;
use App\Project;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProjectPolicy
{
    use HandlesAuthorization;

     /**
     * Determine if the user may invite another user the project.
     * 
     * @param User $user
     * @param Project $project
     * @return bool
     */
    public function manage(User $user, Project $project)
    {
        return $user->is($project->owner);
    }

    /**
     * Determine if the user may update the project.
     * 
     * @param User $user
     * @param Project $project
     * @return bool
     */
    public function update(User $user, Project $project)
    {
        return $user->is($project->owner) || $project->members->contains($user);
    }
}