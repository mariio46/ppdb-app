<?php

namespace App\Models\HasRole;

use App\Models\Base;

class Login extends Base
{
    public function store(string $username, string $password): array
    {
        $body = [
            'nama_pengguna' => $username,
            'kata_sandi' => $password,
            'waktu' => 10,
        ];

        $data = $this->postWithoutToken('admin/login', $body);

        if ($data['status_code'] != 200) {
            $response = [
                'statusCode' => $data['status_code'],
                "msg" => 'error',
                'data' => []
            ];
        } else {
            $response = $data['response'];
        }

        return $response;
    }

    public function destroy(string $id): array
    {
        $data = [
            'id' => $id,
        ];

        $logout = $this->postWithToken('admin/logout', $data);

        return $logout;
    }
}
