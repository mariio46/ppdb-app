<?php

namespace App\Models\HasRole;

use App\Models\Base;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class School extends Base
{
    public function getSchools(): array
    {
        $hasCabdin = session()->get('cabdin_id') != null;
        $cabdinId = session()->get('cabdin_id');

        $url = $hasCabdin ? "sekolah?cabdin_id={$cabdinId}" : 'sekolah';

        $schools = $this->getWithToken($url);

        return $this->serverResponseWithGetMethod(response: $schools);
    }

    public function getSingleSchool(string $school_id): array
    {
        $school = $this->getWithToken(endpoint: "sekolah/detail?id={$school_id}");

        return $this->serverResponseWithGetMethod(response: $school);
    }

    public function createSchool(Request $request, string $cabdin_id): array
    {
        $kabupaten = explode('|', $request->kabupaten);

        $body = [
            'cabdin_id' => $cabdin_id,
            'nama_sekolah' => $request->nama_sekolah,
            'npsn' => $request->npsn,
            'kode_kabupaten' => $kabupaten[0],
            'kabupaten' => $kabupaten[1],
            'satuan_pendidikan' => $request->satuan_pendidikan,

            'kode_provinsi' => '73',
            'provinsi' => Str::upper('Sulawesi Selatan'),
        ];

        $data = $this->postWithToken(endpoint: 'sekolah/create/update', data: $body);

        return $this->serverResponseWithPostMethod(data: $data);
    }

    public function updateSchool(Request $request, string $user_id, string $cabdin_id): array
    {
        $kabupaten = explode('|', $request->kabupaten);

        $body = [
            'cabdin_id' => $cabdin_id,
            'nama_sekolah' => $request->nama_sekolah,
            'npsn' => $request->npsn,
            'kode_kabupaten' => $kabupaten[0],
            'kabupaten' => $kabupaten[1],
            'satuan_pendidikan' => $request->satuan_pendidikan,
            'id' => $user_id,

            'kode_provinsi' => '73',
            'provinsi' => Str::upper('Sulawesi Selatan'),
        ];

        $data = $this->postWithToken(endpoint: 'sekolah/create/update', data: $body);

        return $this->serverResponseWithPostMethod(data: $data);
    }

    public function getSchoolQuota(string $school_unit, string $school_id): array
    {
        $unit = Str::upper($school_unit);

        $quotas = $this->getWithToken(endpoint: "kuota/?satuan_pendidikan={$unit}&id={$school_id}");

        return $this->serverResponseWithGetMethod(response: $quotas);
    }

    public function getSchoolZone(string $school_id): array
    {
        $zones = $this->getWithToken(endpoint: "zonasi/?sekolah_id={$school_id}");

        return $this->serverResponseWithGetMethod(response: $zones);
    }

    public function verifySchool(string $school_id, string $cabdin_id): array
    {
        $body = [
            'cabdin_id' => $cabdin_id,
            'id' => $school_id,
        ];

        $response = $this->postWithToken(endpoint: 'sekolah/verifikasi', data: $body);

        return $this->serverResponseWithPostMethod(data: $response);
    }
}
