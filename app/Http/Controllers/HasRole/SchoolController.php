<?php

namespace App\Http\Controllers\HasRole;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;

class SchoolController extends Controller
{
    public function index(): View
    {
        return view('has-role.school.index');
    }

    public function create(): View
    {
        return view('has-role.school.create');
    }

    public function edit($npsn): View
    {
        return view('has-role.school.edit', compact('npsn'));
    }

    public function schoolMajorQuota($npsn): View
    {
        return view('has-role.school.major', [
            'school' => $this->getSingleSchool($npsn),
            'quotas' => $this->getSchoolMajorQuota(),
        ]);
    }

    public function schoolDetail($npsn, $unit): View
    {
        return view('has-role.school.detail', compact('npsn', 'unit'));
    }

    public function schoolQuota($npsn, $unit): View
    {
        return view('has-role.school.quota', compact('npsn', 'unit'));
    }

    public function schoolZone($npsn, $unit): View
    {
        return $unit == 'SMA' || $unit == 'SMA Half Boarding'
            ? view('has-role.school.zone', compact('npsn', 'unit'))
            : abort(404);
    }

    // --------------------------------------------------DATA JSON--------------------------------------------------
    protected function units(): JsonResponse
    {
        $units = [
            [
                'label' => 'SMA',
                'value' => 1,
            ],
            [
                'label' => 'SMK',
                'value' => 2,
            ],
            [
                'label' => 'SMA Boarding',
                'value' => 3,
            ],
            [
                'label' => 'SMA Half Boarding',
                'value' => 4,
            ],
        ];

        return response()->json($units);
    }

    protected function zones(): JsonResponse
    {
        $zones = [
            [
                'id' => 1,
                'province' => 'Sulawesi Selatan',
                'city' => 'Parepare',
                'subdistrict' => 'Bacukiki',
            ],
            [
                'id' => 2,
                'province' => 'Sulawesi Selatan',
                'city' => 'Parepare',
                'subdistrict' => 'Soreang',
            ],
            [
                'id' => 3,
                'province' => 'Sulawesi Selatan',
                'city' => 'Parepare',
                'subdistrict' => 'Ujung',
            ],
            [
                'id' => 4,
                'province' => 'Sulawesi Selatan',
                'city' => 'Makassar',
                'subdistrict' => 'Biringkanaya',
            ],
            [
                'id' => 5,
                'province' => 'Sulawesi Selatan',
                'city' => 'Makassar',
                'subdistrict' => 'Bontoala',
            ],
            [
                'id' => 6,
                'province' => 'Sulawesi Selatan',
                'city' => 'Makassar',
                'subdistrict' => 'Kepulauan Sangkarrang',
            ],
            [
                'id' => 7,
                'province' => 'Sulawesi Selatan',
                'city' => 'Makassar',
                'subdistrict' => 'Mamajang',
            ],
            [
                'id' => 8,
                'province' => 'Sulawesi Selatan',
                'city' => 'Makassar',
                'subdistrict' => 'Manggala',
            ],
            [
                'id' => 9,
                'province' => 'Sulawesi Selatan',
                'city' => 'Barru',
                'subdistrict' => 'Balusu',
            ],
            [
                'id' => 10,
                'province' => 'Sulawesi Selatan',
                'city' => 'Barru',
                'subdistrict' => 'Mallusetasi',
            ],
            [
                'id' => 11,
                'province' => 'Sulawesi Selatan',
                'city' => 'Barru',
                'subdistrict' => 'Pujananting',
            ],
            [
                'id' => 12,
                'province' => 'Sulawesi Selatan',
                'city' => 'Barru',
                'subdistrict' => 'Tanete Riaja',
            ],
            [
                'id' => 13,
                'province' => 'Sulawesi Selatan',
                'city' => 'Enrekang',
                'subdistrict' => 'Alla',
            ],
            [
                'id' => 14,
                'province' => 'Sulawesi Selatan',
                'city' => 'Enrekang',
                'subdistrict' => 'Anggeraja',
            ],
            [
                'id' => 15,
                'province' => 'Sulawesi Selatan',
                'city' => 'Enrekang',
                'subdistrict' => 'Baraka',
            ],
            [
                'id' => 16,
                'province' => 'Sulawesi Selatan',
                'city' => 'Enrekang',
                'subdistrict' => 'Buntu Batu',
            ],
            [
                'id' => 17,
                'province' => 'Sulawesi Selatan',
                'city' => 'Sidrap',
                'subdistrict' => 'Baranti',
            ],
            [
                'id' => 18,
                'province' => 'Sulawesi Selatan',
                'city' => 'Sidrap',
                'subdistrict' => 'Duapitue',
            ],
            [
                'id' => 19,
                'province' => 'Sulawesi Selatan',
                'city' => 'Sidrap',
                'subdistrict' => 'Kulo',
            ],
            [
                'id' => 20,
                'province' => 'Sulawesi Selatan',
                'city' => 'Sidrap',
                'subdistrict' => 'Panca Lautang',
            ],
        ];

        return response()->json($zones);
    }

