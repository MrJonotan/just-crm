<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Project;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProjectPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }


    public function edit(User $user, Project $project){
        return $user->id === $project->manager->id;
    }

    public function view(User $user, Project $project)
    {
        return $user->projects->contains('employee_id', $user->id);
    }
}
