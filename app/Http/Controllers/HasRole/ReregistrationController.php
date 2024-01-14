<?php

namespace App\Http\Controllers\HasRole;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;

class ReregistrationController extends Controller
{
    public function index(): View
    {
        return view('has-role.reregistration.index');
    }

    public function show(string $nisn): View
    {
        return view('has-role.reregistration.show', compact('nisn'));
    }

    // --------------------------------------------------DATA JSON--------------------------------------------------

    protected function students(): JsonResponse
    {
        $students = [
            [
                'id' => '1',
                'nama' => 'Muhammad Al Muqtadir',
                'nisn' => '6564553453',
                'status' => 's',
                'table_pengumuman' => [
                    'jalur' => 'AA',
                    'jurusan_name' => 'Teknik Kendaraan Ringan',
                ],
            ],
            [
                'id' => '2',
                'nama' => 'Ryan Rafli',
                'nisn' => '5454224678',
                'status' => 'b',
                'table_pengumuman' => [
                    'jalur' => 'AC',
                    'jurusan_name' => 'Teknik Komputer dan Jaringan',
                ],
            ],
            [
                'id' => '3',
                'nama' => 'Ainun Putri',
                'nisn' => '10302913833',
                'status' => 'b',
                'table_pengumuman' => [
                    'jalur' => 'AE',
                    'jurusan_name' => null,
                ],
            ],
            [
                'id' => '4',
                'nama' => 'Edy Siswanto Syarif',
                'nisn' => '43242354815',
                'status' => 'b',
                'table_pengumuman' => [
                    'jalur' => 'AG',
                    'jurusan_name' => null,
                ],
            ],
            [
                'id' => '5',
                'nama' => 'Muh Rafie Muis',
                'nisn' => '42342356788',
                'status' => 'b',
                'table_pengumuman' => [
                    'jalur' => 'AE',
                    'jurusan_name' => 'Administrasi Perkantoran',
                ],
            ],
            [
                'id' => '6',
                'nama' => 'Vicky Giovaldi',
                'nisn' => '8787575645',
                'status' => 's',
                'table_pengumuman' => [
                    'jalur' => 'AE',
                    'jurusan_name' => null,
                ],
            ],
        ];

        return response()->json($students);
    }

    protected function student(string $nisn): JsonResponse
    {
        $student = collect($this->students()->original)->firstWhere('nisn', $nisn);

        return response()->json($student);
    }
}
