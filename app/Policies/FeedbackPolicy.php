<?php

namespace App\Policies;

use App\Models\User;

class FeedbackPolicy
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
    public function update():bool{
        return 0;
    }
}
