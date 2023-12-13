<?php

namespace App\Http\Controllers\HasRole;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SchoolController extends Controller
{
    public function index(): View
    {
        return view('has-role.school.index', [
            'collections' => $this->getSchools(),
        ]);
    }

    protected function getSchools()
    {
        return collect([
            (object)[
                'id' => 1,
                'school_name' => 'SMAN 1 Parepare',
                'npsn' => 40311914,
                'unit' => 'SMA',
                'address' => 'Jl. Bau Massepe No. 24',
            ],
            (object)[
                'id' => 2,
                'school_name' => 'SMKN 2 Parepare',
                'npsn' => 4342314,
                'unit' => 'SMK',
                'address' => 'Jl. Karaeng Burane No. 18',
            ],
            (object)[
                'id' => 3,
                'school_name' => 'SMKN 8 Parepare',
                'npsn' => 6545346,
                'unit' => 'SMA Boarding',
                'address' => 'Jl. Muhammadiyah No. 8',
            ],
            (object)[
                'id' => 4,
                'school_name' => 'SMAN 1 Makassar',
                'npsn' => 8767566,
                'unit' => 'SMA Half Boarding',
                'address' => 'Jl. Pesantren No. 10',
            ],
            (object)[
                'id' => 5,
                'school_name' => 'SMKN 1 Parepare',
                'npsn' => 7567563,
                'unit' => 'SMA',
                'address' => 'Jl. Poros Rappang Parepare',
            ],
            (object)[
                'id' => 6,
                'school_name' => 'SMKN 12 Makassar',
                'npsn' => 4232456,
                'unit' => 'SMA Half Boarding',
                'address' => 'Industri Kecil No 99',
            ],
            (object)[
                'id' => 7,
                'school_name' => 'SMAN 20 Maros',
                'npsn' => 9673521,
                'unit' => 'SMA',
                'address' => 'Jl.Daeng Siraju No.58',
            ],
            (object)[
                'id' => 8,
                'school_name' => 'SMAN 3 Enrekang',
                'npsn' => 5378654,
                'unit' => 'SMA',
                'address' => 'Jl. Jenderal Sudirman No. 70',
            ],
        ]);
    }
}
