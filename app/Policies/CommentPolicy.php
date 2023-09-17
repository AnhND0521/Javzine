<?php

namespace App\Policies;

use App\Models\User;

class CommentPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
        
    }
    public function viewAny(User $user):bool {
        return $user->is_admin;
    }
    public function update(User $user):bool {
        return 0;
    }
}
