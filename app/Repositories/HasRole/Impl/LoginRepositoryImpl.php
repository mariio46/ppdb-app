<?php

namespace App\Repositories\HasRole\Impl;

use App\Models\HasRole\Login;
use App\Repositories\HasRole\LoginRepository;
use Illuminate\Support\Collection;

class LoginRepositoryImpl implements LoginRepository
{
    public function __construct(protected Login $login)
    {
        //
    }

    public function login(string $username, string $password): Collection
    {
        $result = [];

        $authenticate = $this->login->store($username, $password);

        if ($authenticate['statusCode'] == 200) {

            $data = [
                'id' => $authenticate['data']['id'],
                'nama' => $authenticate['data']['nama'],
                'nama_pengguna' => $authenticate['data']['nama_pengguna'],
                'role_id' => $authenticate['data']['role_id'],
                'roles' => $authenticate['data']['roles'],
                'permissions' => $authenticate['data']['permissions'],
                'cabdin_id' => $authenticate['data']['cabdin_id'],
                'sekolah_asal_id' => $authenticate['data']['sekolah_asal_id'],
                'sekolah_id' => $authenticate['data']['sekolah_id'],
                'status_aktif' => $authenticate['data']['status_aktif'],
                'token' => $authenticate['data']['remember_token'],
                'logged_in' => true,
            ];
            if ($authenticate['data']['role_id'] != 4) {
                // If login is not AdminSekolah
                session()->put($data);
            } else {
                // If login is AdminSekolah
                $unit = ['satuan_pendidikan' => $authenticate['data']['satuan_pendidikan']];
                session()->put(array_merge($data, $unit));
            }

            $result = [
                'status' => 'success',
                'code' => 200,
                'message' => 'Login Berhasil!',
            ];
        } else {
            if ($authenticate['statusCode'] == 401) {
                $result = [
                    'status' => 'failed',
                    'code' => 401,
                    'message' => 'Akun Anda saat ini sedang diakses dari perangkat lain.',
                ];
            } elseif ($authenticate['statusCode'] == 400) {
                $result = [
                    'status' => 'failed',
                    'code' => 400,
                    'message' => 'Username / Kata Sandi yang Anda masukkan salah.',
                ];
            } else {
                $result = [
                    'status' => 'failed',
                    'code' => 500,
                    'message' => 'Maaf, server sedang sibuk. Mohon mencoba lagi nanti.',
                ];
            }
        }

        return collect($result);
    }

    public function logout(): array
    {
        $logout = $this->login->destroy(session()->get('id'));

        $result = [];

        if ($logout['status_code'] == 200) {
            session()->flush();
            $result = [
                'success' => true,
                'code' => 200,
                'message' => 'Logout Successfully!',
            ];
        } else {
            $result = [
                'success' => false,
                'code' => $logout['status_code'],
                'message' => 'Logout Failed!',
            ];
        }

        return $result;
    }
}
