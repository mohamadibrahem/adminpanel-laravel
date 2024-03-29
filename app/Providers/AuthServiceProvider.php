<?php
namespace App\Providers;
use App\Role;
use App\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];
    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        $user = \Auth::user();
        
        // Auth gates for: User management
        Gate::define('user_management_access', function ($user) {
            return in_array($user->role_id, [1,2]);
        });
        // Auth gates for: Roles
        Gate::define('role_access', function ($user) {
            return in_array($user->role_id, [1,2]);
        });
        Gate::define('role_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_view', function ($user) {
            return in_array($user->role_id, [1,2]);
        });
        Gate::define('role_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });
        // Auth gates for: Users
        Gate::define('user_access', function ($user) {
            return in_array($user->role_id, [1,2]);
        });
        Gate::define('user_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_view', function ($user) {
            return in_array($user->role_id, [1,2]);
        });
        Gate::define('user_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });
        // Auth gates for: skills
        Gate::define('skill_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('skill_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('skill_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('skill_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('skill_delete', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        // Auth gates for: projects
        Gate::define('project_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('project_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('project_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('project_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('project_delete', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        
    }
}