<?php

namespace App;

use App\Activity;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use RecordsActivity;

    protected $guarded = [];

    public function path()
    {
        return "/projects/{$this->id}";
    }

    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Task relationship
     * 
     *@return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
    /**
     * Add a task to the project
     * 
     * @param array $tasks
     *@return \Illuminate\Database\Eloquent\Model
     */
    public function addTasks($tasks)
    {
        return $this->tasks()->createMany($tasks);
    }

    /**
     * Add a task to the project
     * 
     *@return \Illuminate\Database\Eloquent\Model
     */
    public function addTask($body)
    {
        return $this->tasks()->create(compact('body'));
    }

    /**
     * The activity feed for the project
     * 
     *@return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function activity()
    {
        return $this->hasMany(Activity::class)->latest();
    }

    public function invite(User $user)
    {
        return $this->members()->attach($user);
    }

    public function members()
    {
        return $this->belongsToMany(User::class, 'project_members');
    }
}
