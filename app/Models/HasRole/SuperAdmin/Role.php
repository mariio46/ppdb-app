<?php

namespace App\Models\HasRole\SuperAdmin;

use App\Models\Base;

class Role extends Base
{
    public function index(): array
    {
        $roles = $this->getWithToken('roles');

        if ($roles['status_code'] == '200') {
            return $roles['response'];
        } else {
            return [
                'statusCode' => $roles['status_code'],
                'messages' => 'Gagal Menampilkan Data',
                'data' => [],
            ];
        }
    }
}
