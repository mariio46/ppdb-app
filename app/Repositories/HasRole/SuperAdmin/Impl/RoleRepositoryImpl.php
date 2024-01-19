<?php

namespace App\Repositories\HasRole\SuperAdmin\Impl;

use App\Models\HasRole\SuperAdmin\Role;
use App\Repositories\HasRole\SuperAdmin\RoleRepository;
use Illuminate\Http\Request;

class RoleRepositoryImpl implements RoleRepository
{
    public function __construct(protected Role $role)
    {
        //
    }

    public function index(): array
    {
        return $this->role->getRoles();
    }

    public function show(string $role_id): array
    {
        return $this->role->getSingleRole(role_id: $role_id);
    }

    public function store(Request $request): array
    {
        return $this->role->createRole(request: $request);
    }

    public function update(Request $request): array
    {
        return $this->role->updateRole(request: $request);
    }
}
