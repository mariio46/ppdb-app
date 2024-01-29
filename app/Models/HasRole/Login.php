<?php

namespace App\Models\HasRole;

use App\Models\Base;
use App\Traits\HasRole\LoginTrait;

class Login extends Base
{
    use LoginTrait;

    public function store(string $username, string $password): array
    {
        $body = [
            'nama_pengguna' => $username,
            'kata_sandi' => $password,
            'waktu' => 10,
        ];

        $response = $this->postWithoutToken('admin/login', $body);

        return $this->loginResponse(data: $response);
    }

    public function destroy(string $user_id): array
    {
        $response = $this->postWithToken('admin/logout', ['id' => $user_id]);

        return $this->logoutResponse(data: $response);
    }

    private function loginResponse(array $data): array
    {
        $server_status_code = $data['status_code'];
        if ($server_status_code == 200) {
            return $this->whenServerIsOk(response: $data['response'], statusName: $data['response']['status']);
        } elseif ($server_status_code == 404 || $server_status_code == 400) {
            return $this->whenServerIsNotFound(code: $server_status_code);
        } elseif ($server_status_code == 500) {
            return $this->whenServerIsError(code: $server_status_code);
        } else {
            return $this->whenServerIsNotFound(code: $server_status_code);
        }
    }

    private function logoutResponse(array $data): array
    {
        $server_status_code = $data['status_code'];
        if ($server_status_code == 200) {
            return $this->whenLogoutSuccess(response: $data['response']);
        } elseif ($server_status_code == 400 || $server_status_code == 404) {
            return $this->whenServerIsNotFound(code: $server_status_code);
        } elseif ($server_status_code == 500) {
            return $this->whenServerIsError(code: $server_status_code);
        } else {
            return $this->whenServerIsNotFound(code: $server_status_code);
        }
    }
}
