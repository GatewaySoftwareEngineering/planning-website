<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Board;
use App\Enums\BoardPermission;
use Illuminate\Support\Facades\Cache;
use Illuminate\Auth\Access\HandlesAuthorization;

class BoardPolicy
{
    use HandlesAuthorization;

    public function browse(User $authUser)
    {
        return $this->hasPermission($authUser, BoardPermission::BrowseBoard);
    }

    public function show(User $authUser)
    {
        return $this->hasPermission($authUser, BoardPermission::ShowBoard);
    }

    public function create(User $authUser)
    {
        return $this->hasPermission($authUser, BoardPermission::CreateBoard);
    }

    public function update(User $authUser, Board $board)
    {
        return $this->hasPermission($authUser, BoardPermission::UpdateBoard) && $board->owner->id == $authUser->id;
    }

    public function delete(User $authUser, Board $board)
    {
        return $this->hasPermission($authUser, BoardPermission::DeleteBoard) && $board->owner->id == $authUser->id;
    }

    public function invite(User $authUser, Board $board)
    {
        return $this->hasPermission($authUser, BoardPermission::InviteToBoard) && $board->owner->id == $authUser->id;
    }

    public function hasPermission(User $authUser, $permission)
    {
        $permissions = Cache::remember($authUser->role->name . '_permissions', 3600, function () use ($authUser) {
            return $authUser->role->permissions;
        });
        return  $permissions->contains(function ($value) use ($permission) {
            return $value->name === $permission;
        });
    }
}
