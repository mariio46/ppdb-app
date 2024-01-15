<?php

namespace App\Http\Controllers\HasRole;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;

class OperatorController extends Controller
{
    public function index(): View
    {
        return view('has-role.operator.index');
    }

    public function create(): view
    {
        return view('has-role.operator.create');
    }

    public function show(string $username): View
    {
        return view('has-role.operator.show', compact('username'));
    }

    public function edit(string $username): View
    {
        return view('has-role.operator.edit', compact('username'));
    }

    // --------------------------------------------------DATA JSON--------------------------------------------------
    protected function singleOperator(string $username): JsonResponse
    {
        $operator = collect($this->operators()->original)->firstWhere('username', $username);

        return response()->json($operator);
    }

    protected function operators(): JsonResponse
    {
        $operators = [
            [
                'id' => 1,
                'nama' => 'Mawardi',
                'nama_pengguna' => 'mawar58468',
                'sekolah_nama' => 'hehe',
                'status_aktif' => 1,
            ],
            [
                'id' => 2,
                'nama' => 'Rais',
                'nama_pengguna' => 'rais23078',
                'sekolah_nama' => 'hehe',
                'status_aktif' => 3,
            ],
            [
                'id' => 3,
                'nama' => 'Edi Siswanto',
                'nama_pengguna' => 'edi23078',
                'sekolah_nama' => 'hehe',
                'status_aktif' => 1,
            ],
            [
                'id' => 4,
                'nama' => 'Aldi Taher',
                'nama_pengguna' => 'taher23078',
                'sekolah_nama' => 'hehe',
                'status_aktif' => 3,
            ],
            [
                'id' => 5,
                'nama' => 'Ainun Amirah',
                'nama_pengguna' => 'ainun23078',
                'sekolah_nama' => 'hehe',
                'status_aktif' => 2,
            ],
        ];

        return response()->json($operators);
    }
}
