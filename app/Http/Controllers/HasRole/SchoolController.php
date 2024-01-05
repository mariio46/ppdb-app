<?php

namespace App\Http\Controllers\HasRole;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class SchoolController extends Controller
{
    public function index(): View
    {
        return view('has-role.school.index', [
            'collections' => $this->getSchools(),
        ]);
    }

    public function edit(): View
    {
        return view('has-role.school.edit');
    }

    public function schoolMajorQuota($npsn): View
    {
        return view('has-role.school.major', [
            'school' => $this->getSingleSchool($npsn),
            'quotas' => $this->getSchoolMajorQuota(),
        ]);
    }

    public function schoolDetail($npsn): View
    {
        return view('has-role.school.detail', [
            'school' => $this->getSingleSchool($npsn),
        ]);
    }

    public function schoolQuota($npsn): View
    {
        return view('has-role.school.quota', [
            'school' => $this->getSingleSchool($npsn),
            'quotas' => $this->getSchoolQuota(),
        ]);
    }

    public function schoolZone($npsn)
    {
        return view('has-role.school.zone', [
            'school' => $this->getSingleSchool($npsn),
            'zones' => $this->getSchoolZone(),
        ]);
    }

    protected function getSchoolZone()
    {
        return collect([
            (object) [
                'id' => 1,
                'province' => 'Sulawesi Selatan',
                'city' => 'Parepare',
                'subdistrict' => 'Bacukiki',
            ],
            (object) [
                'id' => 2,
                'province' => 'Sulawesi Selatan',
                'city' => 'Parepare',
                'subdistrict' => 'Soreang',
            ],
        ]);
    }

    protected function getSchoolMajorQuota()
    {
        return collect([
            (object) [
                'id' => 1,
                'major_name' => 'Teknik Komputer dan Jaringan',
                'major_quota' => '150 Orang',
            ],
            (object) [
                'id' => 2,
                'major_name' => 'Teknik Kendaraan Ringan',
                'major_quota' => '75 Orang',
            ],
            (object) [
                'id' => 3,
                'major_name' => 'Pemodelan dan Informasi Bangunan',
                'major_quota' => '100 Orang',
            ],
            (object) [
                'id' => 4,
                'major_name' => 'Administrasi Perkantoran',
                'major_quota' => '200 Orang',
            ],
            (object) [
                'id' => 5,
                'major_name' => 'Tata Rias dan Kecantikan',
                'major_quota' => '250 Orang',
            ],
            (object) [
                'id' => 6,
                'major_name' => 'Perbankan dan Keuangan Syariah',
                'major_quota' => '50 Orang',
            ],
        ]);
    }

    protected function getSchoolQuota()
    {
        return collect([
            (object) [
                'id' => 1,
                'registration_path' => 'Jalur Afirmasi',
                'total_quota' => '150 Orang',
            ],
            (object) [
                'id' => 2,
                'registration_path' => 'Jalur Perpindahan Tugas Orang Tua',
                'total_quota' => '75 Orang',
            ],
            (object) [
                'id' => 3,
                'registration_path' => 'Jalur Anak Guru',
                'total_quota' => '100 Orang',
            ],
            (object) [
                'id' => 4,
                'registration_path' => 'Jalur Prestasi Non Akademik',
                'total_quota' => '200 Orang',
            ],
            (object) [
                'id' => 5,
                'registration_path' => 'Jalur Domisili Terdekat',
                'total_quota' => '250 Orang',
            ],
            (object) [
                'id' => 6,
                'registration_path' => 'Jalur Prestasi Akademik',
                'total_quota' => '50 Orang',
            ],
        ]);
    }

    protected function getSingleSchool($npsn)
    {
        $schools = $this->getSchools()->where('npsn', $npsn);
        $data = json_decode($schools, true);
        foreach ($data as $key => $item) {
            $school = (object) $item;
        }

        return $school;
    }

    protected function getSchools()
    {
        return collect([
            (object) [
                'id' => 1,
                'school_name' => 'SMAN 1 Parepare',
                'npsn' => 40311914,
                'unit' => 'SMA',
                'address' => 'Jl. Bau Massepe No. 24',
            ],
            (object) [
                'id' => 2,
                'school_name' => 'SMKN 2 Parepare',
                'npsn' => 4342314,
                'unit' => 'SMK',
                'address' => 'Jl. Karaeng Burane No. 18',
            ],
            (object) [
                'id' => 3,
                'school_name' => 'SMKN 8 Parepare',
                'npsn' => 6545346,
                'unit' => 'SMA Boarding',
                'address' => 'Jl. Muhammadiyah No. 8',
            ],
            (object) [
                'id' => 4,
                'school_name' => 'SMAN 1 Makassar',
                'npsn' => 8767566,
                'unit' => 'SMA Half Boarding',
                'address' => 'Jl. Pesantren No. 10',
            ],
            (object) [
                'id' => 5,
                'school_name' => 'SMKN 1 Parepare',
                'npsn' => 7567563,
                'unit' => 'SMA',
                'address' => 'Jl. Poros Rappang Parepare',
            ],
            (object) [
                'id' => 6,
                'school_name' => 'SMKN 12 Makassar',
                'npsn' => 4232456,
                'unit' => 'SMA Half Boarding',
                'address' => 'Industri Kecil No 99',
            ],
            (object) [
                'id' => 7,
                'school_name' => 'SMAN 20 Maros',
                'npsn' => 9673521,
                'unit' => 'SMA',
                'address' => 'Jl.Daeng Siraju No.58',
            ],
            (object) [
                'id' => 8,
                'school_name' => 'SMAN 3 Enrekang',
                'npsn' => 5378654,
                'unit' => 'SMA',
                'address' => 'Jl. Jenderal Sudirman No. 70',
            ],
        ]);
    }
}
