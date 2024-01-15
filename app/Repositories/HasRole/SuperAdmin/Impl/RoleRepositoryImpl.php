<?php

namespace App\Repositories\HasRole\SuperAdmin\Impl;

use App\Models\HasRole\SuperAdmin\Role;
use App\Repositories\HasRole\SuperAdmin\RoleRepository;

class RoleRepositoryImpl implements RoleRepository
{
    public function __construct(protected Role $role)
    {
    }

    public function getRoles(): array
    {
        $roles = $this->role->index();

        return $roles;
    }
}
