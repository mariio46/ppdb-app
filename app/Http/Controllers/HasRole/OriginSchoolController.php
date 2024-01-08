<?php

namespace App\Http\Controllers\HasRole;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
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

    public function store(Request $request): RedirectResponse
    {
        if ($request->npsn == '12345678') {
            return to_route('sekolah-asal.index')->with(['stat' => 'success', 'msg' => 'Berhasil menambahkan data.']);
        } else {
            return redirect()->back()->withInput()->with(['stat' => 'danger', 'msg' => 'Gagal menambahkan data. Coba lagi nanti.']);
        }
    }

    public function show($id): View
    {
        return view('has-role.origin-school.show', [
            'id' => $id,
        ]);
    }

    public function edit($id): View
    {
        return view('has-role.origin-school.edit', [
            'id' => $id,
        ]);
    }

    public function update(string $id): RedirectResponse
    {
        $update = [
            'statusCode' => 200,
            'messages' => 'Berhasil memperbarui data.',
            // 'messages' => 'Gagal memperbarui data. Coba lagi nanti.',
        ];

        if ($update['statusCode'] == 200) {
            return to_route('sekolah-asal.show', [$id])->with(['stat' => 'success', 'msg' => $update['messages']]);
        } else {
            return redirect()->back()->withInput()->with(['stat' => 'danger', 'msg' => $update['messages']]);
        }
    }

    public function delete(string $id): RedirectResponse
    {
        $del = [
            'statusCode' => 200,
            'messages' => 'Berhasil menghapus data.',
            // 'messages' => 'Gagal menghapus data. Coba lagi nanti.',
        ];

        if ($del['statusCode'] == 200) {
            return to_route('sekolah-asal.index')->with(['stat' => 'success', 'msg' => $del['messages']]);
        } else {
            return redirect()->back()->withInput()->with(['stat' => 'danger', 'msg' => $del['messages']]);
        }
    }

    protected function getSingleSchool($id): JsonResponse
    {
        $school = collect($this->getSchools()->original)->firstWhere('id', $id);

        return response()->json($school);
    }

    protected function getSchools(): JsonResponse
    {
        $data = collect([
            (object) [
                'id' => '834bc3f9-b187-4fcc-a22a-8c7daaf7a310',
                'name' => 'SMPN 1 Makassar',
                'npsn' => 40311914,
                'unit' => 'SMP',
                'address' => 'Jl.Daeng Siraju No.58',
            ],
            (object) [
                'id' => '7bad2d1b-03d8-40a7-96fb-ac07feae48a0',
                'name' => 'SMPN 20 Maros',
                'npsn' => 4342314,
                'unit' => 'SMP',
                'address' => 'Jl. Poros Rappang Parepare',
            ],
            (object) [
                'id' => 'cb2a0f5f-a7ae-4b5b-b35d-dcbd6c0bf57f',
                'name' => 'SMPN 3 Enrekang',
                'npsn' => 6545346,
                'unit' => 'SMP',
                'address' => 'Jl. Jenderal Sudirman No. 70',
            ],
            (object) [
                'id' => '4b7e5d1d-08a6-4049-8aa5-6d5f17ebe65a',
                'name' => 'SMPN 2 Parepare',
                'npsn' => 8767566,
                'unit' => 'SMP',
                'address' => 'Jl. Pesantren No. 10',
            ],
            (object) [
                'id' => 'f7443328-e01c-4862-aa71-e34d4f1cca4a',
                'name' => 'SMPN 1 Parepare',
                'npsn' => 7567563,
                'unit' => 'SMP',
                'address' => 'Jl. Karaeng Burane No. 18',
            ],
            (object) [
                'id' => '7264743a-aceb-4029-8ab3-89cb1ba69ff9',
                'name' => 'SMPN 12 Parepare',
                'npsn' => 4232456,
                'unit' => 'SMP',
                'address' => 'Jl. Bau Massepe No. 24',
            ],
            (object) [
                'id' => '7264743a-aceb-4029-8ab3-89cb1ba69ff9',
                'name' => 'SMPN 5 Gowa',
                'npsn' => 9673521,
                'unit' => 'SMP',
                'address' => 'Industri Kecil No 99',
            ],
            (object) [
                'id' => '8777ab02-b3f4-48e6-96ed-75116d1fe3de',
                'name' => 'SMPN 8 Parepare',
                'npsn' => 5378654,
                'unit' => 'SMP',
                'address' => 'Jl. Muhammadiyah No. 8',
            ],
        ]);

        return response()->json($data);
    }

    public function getOriginSchoolList(): JsonResponse
    {
        $data = collect([
            (object) [
                'id' => '834bc3f9-b187-4fcc-a22a-8c7daaf7a310',
                'name' => 'SMPN 1 Makassar',
                'npsn' => 40311914,
                'unit' => 'SMP',
                'address' => 'Jl.Daeng Siraju No.58',
            ],
            (object) [
                'id' => '7bad2d1b-03d8-40a7-96fb-ac07feae48a0',
                'name' => 'SMPN 20 Maros',
                'npsn' => 4342314,
                'unit' => 'SMP',
                'address' => 'Jl. Poros Rappang Parepare',
            ],
            (object) [
                'id' => 'cb2a0f5f-a7ae-4b5b-b35d-dcbd6c0bf57f',
                'name' => 'SMPN 3 Enrekang',
                'npsn' => 6545346,
                'unit' => 'SMP',
                'address' => 'Jl. Jenderal Sudirman No. 70',
            ],
            (object) [
                'id' => '4b7e5d1d-08a6-4049-8aa5-6d5f17ebe65a',
                'name' => 'SMPN 2 Parepare',
                'npsn' => 8767566,
                'unit' => 'SMP',
                'address' => 'Jl. Pesantren No. 10',
            ],
            (object) [
                'id' => 'f7443328-e01c-4862-aa71-e34d4f1cca4a',
                'name' => 'SMPN 1 Parepare',
                'npsn' => 7567563,
                'unit' => 'SMP',
                'address' => 'Jl. Karaeng Burane No. 18',
            ],
            (object) [
                'id' => '7264743a-aceb-4029-8ab3-89cb1ba69ff9',
                'name' => 'SMPN 12 Parepare',
                'npsn' => 4232456,
                'unit' => 'SMP',
                'address' => 'Jl. Bau Massepe No. 24',
            ],
            (object) [
                'id' => '7264743a-aceb-4029-8ab3-89cb1ba69ff9',
                'name' => 'SMPN 5 Gowa',
                'npsn' => 9673521,
                'unit' => 'SMP',
                'address' => 'Industri Kecil No 99',
            ],
            (object) [
                'id' => '8777ab02-b3f4-48e6-96ed-75116d1fe3de',
                'name' => 'SMPN 8 Parepare',
                'npsn' => 5378654,
                'unit' => 'SMP',
                'address' => 'Jl. Muhammadiyah No. 8',
            ],
        ]);

        return response()->json($data);
    }
}
