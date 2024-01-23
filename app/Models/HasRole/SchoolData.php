<?php

namespace App\Models\HasRole;

use App\Models\Base;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class SchoolData extends Base
{
    public function getSchool(string $school_id): array
    {
        $school = $this->getWithToken(endpoint: "sekolah/detail?id={$school_id}");

        return $this->serverResponseWithGetMethod(response: $school);
    }

    public function updateSchool(Request $request, string $school_id): array
    {
        $kabupaten = explode('|', $request->kabupaten);
        $kecamatan = explode('|', $request->kecamatan);

        $body = [
            'id' => $school_id,
            'nama_kepsek' => $request->nama_kepsek,
            'nip_kepsek' => $request->nip_kepsek,
            'nama_kappdb' => $request->nama_kappdb,
            'nip_kappdb' => $request->nip_kappdb,
            'alamat_jalan' => $request->alamat_jalan,
            'desa' => $request->desa,
            'rtrw' => $request->rtrw,
            'kode_kabupaten' => $kabupaten[0],
            'kabupaten' => $kabupaten[1],
            'kode_kecamatan' => $kecamatan[0],
            'kecamatan' => $kecamatan[1],

            'kode_provinsi' => '73',
            'provinsi' => Str::upper('Sulawesi Selatan'),
        ];

        $school_data = $this->postWithToken(endpoint: 'sekolah/create/update', data: $body);

        return $this->serverResponseWithPostMethod(data: $school_data);
    }

    //
    public function getDistrictsList(string $code): Collection
    {
        $districts = $this->getWithToken(endpoint: "wilayah/kota/kecamatan?kode={$code}");

        return $districts['status_code'] == 200
            ? $this->jsonToCollectionFormData(collections: $districts, value: 'kode', label: 'nama')
            : $this->serverFailedResponse(error: $districts);
    }

    public function uploadPaktaIntegritas(Request $request, string $school_id): array
    {
        $data = $this->postWithTokenAndWithFile(
            endpoint: 'sekolah/upload/data',
            data: ['id' => $school_id],
            key: 'pakta_integritas',
            file: $request->file('pakta_integritas')
        );

        return $this->serverResponseWithPostMethod(data: $data);
    }

    public function uploadSkPpdb(Request $request, string $school_id): array
    {
        $data = $this->postWithTokenAndWithFile(
            endpoint: 'sekolah/upload/data',
            data: ['id' => $school_id],
            key: 'sk_ppdb',
            file: $request->file('sk_ppdb')
        );

        return $this->serverResponseWithPostMethod(data: $data);
    }

    public function uploadSchoolLogo(Request $request, string $school_id): array
    {
        $data = $this->postWithTokenAndWithFile(
            endpoint: 'sekolah/upload/data',
            data: ['id' => $school_id],
            key: 'logo',
            file: $request->file('logo')
        );

        return $this->serverResponseWithPostMethod(data: $data);
    }
}
