<?php

namespace App\Models\HasRole;

use App\Models\Base;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

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

        return $this->serverResponseWithPostMethod(data: $data);
    }

    public function getUsers(string $role_name): array
    {
        $users = $this->getWithToken("admin/list?role={$role_name}");

        return $this->serverResponseWithGetMethod(response: $users);
    }

    public function getSingleUser(string $user_id): array
    {
        $user = $this->getWithToken("admin/detail?id={$user_id}");

        return $this->serverResponseWithGetMethod(response: $user);
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

        return $this->serverResponseWithPostMethod(data: $data);
    }

    public function deleteUser(string $user_id): array
    {
        $data = $this->postWithToken('admin/hapus', ['id' => $user_id]);

        return $this->serverResponseWithPostMethod(data: $data);
    }

    // -------------------------FORM DATA-------------------------

    public function getRegionsList(): Collection
    {
        $regions = $this->getWithToken(endpoint: 'cabdin/index');

        $results = collect($regions['response']['data'])->map(fn ($region) => [
            'value' => $region['id'],
            'label' => $region['nama'],
        ]);

        return $regions['status_code'] == 200 ? $results : $this->serverFailedResponse(error: $regions);
    }

    public function getSchoolList(): Collection
    {
        $schools = $this->getWithToken(endpoint: 'sekolah');

        $results = collect($schools['response']['data'])->map(fn ($school) => [
            'value' => $school['id'],
            'label' => $school['nama_sekolah'],
        ]);

        return $schools['status_code'] == 200 ? $results : $this->serverFailedResponse(error: $schools);
    }

    public function getRolesList(): Collection
    {
        $roles = [
            [
                'value' => 1,
                'label' => 'Super Admin',
            ],
            [
                'value' => 2,
                'label' => 'Admin Provinsi',
            ],
            [
                'value' => 3,
                'label' => 'Admin Cabang Dinas',
            ],
            [
                'value' => 4,
                'label' => 'Admin Sekolah',
            ],
            [
                'value' => 5,
                'label' => 'Admin Sekolah Asal',
            ],
        ];

        return collect($roles);
    }

    public function getOriginSchoolsList(): Collection
    {
        $origin_schools = $this->getWithToken(endpoint: 'sekolah/asal/all');

        $results = collect($origin_schools['response']['data'])->map(fn ($school) => [
            'value' => $school['id'],
            'label' => $school['nama'],
        ]);

        return $origin_schools['status_code'] == 200 ? $results : $this->serverFailedResponse(error: $origin_schools);
    }
}
