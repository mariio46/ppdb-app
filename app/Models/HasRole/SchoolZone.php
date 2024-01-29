<?php

namespace App\Models\HasRole;

use App\Models\Base;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class SchoolZone extends Base
{
    public function getSchoolZonesList(string $school_id): array
    {
        $zones = $this->getWithToken(endpoint: "zonasi/?sekolah_id={$school_id}");

        return $this->serverResponseWithGetMethod(response: $zones);
    }

    public function getSingleSchoolZone(string $zone_id): array
    {
        $zone = $this->getWithToken(endpoint: "zonasi/detail?id={$zone_id}");

        return $this->serverResponseWithGetMethod(response: $zone);
    }

    public function createSchoolZone(Request $request, string $school_id): array
    {
        $body = [
            'sekolah_id' => $school_id,
            'wilayah_kode' => $request->kecamatan,
        ];

        $response = $this->postWithToken(endpoint: 'zonasi/add', data: $body);

        return $this->serverResponseWithPostMethod(data: $response);
    }

    public function editSchoolZone(Request $request, string $school_id, string $zone_id): array
    {
        $body = [
            'id' => $zone_id,
            'sekolah_id' => $school_id,
            'wilayah_kode' => $request->kecamatan,
        ];

        $response = $this->postWithToken(endpoint: 'zonasi/edit', data: $body);

        return $this->serverResponseWithPostMethod(data: $response);
    }

    public function deleteSchoolZone(string $zone_id): array
    {
        $response = $this->postWithToken(endpoint: 'zonasi/hapus', data: ['id' => $zone_id]);

        return $this->serverResponseWithPostMethod(data: $response);
    }

    // -------------------------FORM DATA-------------------------

    public function getListProvince(): Collection
    {
        $provinces = $this->getWithToken(endpoint: 'wilayah/all/provinsi');

        return $provinces['status_code'] == 200
            ? $this->jsonToCollectionFormData(collections: $provinces, value: 'kode', label: 'nama')
            : $this->serverFailedResponse(error: $provinces);
    }

    public function getListCity(string $province_code): Collection
    {
        $cities = $this->getWithToken(endpoint: "wilayah/all/kota?kode={$province_code}");

        return $cities['status_code'] == 200
            ? $this->jsonToCollectionFormData(collections: $cities, value: 'kode', label: 'nama')
            : $this->serverFailedResponse(error: $cities);
    }

    public function getListDistrict(string $city_code): Collection
    {
        $districts = $this->getWithToken(endpoint: "wilayah/kota/kecamatan?kode={$city_code}");

        return $districts['status_code'] == 200
            ? $this->jsonToCollectionFormData(collections: $districts, value: 'kode', label: 'nama')
            : $this->serverFailedResponse(error: $districts);
    }
}
