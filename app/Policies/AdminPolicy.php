<?php

namespace App\Policies;

use App\Models\User;

class AdminPolicy
{
    /**
     * Create a new policy instance.
     */
    public function admin(User $user)
    {
         return $user->admin;
    }
}
