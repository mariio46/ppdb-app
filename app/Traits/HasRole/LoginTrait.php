<?php

namespace App\Traits\HasRole;

trait LoginTrait
{
    private function whenServerIsOk(array $response, string|bool $statusName): array // 200
    {
        if ($statusName == false || $statusName == 'failed value') {
            return $this->whenCredentialInvalid();
        } else {
            return $this->whenLoginSuccess(data: $response['data']);
        }
    }

    private function whenServerIsNotFound(string|int $code): array // 400 | 404
    {
        return [
            'stat' => 'error',
            'msg' => "Ada Kesalahan Dalam Mengakses Server! | {$code}",
            'data' => [],
        ];
    }

    private function whenServerIsError(string|int $code): array // 500
    {
        return [
            'stat' => 'error',
            'msg' => "Server saat ini tidak bisa diakses! | {$code}",
            'data' => [],
        ];
    }

    private function whenCredentialInvalid(): array // Client Error
    {
        return [
            'stat' => 'error',
            'msg' => 'Username / Kata Sandi yang Anda masukkan salah!',
            'data' => [],
        ];
    }

    private function whenLoginSuccess(array $data): array
    {
        $default_session = [
            'id' => $data['id'] ?? null,
            'nama' => $data['nama'] ?? null,
            'nama_pengguna' => $data['nama_pengguna'] ?? null,
            'role_id' => $data['role_id'] ?? null,
            'roles' => $data['roles'] ?? [],
            'permissions' => $data['permissions'] ?? [],
            'cabdin_id' => $data['cabdin_id'] ?? null,
            'sekolah_asal_id' => $data['sekolah_asal_id'] ?? null,
            'sekolah_id' => $data['sekolah_id'] ?? null,
            'status_aktif' => $data['status_aktif'] ?? null,
            'token' => $data['remember_token'] ?? null,
            'logged_in' => true,
        ];
        if ($data['role_id'] != 4) {
            // If login is not AdminSekolah
            session()->put($default_session);
        } else {
            // If login is AdminSekolah
            $unit = ['satuan_pendidikan' => $data['satuan_pendidikan'] ?? null];
            session()->put(array_merge($default_session, $unit));
        }

        return [
            'stat' => 'success',
            'msg' => 'Login Berhasil',
        ];
    }

    private function whenLogoutSuccess(array $response): array
    {
        $statusCode = $response['statusCode'];
        if ($statusCode == 400) {
            session()->flush();

            return [
                'stat' => 'error',
                'msg' => 'Data Anda tidak ditemukan!',
                'data' => [],
            ];
        } elseif ($statusCode == 200) {
            session()->flush();

            return [
                'stat' => 'success',
                'msg' => 'Logout Berhasil!',
                'data' => [],
            ];
        }
    }
}
