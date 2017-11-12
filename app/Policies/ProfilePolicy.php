<?php

namespace Lighthouse\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Lighthouse\Profile;
use Lighthouse\User;

class ProfilePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the profile.
     *
     * @param \Lighthouse\User    $user
     * @param \Lighthouse\Profile $profile
     *
     * @return mixed
     */
    public function view(User $user, Profile $profile)
    {
        //
    }

    /**
     * Determine whether the user can create profiles.
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
     * Determine whether the user can update the profile.
     *
     * @param \Lighthouse\User    $user
     * @param \Lighthouse\Profile $profile
     *
     * @return mixed
     */
    public function update(User $user, Profile $profile)
    {
        //
    }

    /**
     * Determine whether the user can delete the profile.
     *
     * @param \Lighthouse\User    $user
     * @param \Lighthouse\Profile $profile
     *
     * @return mixed
     */
    public function delete(User $user, Profile $profile)
    {
        //
    }
}
