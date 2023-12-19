<?php

namespace App\Http\Controllers\HasRole;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class OriginSchoolController extends Controller
{
    public function index(): View
    {
        return view('has-role.origin-school.index', [
            'collections' => $this->getSchools(),
        ]);
    }

    public function create(): View
    {
        return view('has-role.origin-school.create');
    }

    public function show($id): View
    {
        return view('has-role.origin-school.show', [
            'school' => $this->getSingleSchool($id),
        ]);
    }

    public function edit($id): View
    {
        return view('has-role.origin-school.edit', [
            'school' => $this->getSingleSchool($id),
        ]);
    }

    protected function getSingleSchool($id)
    {
        $schools = $this->getSchools()->where('id', $id);
        $data = json_decode($schools, true);
        foreach ($data as $key => $item) {
            $school = (object) $item;
        }
        return $school;
    }

    protected function getSchools()
    {
        return collect([
            (object)[
                'id' => 1,
                'name' => 'SMPN 1 Makassar',
                'npsn' => 40311914,
                'unit' => 'SMP',
                'address' => 'Jl.Daeng Siraju No.58',
            ],
            (object)[
                'id' => 2,
                'name' => 'SMPN 20 Maros',
                'npsn' => 4342314,
                'unit' => 'SMP',
                'address' => 'Jl. Poros Rappang Parepare',
            ],
            (object)[
                'id' => 3,
                'name' => 'SMPN 3 Enrekang',
                'npsn' => 6545346,
                'unit' => 'SMP',
                'address' => 'Jl. Jenderal Sudirman No. 70',
            ],
            (object)[
                'id' => 4,
                'name' => 'SMPN 2 Parepare',
                'npsn' => 8767566,
                'unit' => 'SMP',
                'address' => 'Jl. Pesantren No. 10',
            ],
            (object)[
                'id' => 5,
                'name' => 'SMPN 1 Parepare',
                'npsn' => 7567563,
                'unit' => 'SMP',
                'address' => 'Jl. Karaeng Burane No. 18',
            ],
            (object)[
                'id' => 6,
                'name' => 'SMPN 12 Parepare',
                'npsn' => 4232456,
                'unit' => 'SMP',
                'address' => 'Jl. Bau Massepe No. 24',
            ],
            (object)[
                'id' => 6,
                'name' => 'SMPN 5 Gowa',
                'npsn' => 9673521,
                'unit' => 'SMP',
                'address' => 'Industri Kecil No 99',
            ],
            (object)[
                'id' => 7,
                'name' => 'SMPN 8 Parepare',
                'npsn' => 5378654,
                'unit' => 'SMP',
                'address' => 'Jl. Muhammadiyah No. 8',
            ],
        ]);
    }
}
