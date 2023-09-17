<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Category;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use App\Policies\CategoryPolicy;
use App\Policies\PostPolicy;
use App\Policies\UserPolicy;
use App\Policies\CommentPolicy;
use App\Policies\FeedbackPolicy;

use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
        Post::class => PostPolicy::class,
        Category::class => CategoryPolicy::class,
        User::class => UserPolicy::class,
        Comment::class => CommentPolicy::class,
        Feedback::class => FeedbackPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
        $this->registerPolicies();
        Gate::define('viewPost', function (Post $post) {
            return $post->published;
        });
        // Gate::define('delete-post', function (User $user, Post $post) {
        //     return $user->id === $post->user_id || $user->is_admin;
        // });
    }
}
