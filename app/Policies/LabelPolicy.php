<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Board;
use App\Models\Label;
use App\Enums\LabelPermission;
use Illuminate\Support\Facades\Cache;
use Illuminate\Auth\Access\HandlesAuthorization;

class LabelPolicy
{
    use HandlesAuthorization;

    public function browse(User $authUser)
    {
        return  $this->hasPermission($authUser, LabelPermission::BrowseLabel);
    }

    public function show(User $authUser, Label $label)
    {
        return  $this->hasPermission($authUser, LabelPermission::ShowLabel) && $label->board->owner->id == $authUser->id;
    }

    public function create(User $authUser)
    {
        return $this->hasPermission($authUser, LabelPermission::CreateLabel);
    }

    public function update(User $authUser, Label $label)
    {
        return $this->hasPermission($authUser, LabelPermission::UpdateLabel) && $label->board->owner->id == $authUser->id;
    }

    public function delete(User $authUser,  Label $label)
    {
        return  $this->hasPermission($authUser, LabelPermission::DeleteLabel) && $label->board->owner->id == $authUser->id;
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
