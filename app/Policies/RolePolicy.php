<?php

namespace App\Policies;

use App\Models\User;
use App\Enums\RolePermission;
use Illuminate\Support\Facades\Cache;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization;
    public function browse(User $authUser)
    {
        return $this->hasPermission($authUser, RolePermission::BrowseRole);
    }

    public function show(User $authUser)
    {
        return $this->hasPermission($authUser, RolePermission::ShowRole);
    }

    public function create(User $authUser)
    {
        return $this->hasPermission($authUser, RolePermission::CreateRole);
    }

    public function update(User $authUser)
    {
        return $this->hasPermission($authUser, RolePermission::UpdateRole);
    }

    public function delete(User $authUser)
    {
        return $this->hasPermission($authUser, RolePermission::DeleteRole);
    }


    public function hasPermission(User $authUser, $permission)
    {
        $permissions = Cache::remember($authUser->role->name . '_permissions', 3600, function () use ($authUser) {
            return $authUser->role->permissions;
        });
        $x = $permissions;
        return  $permissions->contains(function ($value) use ($permission) {
            return $value->name === $permission;
        });
    }
}
