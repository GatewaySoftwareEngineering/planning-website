<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Permission;
use App\Enums\UserPermission;
use Illuminate\Support\Facades\Cache;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function browse(User $authUser)
    {
        $permissions = Cache::remember($authUser->role->name . '_permissions', 3600, function () use ($authUser) {
            return $authUser->role->permissions;
        });
        return $permissions->contains(function ($value) {
            return $value->name === UserPermission::BrowseUser;
        });
    }

    public function show(User $authUser)
    {
        $permissions = Cache::remember($authUser->role->name . '_permissions', 3600, function () use ($authUser) {
            return $authUser->role->permissions;
        });
        return $permissions->contains(function ($value) {
            return $value->name === UserPermission::ShowUser;
        });
    }

    public function create(User $authUser)
    {
        $permissions = Cache::remember($authUser->role->name . '_permissions', 3600, function () use ($authUser) {
            return $authUser->role->permissions;
        });
        return $permissions->contains(function ($value) {
            return $value->name === UserPermission::CreateUser;
        });
    }

    public function update(User $authUser)
    {
        $permissions = Cache::remember($authUser->role->name . '_permissions', 3600, function () use ($authUser) {
            return $authUser->role->permissions;
        });
        return $permissions->contains(function ($value) {
            return $value->name === UserPermission::UpdateUser;
        });
    }

    public function delete(User $authUser)
    {
        $permissions = Cache::remember($authUser->role->name . '_permissions', 3600, function () use ($authUser) {
            return $authUser->role->permissions;
        });
        return $permissions->contains(function ($value) {
            return $value->name === UserPermission::DeleteUser;
        });
    }
}
