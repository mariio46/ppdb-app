<?php

namespace App\Models\Student;

use App\Models\Base;

class LoginModel extends Base
{
    public function login(string $nisn, string $password): array
    {
        $data = $this->postWithoutToken('siswa/login', ['nisn' => $nisn, 'kata_sandi' => $password, 'waktu' => 15]);

        if ($data['status_code'] != 200) {
            $response = ['statusCode' => $data['status_code'], 'msg' => 'error', 'data' => []];
        } else {
            $response = $data['response'];
        }

        return $response;
    }

    public function logout(string $id): array
    {
        $data = [
            'id' => $id,
        ];

        $logout = $this->postWithoutToken('siswa/logout', $data);

        return $logout;
    }
}
