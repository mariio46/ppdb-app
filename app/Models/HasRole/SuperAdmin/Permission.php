<?php

namespace App\Models\HasRole\SuperAdmin;

use App\Models\Base;
use Illuminate\Http\Request;

class Permission extends Base
{
    public function getPermissions(): array
    {
        $permissions = $this->getWithToken(endpoint: 'permission');

        return $this->serverResponseWithGetMethod(response: $permissions);
    }

    public function createPermission(Request $request): array
    {
        $body = [
            'name' => $request->name,
            'keterangan' => $request->keterangan,
        ];

        $data = $this->postWithToken(endpoint: 'permission/add', data: $body);

        return $this->serverResponseWithPostMethod(data: $data);
    }

    public function getSinglePermission(string $permission_id): array
    {
        $permission = $this->getWithToken(endpoint: "permission/detail?id={$permission_id}");

        return $this->serverResponseWithGetMethod(response: $permission);
    }

    public function updatePermission(Request $request, string $permission_id): array
    {
        $body = [
            'id' => $permission_id,
            'name' => $request->name,
            'keterangan' => $request->keterangan,
        ];

        $data = $this->postWithToken(endpoint: 'permission/add', data: $body);

        return $this->serverResponseWithPostMethod(data: $data);
    }

    public function deletePermission(string $permission_id): array
    {
        $body = ['id' => $permission_id];

        $data = $this->postWithToken(endpoint: 'permission/hapus', data: $body);

        return $this->serverResponseWithPostMethod(data: $data);
    }
}
