<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
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

    /**
     * Determine if the given user can be update user.
     *
     * @param User $user
     * @param User $user_model
     * @return bool
     */
    public function update(User $user, User $user_model): bool
    {
        return $user->id === $user_model->id;
    }

}
