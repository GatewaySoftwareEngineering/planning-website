<?php

namespace App\Repositories;

use App\Models\Permission;

class PermissionRepository
{

    public function all()
    {
        return Permission::all();
    }

    public function create($data)
    {
        auth()->user()->can('create');
        return Permission::create($data);
    }
}
