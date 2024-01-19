<?php

namespace App\Models\HasRole;

use App\Models\Base;
use Illuminate\Http\Request;

class School extends Base
{
    public function getSchools(): array
    {
        $schools = $this->getWithToken('sekolah');

        return $this->serverResponseWithGetMethod(response: $schools);
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

        return $this->serverResponseWithPostMethod(data: $data);
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

        return $this->serverResponseWithPostMethod(data: $data);
    }

    public function getSingleSchool(string $school_id): array
    {
        $school = $this->getWithToken(endpoint: "sekolah/detail?id={$school_id}");

        return $this->serverResponseWithGetMethod(response: $school);
    }
}
