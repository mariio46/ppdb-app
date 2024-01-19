<?php

namespace App\Repositories\HasRole\SuperAdmin\Impl;

use App\Models\HasRole\SuperAdmin\Permission;
use App\Repositories\HasRole\SuperAdmin\PermissionRepository;
use Illuminate\Http\Request;

class PermissionRepositoryImpl implements PermissionRepository
{
    public function __construct(protected Permission $permission)
    {
        //
    }

    public function index(): array
    {
        return $this->permission->getPermissions();
    }

    public function store(Request $request): array
    {
        return $this->permission->createPermission(request: $request);
    }

    public function show(string $permission_id): array
    {
        return $this->permission->getSinglePermission(permission_id: $permission_id);
    }

    public function update(Request $request, string $permission_id): array
    {
        return $this->permission->updatePermission(request: $request, permission_id: $permission_id);
    }

    public function destroy(string $permission_id): array
    {
        return $this->permission->deletePermission(permission_id: $permission_id);
    }
}
