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

    public function getBoardingSchool(): array
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

    public function getDepartmentBySchool(string $schoolId): array
    {
        return match ($schoolId) {
            '100011' => [
                ['id' => '765432', 'name' => 'Pariwisata'],
                ['id' => '123456', 'name' => 'Akuntansi'],
            ],
            '100012' => [
                ['id' => '987654', 'name' => 'Teknik Otomotif'],
                ['id' => '456789', 'name' => 'Teknik Komputer dan Jaringan (TKJ)'],
            ],
            '100021' => [
                ['id' => '234567', 'name' => 'Bisnis dan Manajemen'],
                ['id' => '876543', 'name' => 'Teknik Komputer dan Jaringan (TKJ)'],
            ],
            '100022' => [
                ['id' => '543210', 'name' => 'Teknik Elektronika Industri'],
                ['id' => '789012', 'name' => 'Pariwisata'],
            ],
            default => []
        };
    }
}
