<?php

namespace Lighthouse\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Lighthouse\Project;
use Lighthouse\User;

class ProjectPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the project.
     *
     * @param \Lighthouse\User    $user
     * @param \Lighthouse\Project $project
     *
     * @return mixed
     */
    public function view(User $user, Project $project)
    {
        //
    }

    /**
     * Determine whether the user can create projects.
     *
     * @param \Lighthouse\User $user
     *
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the project.
     *
     * @param \Lighthouse\User    $user
     * @param \Lighthouse\Project $project
     *
     * @return mixed
     */
    public function update(User $user, Project $project)
    {
        return $user->id === $project->owner_id;
    }

    /**
     * Determine whether the user can delete the project.
     *
     * @param \Lighthouse\User    $user
     * @param \Lighthouse\Project $project
     *
     * @return mixed
     */
    public function delete(User $user, Project $project)
    {
        return $user->id === $project->owner_id;
    }
}
