<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Board;
use App\Models\Status;
use App\Enums\StatusPermission;
use Illuminate\Support\Facades\Cache;
use Illuminate\Auth\Access\HandlesAuthorization;

class StatusPolicy
{
    use HandlesAuthorization;

    public function browse(User $authUser)
    {
        return $this->hasPermission($authUser,  StatusPermission::BrowseStatus);
    }

    public function show(User $authUser, Status $status)
    {
        return $this->hasPermission($authUser, StatusPermission::ShowStatus) && $status->board->owner->id == $authUser->id;
    }

    public function create(User $authUser)
    {
        return $this->hasPermission($authUser, StatusPermission::CreateStatus);
    }

    public function update(User $authUser, Status $status)
    {
        return $this->hasPermission($authUser, StatusPermission::UpdateStatus) && $status->board->owner->id == $authUser->id;
    }

    public function delete(User $authUser,  Status $status)
    {
        return  $this->hasPermission($authUser,StatusPermission::DeleteStatus) && $status->board->owner->id == $authUser->id;
    }

    protected function hasPermission(User $authUser, $permission)
    {
        $permissions = Cache::remember($authUser->role->name . '_permissions', 3600, function () use ($authUser) {
            return $authUser->role->permissions;
        });
        return $permissions->contains(function ($value) use ($permission) {
            return $value->name === $permission;
        });
    }
}
