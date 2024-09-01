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
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Gate::define('update-profile', function (User $user, User $profileUser) {
        //     return $user->id === $profileUser->id;
        // });

        // Gate::define('delete-user', function (User $user) {
        //     return $user->role === 'admin';
        // });
    }























































































}