    protected function schoolsQuota($npsn, $unit): JsonResponse
    {
        $quota_smk = [
            [
                'label' => 'Teknik Komputer dan Jaringan',
                'value' => '150 Orang',
            ],
            [
                'label' => 'Teknik Kendaraan Ringan',
                'value' => '75 Orang',
            ],
            [
                'label' => 'Pemodelan dan Informasi Bangunan',
                'value' => '100 Orang',
            ],
            [
                'label' => 'Administrasi Perkantoran',
                'value' => '200 Orang',
            ],
            [
                'label' => 'Tata Rias dan Kecantikan',
                'value' => '250 Orang',
            ],
            [
                'label' => 'Perbankan dan Keuangan Syariah',
                'value' => '50 Orang',
            ],
        ];

        $quota_sma = [
            [
                // Afirmasi
                'label' => 'Jalur Afirmasi',
                'value' => '150 Orang',
            ],
            [
                // Mutasi
                'label' => 'Jalur Perpindahan Tugas Orang Tua',
                'value' => '75 Orang',
            ],
            [
                // Anak Guru
                'label' => 'Jalur Anak Guru',
                'value' => '100 Orang',
            ],
            [
                // Akademik
                'label' => 'Jalur Prestasi Akademik',
                'value' => '50 Orang',
            ],
            [
                // Non Akademik
                'label' => 'Jalur Prestasi Non Akademik',
                'value' => '200 Orang',
            ],
            [
                // Zonasi
                'label' => 'Jalur Zonasi',
                'value' => '250 Orang',
            ],
        ];

        $quota_sma_full_boarding = [
            [
                'label' => 'Jalur Boarding School',
                'value' => '500 Orang',
            ],
        ];

        $quota_sma_half_boarding = array_merge($quota_sma, $quota_sma_full_boarding);

        if ($unit == 'SMA') {
            return response()->json($quota_sma);
        } elseif ($unit == 'SMA Half Boarding') {
            return response()->json($quota_sma_half_boarding);
        } elseif ($unit == 'SMA Boarding') {
            return response()->json($quota_sma_full_boarding);
        } elseif ($unit == 'SMK') {
            return response()->json($quota_smk);
        } else {
            return response()->json(['error' => 'Quota Tidak Ditemukan'], 404);
        }
    }

    protected function getSingleSchool($npsn): JsonResponse
    {
        $school = [
            'id' => 1,
            'name' => 'SMAN 1 Parepare',
            'npsn' => 40311914,
            'unit' => [
                'label' => 'SMA',
                'value' => 1,
            ],
            'alamat_jalan' => 'Jl. Bau Massepe No. 24',
            'nama_kepsek' => 'H. Ryan Rafli, S.T, M.Kom, Ph.D',
            'nip_kepsek' => '12345678909',
            'nama_kappdb' => 'Muhammad Al Muqtadir, S.kom',
            'nip_kappdb' => '9876543212',
            'kabupaten' => 'Parepare',
            'kecamatan' => 'Bacukiki',
            'desa' => 'Galung Maloang',
            'rtrw' => '001/002',
            'bujur' => '-2.649099922180',
            'lintang' => '-2.649099922180',
        ];

        return response()->json($school);
    }

    protected function schools(): JsonResponse
    {
        $schools = [
            [
                'id' => 1,
                'name' => 'SMAN 1 Parepare',
                'npsn' => 40311914,
                'unit' => 'SMA',
                'address' => 'Jl. Bau Massepe No. 24',
            ],
            [
                'id' => 2,
                'name' => 'SMKN 2 Parepare',
                'npsn' => 4342314,
                'unit' => 'SMK',
                'address' => 'Jl. Karaeng Burane No. 18',
            ],
            [
                'id' => 3,
                'name' => 'SMKN 8 Parepare',
                'npsn' => 6545346,
                'unit' => 'SMA Boarding',
                'address' => 'Jl. Muhammadiyah No. 8',
            ],
            [
                'id' => 4,
                'name' => 'SMAN 1 Makassar',
                'npsn' => 8767566,
                'unit' => 'SMA Half Boarding',
                'address' => 'Jl. Pesantren No. 10',
            ],
            [
                'id' => 5,
                'name' => 'SMAN 2 Parepare',
                'npsn' => 7567563,
                'unit' => 'SMA Boarding',
                'address' => 'Jl. Poros Rappang Parepare',
            ],
            [
                'id' => 6,
                'name' => 'SMKN 12 Makassar',
                'npsn' => 4232456,
                'unit' => 'SMA Half Boarding',
                'address' => 'Industri Kecil No 99',
            ],
            [
                'id' => 7,
                'name' => 'SMAN 20 Maros',
                'npsn' => 9673521,
                'unit' => 'SMA',
                'address' => 'Jl.Daeng Siraju No.58',
            ],
            [
                'id' => 8,
                'name' => 'SMAN 3 Enrekang',
                'npsn' => 5378654,
                'unit' => 'SMA',
                'address' => 'Jl. Jenderal Sudirman No. 70',
            ],
        ];

        return response()->json($schools);
    }
}
