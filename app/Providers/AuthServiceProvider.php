<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\User;
use App\Models\Status;
use App\Models\Permission;
use App\Policies\RolePolicy;
use App\Policies\TaskPolicy;
use App\Policies\UserPolicy;
use App\Policies\BoardPolicy;
use App\Policies\LabelPolicy;
use App\Policies\StatusPolicy;
use App\Policies\PermissionPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Role::class       => RolePolicy::class,
        Permission::class => PermissionPolicy::class,
        User::class       => UserPolicy::class,
        Board::class      => BoardPolicy::class,
        Status::class     => StatusPolicy::class,
        Label::class      => LabelPolicy::class,
        Task::class       => TaskPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
