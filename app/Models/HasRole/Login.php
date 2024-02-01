<?php

namespace App\Models\HasRole;

use App\Models\Base;
use App\Traits\HasRole\LoginTrait;

class Login extends Base
{
    use LoginTrait;

    public function store(string $username, string $password): array
    {
        $response = $this->postWithoutToken('admin/login', ['nama_pengguna' => $username, 'kata_sandi' => $password, 'waktu' => 10]);

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

        // If Server / Backend Error
        if ($server_status_code == 500) {
            return $this->whenServerIsError(code: $server_status_code);
        }

        // Client Error
        if ($server_status_code == 400 || $server_status_code == 404) {
            return $this->whenServerIsNotFound(code: $server_status_code);
        }

        return $this->whenServerIsOk(response: $data['response'], statusName: $data['response']['status']);
    }

    private function logoutResponse(array $data): array
    {
        $server_status_code = $data['status_code'];

        // If Server / Backend Error
        if ($server_status_code == 500) {
            return $this->whenServerIsError(code: $server_status_code);
        }

        // Client Error
        if ($server_status_code == 400 || $server_status_code == 404) {
            return $this->whenServerIsNotFound(code: $server_status_code);
        }

        return $this->whenLogoutSuccess(response: $data['response']);
    }
}
