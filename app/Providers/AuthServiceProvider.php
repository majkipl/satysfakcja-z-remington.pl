<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->defineUserRoleGate('isAdmin', UserRole::ADMIN);
        $this->defineUserRoleGate('isUser', UserRole::USER);
    }

    public function defineUserRoleGate(string $name, string $role): void
    {
        Gate::define($name, function (User $user) use ($role) {
            return $user->role == $role;
        });
    }
}