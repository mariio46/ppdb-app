<?php

namespace App\Models\HasRole\SuperAdmin;

use App\Models\Base;
use Illuminate\Http\Request;

class Role extends Base
{
    protected string $url = 'peran/add/update';

    public function getRoles(): array
    {
        $roles = $this->getWithToken('peran');

        return $this->serverResponseWithGetMethod(response: $roles);
    }

    public function getSingleRole(string $role_id): array
    {
        $role = $this->getWithToken(endpoint: "peran/detail?role_id_yang_dipilih={$role_id}");

        return $this->serverResponseWithGetMethod(response: $role);
    }

    public function createRole(Request $request): array
    {
        $body = [
            'name' => $request->name,
            'permissions' => $request->permission,
        ];

        $data = $this->postWithToken(endpoint: $this->url, data: $body);

        return $this->serverResponseWithPostMethod(data: $data);
    }

    public function updateRole(Request $request): array
    {
        $body = [
            'name' => $request->name,
            'permissions' => $request->permission,
        ];

        $data = $this->postWithToken(endpoint: $this->url, data: $body);

        return $this->serverResponseWithPostMethod(data: $data);
    }
}
