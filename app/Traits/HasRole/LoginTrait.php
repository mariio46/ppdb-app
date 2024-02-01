<?php

namespace App\Traits\HasRole;

trait LoginTrait
{
    protected function whenServerIsOk(array $response, string|bool $statusName): array // 200
    {
        if ($statusName == false || $statusName == 'failed value') {
            return $this->whenCredentialInvalid();
        }

        return $this->whenLoginSuccess(data: $response['data']);
    }

    protected function whenServerIsNotFound(string|int $code): array // 400 | 404
    {
        return [
            'stat' => 'error',
            'msg' => "Ada Kesalahan Dalam Mengakses Server! | {$code}",
            'data' => [],
        ];
    }

    protected function whenServerIsError(string|int $code): array // 500
    {
        return [
            'stat' => 'error',
            'msg' => "Server saat ini tidak bisa diakses! | {$code}",
            'data' => [],
        ];
    }

    protected function whenCredentialInvalid(): array // Client Error
    {
        return [
            'stat' => 'error',
            'msg' => 'Username / Kata Sandi yang Anda masukkan salah!',
            'data' => [],
        ];
    }

    protected function whenLoginSuccess(array $data): array
    {
        $default_session = [
            'id' => $data['id'] ?? null,
            'nama' => $data['nama'] ?? null,
            'nama_pengguna' => $data['nama_pengguna'] ?? null,
            'role_id' => $data['role_id'] ?? null,
            'roles' => $data['roles'] ?? [],
            'permissions' => $data['permissions'] ?? [],

            'cabdin_id' => isset($data['cabdin_id']) && str_contains($data['cabdin_id'], '-') ? $data['cabdin_id'] : null,
            'sekolah_id' => isset($data['sekolah_id']) && str_contains($data['sekolah_id'], '-') ? $data['sekolah_id'] : null,
            'sekolah_asal_id' => isset($data['sekolah_asal_id']) && str_contains($data['sekolah_asal_id'], '-') ? $data['sekolah_asal_id'] : null,

            'status_aktif' => $data['status_aktif'] ?? null,
            'token' => $data['remember_token'] ?? null,
            'logged_in' => true,
        ];

        session()->put($default_session);

        if ($data['role_id'] == 4 && array_key_exists('satuan_pendidikan', $data)) {
            session()->put('satuan_pendidikan', $data['satuan_pendidikan']);
        }

        return [
            'stat' => 'success',
            'msg' => 'Login Berhasil',
        ];
    }

    protected function whenLogoutSuccess(array $response): array
    {
        if ($response['statusCode'] == 400) {
            session()->flush();

            return [
                'stat' => 'error',
                'msg' => 'Anda telah keluar dari server beberapa waktu yang lalu!',
                'data' => [],
            ];
        }

        session()->flush();

        return [
            'stat' => 'success',
            'msg' => 'Logout Berhasil!',
            'data' => [],
        ];
    }
}
