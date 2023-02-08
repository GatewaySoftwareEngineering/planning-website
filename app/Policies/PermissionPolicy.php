<?php

namespace App\Policies;

use App\Models\User;
use App\Enums\PermissionPermission;
use Illuminate\Support\Facades\Cache;
use Illuminate\Auth\Access\HandlesAuthorization;

class PermissionPolicy
{
    use HandlesAuthorization;

    public function browse(User $authUser)
    {
        return $this->hasPermission($authUser, PermissionPermission::BrowsePermission);
    }

    public function show(User $authUser)
    {
        return $this->hasPermission($authUser, PermissionPermission::ShowPermission);
    }

    public function create(User $authUser)
    {
        return $this->hasPermission($authUser, PermissionPermission::CreatePermission);
    }

    public function update(User $authUser)
    {
        return $this->hasPermission($authUser, PermissionPermission::UpdatePermission) ;
    }

    public function delete(User $authUser)
    {
        return $this->hasPermission($authUser, PermissionPermission::DeletePermission);
    }


    public function hasPermission(User $authUser, $permission)
    {
        $permissions = Cache::remember($authUser->role->name . '_permissions', 3600, function () use ($authUser) {
            return $authUser->role->permissions;
        });
        $x=$permissions;
        return  $permissions->contains(function ($value) use ($permission) {
            return $value->name === $permission;
        });
    }
}
