<?php

namespace App\Providers;


use App\Category;
use App\Comment;
use App\Policies\CategoryPolicy;
use App\Policies\CommentPolicy;
use App\Policies\UserPolicy;
use App\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Ticket;
use App\Policies\TicketPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [

        Ticket::class => TicketPolicy::class,
        User::class => UserPolicy::class,
        Category::class => CategoryPolicy::class,
        Comment::class => CommentPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {

        //

        $this->registerPolicies();
        

    }
}
