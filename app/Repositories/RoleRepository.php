<?php

namespace App\Repositories;

use App\Models\Role;

class RoleRepository
{

    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Role::class;
    }

    public function all()
    {
        return Role::all();
    }

    public function create($data)
    {
        return Role::create($data);
    }

    public function update(Role $role, $data)
    {
        $role->update($data);
        $role->permissions()->detach();
        $role->permissions()->attach(collect($data['permissions'])->pluck('id'));
        return $role;
    }
}
