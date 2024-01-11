<?php

namespace App\Http\Controllers\HasRole\Superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;

class PermissionController extends Controller
{
    public function index(): View
    {
        return view('has-role.superadmin.permissions.index');
    }

    public function create(): View
    {
        return view('has-role.superadmin.permissions.create');
    }

    public function edit(int $id): View
    {
        return view('has-role.superadmin.permissions.edit', compact('id'));
    }

    // --------------------------------------------------DATA JSON--------------------------------------------------

    protected function permission(int $id): JsonResponse
    {
        $permission = collect($this->permissions()->original)->firstWhere('id', $id);

        return response()->json($permission);
    }

    protected function permissions(): JsonResponse
    {
        $permissions = [
            [
                'id' => 1,
                'name' => 'Lihat Akun Siswa',
                'keterangan' => 'User hanya dapat melihat Detail Akun Siswa',
            ],
            [
                'id' => 2,
                'name' => 'Buat Akun Siswa',
                'keterangan' => 'User dapat membuat Akun Siswa',
            ],
            [
                'id' => 3,
                'name' => 'Edit Akun Siswa',
                'keterangan' => 'User dapat mengedit Akun Siswa yang sudah ada',
            ],
            [
                'id' => 4,
                'name' => 'Verifikasi Akun Siswa',
                'keterangan' => 'User dapat memverifikasi Akun Siswa yang sudah dibuat',
            ],
            [
                'id' => 5,
                'name' => 'Verifikasi Manual Siswa',
                'keterangan' => 'User dapat memverfikasi manual siswa yang dinyatakan lulus',
            ],
            [
                'id' => 6,
                'name' => 'Verifikasi Daftar Ulang',
                'keterangan' => 'User dapat memverfikasi daftar ulang siswa yang dinyatakan lulus',
            ],
            [
                'id' => 7,
                'name' => 'Verifikasi Operator',
                'keterangan' => 'User dapat memverfikasi operator sekolah yang dibuat',
            ],
            [
                'id' => 8,
                'name' => 'Membuat Tahap & Jadwal',
                'keterangan' => 'User dapat membuat tahap dan Jadwal PPDB',
            ],
            [
                'id' => 9,
                'name' => 'Membuat Role & Permission',
                'keterangan' => 'User dapat membuat  Role & Permission',
            ],
            [
                'id' => 10,
                'name' => 'Mengedit Role & Permission',
                'keterangan' => 'User dapat mengedit  Role & Permission',
            ],
        ];

        return response()->json($permissions);
    }
}
