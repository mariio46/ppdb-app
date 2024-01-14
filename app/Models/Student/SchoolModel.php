<?php

namespace App\Models\Student;

use App\Models\Base;

class SchoolModel extends Base
{
    public function getSchools(string $type = '', string $city = ''): array // 04.001
    {
        // $data = [
        //     [
        //         'id' => '000011',
        //         'city' => '73.01',
        //         'name' => 'SMAN 1 Selayar',
        //         'type' => 'SMA',
        //         'address' => 'Jl. Sampel No. 1',
        //     ],
        //     [
        //         'id' => '000012',
        //         'city' => '73.01',
        //         'name' => 'SMAN 2 Selayar',
        //         'type' => 'SMA',
        //         'address' => 'Jl. Sampel No. 2',
        //     ],
        //     [
        //         'id' => '000021',
        //         'city' => '73.71',
        //         'name' => 'SMAN 1 Makassar',
        //         'type' => 'SMA',
        //         'address' => 'Jl. Sampel No. 1',
        //     ],
        //     [
        //         'id' => '000022',
        //         'city' => '73.71',
        //         'name' => 'SMAN 2 Makassar',
        //         'type' => 'SMA',
        //         'address' => 'Jl. Sampel No. 2',
        //     ],
        //     [
        //         'id' => '100011',
        //         'city' => '73.01',
        //         'name' => 'SMKN 1 Selayar',
        //         'type' => 'SMK',
        //         'address' => 'Jl. Sampel No. 1',
        //         'department' => ['Pariwisata', 'Akuntansi'],
        //     ],
        //     [
        //         'id' => '100012',
        //         'city' => '73.01',
        //         'name' => 'SMKN 2 Selayar',
        //         'type' => 'SMK',
        //         'address' => 'Jl. Sampel No. 2',
        //         'department' => ['Teknik Otomotif', 'Teknik Komputer dan Jaringan (TKJ)'],
        //     ],
        //     [
        //         'id' => '100021',
        //         'city' => '73.71',
        //         'name' => 'SMKN 1 Makassar',
        //         'type' => 'SMK',
        //         'address' => 'Jl. Sampel No. 1',
        //         'department' => ['Bisnis dan Manajemen', 'Teknik Komputer dan Jaringan (TKJ)'],
        //     ],
        //     [
        //         'id' => '100022',
        //         'city' => '73.71',
        //         'name' => 'SMKN 2 Makassar',
        //         'type' => 'SMK',
        //         'address' => 'Jl. Sampel No. 2',
        //         'department' => ['Teknik Elektronika Industri', 'Pariwisata'],
        //     ],
        // ];

        // $collection = collect($data);

        // $filtered = $collection->when($type, function ($query) use ($type) {
        //     return $query->where('type', $type);
        // })->when($city, function ($query) use ($city) {
        //     return $query->where('city', $city);
        // })->all();

        // if (!$type && !$city) {
        //     $filtered = $collection->all();
        // }

        // return array_values($filtered);

        $get = $this->swGetWithToken("sekolah");
        if ($get['status_code'] == 200) {
            return $get['response'];
        } else {
            return [
                "statusCode"    => $get['status_code'],
                "status"        => "failed",
                "messages"      => "Terjadi kesalahan. Gagal mendapatkan data.",
                "data"          => []
            ];
        }
    }

    public function getSchoolByCity(?string $type, ?string $city): array // 04.002
    {
        // $data = [];

        // if ($type == 'sma' && $city == '73.01') {
        //     $data = [
        //         [
        //             'id' => '000011',
        //             'name' => 'SMAN 1 Selayar',
        //         ],
        //         [
        //             'id' => '000012',
        //             'name' => 'SMAN 2 Selayar',
        //         ],
        //     ];
        // } elseif ($type == 'sma' && $city == '73.71') {
        //     $data = [
        //         [
        //             'id' => '000021',
        //             'name' => 'SMAN 1 Makassar',
        //         ],
        //         [
        //             'id' => '000022',
        //             'name' => 'SMAN 2 Makassar',
        //         ],
        //     ];
        // } elseif ($type == 'smk' && $city == '73.01') {
        //     $data = [
        //         [
        //             'id' => '100011',
        //             'name' => 'SMKN 1 Selayar',
        //         ],
        //         [
        //             'id' => '100012',
        //             'name' => 'SMKN 2 Selayar',
        //         ],
        //     ];
        // } elseif ($type == 'smk' && $city == '73.71') {
        //     $data = [
        //         [
        //             'id' => '100021',
        //             'name' => 'SMKN 1 Makassar',
        //         ],
        //         [
        //             'id' => '100022',
        //             'name' => 'SMKN 2 Makassar',
        //         ],
        //     ];
        // }

        $data = $this->swGetWithToken("sekolah/jenis/kabupaten?kode=$city&satuan_pendidikan=$type");

        if ($data['status_code'] == 200) {
            return $data['response'];
        } else {
            return [
                "statusCode"    => $data['status_code'],
                "status"        => "failed",
                "messages"      => "Gagal mendapatkan data.",
                "data"          => []
            ];
        }
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
