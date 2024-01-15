<?php

namespace App\Models\HasRole;

use App\Models\Base;
use Illuminate\Http\Request;

class User extends Base
{
    public function createUser(Request $request): array
    {
        $body = [
            'nama' => $request->input('nama'),
            'nama_pengguna' => $request->input('nama_pengguna'),
            'role_id' => $request->input('role'),
            'cabdin_id' => $request->input('wilayah'),
            'sekolah_id' => $request->input('sekolah'),
            'sekolah_asal_id' => $request->input('sekolah_asal'),
            'status_aktif' => $request->input('status_aktif'),
            'kata_sandi' => $request->input('password'),
        ];

        $data = $this->postWithToken('admin/create', $body);

        if ($data['status_code'] == 201 || $data['status_code'] == 200) {
            $response = $data['response'];
        } else {
            $response = [
                'statusCode' => $data['status_code'],
                'messages' => 'Gagal Menyimpan Data!',
                'data' => [],
            ];
        }

        return $response;
    }

    public function getUsers(string $role_name): array
    {
        $users = $this->getWithToken("admin/list?role={$role_name}");

        if ($users['status_code'] == 200) {
            return $users['response'];
        } else {
            return [
                'statusCode' => $users['status_code'],
                'messages' => 'Gagal Menampilkan Data',
            ];
        }
    }

    public function getSingleUser(string $user_id): array
    {
        $user = $this->getWithToken("admin/detail?id={$user_id}");

        if ($user['status_code'] == 200) {
            return $user['response'];
        } else {
            return [
                'statusCode' => $user['status_code'],
                'messages' => 'Gagal Menampilkan Data',
            ];
        }
    }

    public function updateUser(Request $request, string $user_id): array
    {
        $body = [
            'id' => $user_id,
            'uid' => session()->get('id'),
            'nama' => $request->input('nama'),
            'nama_pengguna' => $request->input('nama_pengguna'),
            'role_id' => $request->input('role'),
            'cabdin_id' => $request->input('wilayah'),
            'sekolah_id' => $request->input('sekolah'),
            'sekolah_asal_id' => $request->input('sekolah_asal'),
            'password' => $request->input('password'),
        ];

        $data = $this->postWithToken('admin/edit', $body);

        if ($data['status_code'] == 200) {
            $response = $data['response'];
        } else {
            $response = [
                'statusCode' => $data['status_code'],
                'messages' => 'Gagal Menyimpan Data!',
                'data' => [],
            ];
        }

        return $response;
    }

    public function deleteUser(string $user_id): array
    {
        $user = $this->postWithToken('admin/hapus', ['id' => $user_id]);

        if ($user['status_code'] == 200) {
            $response = $user['response'];
        } else {
            $response = [
                'statusCode' => $user['status_code'],
                'messages' => 'Gagal Menghapus Data!',
                'data' => [],
            ];
        }

        return $response;
    }
}
