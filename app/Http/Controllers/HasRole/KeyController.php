<?php

namespace App\Http\Controllers\HasRole;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;

class KeyController extends Controller
{
    public function index(): View
    {
        return view('has-role.key.index');
    }

    // --------------------------------------------------DATA JSON--------------------------------------------------

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
