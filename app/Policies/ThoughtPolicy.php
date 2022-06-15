<?php

namespace App\Policies;

use App\Models\Thought;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ThoughtPolicy
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

    public function update(User $user, Thought $thought)
    {
        return $user->id === $thought->user_id;
    }
}
