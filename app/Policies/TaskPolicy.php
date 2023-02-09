<?php

namespace App\Policies;

use App\Enums\RoleEnum;
use App\Models\Task;
use App\Models\User;
use App\Enums\TaskPermission;
use App\Models\Board;
use App\Models\Status;
use Illuminate\Support\Facades\Cache;
use Illuminate\Auth\Access\HandlesAuthorization;

class TaskPolicy
{
    use HandlesAuthorization;

    public function browse(User $authUser)
    {
        return  $this->hasPermission($authUser, TaskPermission::BrowseTask);
    }

    public function show(User $authUser, Task $task)
    {
        return  $this->hasPermission($authUser, TaskPermission::ShowTask) && $task->board->owner->id == $authUser->id;
    }

    public function create(User $authUser)
    {
        return $this->hasPermission($authUser, TaskPermission::CreateTask);
    }

    public function update(User $authUser, Task $task)
    {
        return $this->hasPermission($authUser, TaskPermission::UpdateTask) && $task->board->owner->id == $authUser->id;
    }

    public function delete(User $authUser,  Task $task)
    {
        return  $this->hasPermission($authUser, TaskPermission::DeleteTask) && $task->board->owner->id == $authUser->id;
    }

    public function assign(User $authUser, Task $task)
    {
        return $this->hasPermission($authUser, TaskPermission::AssignTask) && $task->board->owner->id == $authUser->id;
    }

    public function move(User $authUser,  Task $task)
    {
        return  $this->hasPermission($authUser, TaskPermission::MoveTask) && ($authUser->role->name == RoleEnum::ProductOwner || $task->assignee->user_id == $authUser->id);
    }

    protected function hasPermission(User $authUser, $permission)
    {
        // $permissions = Cache::remember($authUser->role->name . '_permissions', 3600, function () use ($authUser) {
        //     return $authUser->role->permissions;
        // });
        $permissions = $authUser->role->permissions;
        return $permissions->contains(function ($value) use ($permission) {
            return $value->name === $permission;
        });
    }
}
