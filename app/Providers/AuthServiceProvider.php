<?php

namespace App\Providers;


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
        //'App\Models\Ticket' => 'App\Policies\TicketPolicy',
        // 'App\Model' => 'App\Policies\ModelPolicy',
        User::class => UserPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
<<<<<<< HEAD
        //
=======
        $this->registerPolicies();

        // Gate::define('update-profile', function (User $user, User $profileUser) {
        //     return $user->id === $profileUser->id;
        // });

        // Gate::define('delete-user', function (User $user) {
        //     return $user->role === 'admin';
        // });
>>>>>>> 10352d4521f7e77bb8a793ddeb7ade807033514d
    }























































































}
