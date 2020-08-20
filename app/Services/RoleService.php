<?php


namespace App\Services;


use App\Models\Role;

class RoleService
{
    /**
     * Get role by name
     *
     * @param string $name
     * @return Role
     */
    public function getRoleByName(string $name): Role
    {
        return Role::where('name', $name)->first();
    }
}