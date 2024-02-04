<?php

namespace App\Models\Student;

use App\Models\Base;

class LoginModel extends Base
{
    public function login(string $nisn, string $password): array
    {
        $data = $this->postWithoutToken('siswa/login', [
            'nisn' => $nisn,
            'kata_sandi' => $password,
            'waktu' => 15,
        ]);

        return $this->serverResponseWithPostMethod($data);
    }

    public function logout(string $id): array
    {
        $logout = $this->postWithoutToken('siswa/logout', [
            'id' => $id,
        ]);

        return $this->serverResponseWithPostMethod($logout);
    }
}
