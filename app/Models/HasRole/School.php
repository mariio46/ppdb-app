<?php

namespace App\Models\HasRole;

use App\Models\Base;
use Illuminate\Http\Request;

class School extends Base
{
    public function getSchools(): array
    {
        $schools = $this->getWithToken('sekolah');

        if ($schools['status_code'] == 200) {
            return $schools['response'];
        } else {
            return [
                'statusCode' => $schools['status_code'],
                'messages' => 'Gagal Menampilkan Data',
            ];
        }
    }

    public function createSchool(Request $request): array
    {
        $kabupaten = explode('|', $request->kabupaten);

        $body = [
            'nama_sekolah' => $request->nama_sekolah,
            'npsn' => $request->npsn,
            'kode_kabupaten' => $kabupaten[0],
            'kabupaten' => $kabupaten[1],
            'satuan_pendidikan' => $request->satuan_pendidikan,
        ];

        $data = $this->postWithToken(endpoint: 'sekolah/create/update', data: $body);

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

    public function updateSchool(Request $request, string $user_id): array
    {
        $kabupaten = explode('|', $request->kabupaten);

        $body = [
            'nama_sekolah' => $request->nama_sekolah,
            'npsn' => $request->npsn,
            'kode_kabupaten' => $kabupaten[0],
            'kabupaten' => $kabupaten[1],
            'satuan_pendidikan' => $request->satuan_pendidikan,
            'id' => $user_id,
        ];

        $data = $this->postWithToken(endpoint: 'sekolah/create/update', data: $body);

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

    public function getSingleSchool(string $school_id): array
    {
        $school = $this->getWithToken(endpoint: "sekolah/detail?id={$school_id}");

        if ($school['status_code'] == 200) {
            return $school['response'];
        } else {
            return [
                'statusCode' => $school['status_code'],
                'messages' => 'Gagal Menampilkan Data',
            ];
        }
    }
}
