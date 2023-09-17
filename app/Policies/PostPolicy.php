<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Post;

class PostPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }
    public function update(User $user, Post $post): bool
    {
        return $user->id === $post->user_id || $user->is_admin;
    }
    public function delete(User $user, Post $post): bool
    {
        return $user->id === $post->user_id || $user->is_admin;
    }
    // public function deleteBulk(User $user, Post $post): bool
    // {
    //     return $user->id === $post->user_id || $user->is_admin;
    // }
   
}
