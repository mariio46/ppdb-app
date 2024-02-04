<?php

namespace App\Models\Student;

use App\Models\Base;

class SchoolModel extends Base
{
    public function getSchools(string $type = '', string $city = ''): array // 04.001
    {
        $get = $this->swGetWithToken("sekolah/jenis/kabupaten?kode=$city&jenis=$type&status=verifikasi");

        return $this->serverResponseWithGetMethod($get);
    }

    public function getSchoolByCity(?string $type, ?string $city): array // 04.002
    {
        $data = $this->swGetWithToken("sekolah/jenis/kabupaten?kode=$city&jenis=$type&status=verifikasi");

        return $this->serverResponseWithGetMethod($data);
    }

    public function getSchoolByZone(): array
    {
        return [
            [
                'id' => '000021',
                'name' => 'SMAN 1 Makassar',
            ],
            [
                'id' => '000022',
                'name' => 'SMAN 2 Makassar',
            ],
        ];
    }

    public function getBoardingSchool(): array //
    {
        $get = $this->swGetWithToken('sekolah/boarding');

        return $this->serverResponseWithGetMethod($get);
    }

    public function getDepartmentBySchool(string $schoolId): array
    {
        $get = $this->swGetWithToken("sekolah/daftar/jurusan?sekolah_id=$schoolId");

        return $this->serverResponseWithGetMethod($get);
    }
}
