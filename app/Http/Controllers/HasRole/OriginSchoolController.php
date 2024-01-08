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

    public function store(Request $request): RedirectResponse
    {
        $save = [
            'statusCode' => 201,
            'messages' => "Lorem ipsum dolor sit amet."
        ];

        if ($save['statusCode'] == 201) {
            return to_route('sekolah-asal.index')->with(['stat' => 'success', 'msg' => $save['messages']]);
        }

        return redirect()->back()->withInput()->with(['stat' => 'danger', 'msg' => $save['messages'] ?? 'Data gagal ditambahkan.']);
    }

    public function update(Request $request): RedirectResponse
    {
        $save = [
            'statusCode' => 200,
            'messages' => "Berhasil menyimpan perubahan data."
        ];

        if ($save['statusCode'] == 200) {
            return to_route('sekolah-asal.show', $request->id)->with(['stat' => 'success', 'msg' => $save['messages']]);
        }

        return redirect()->back()->withInput()->with(['stat' => 'danger', 'msg' => $save['messages'] ?? 'Data gagal diubah.']);
    }

    public function delete(Request $request): RedirectResponse
    {
        $delete = [
            'statusCode' => 200,
            'messages' => "Berhasil menghapus data."
        ];

        if ($delete['statusCode'] == 200) {
            return to_route('sekolah-asal.index')->with(['stat' => 'success', 'msg' => $delete['messages']]);
        }

        return redirect()->back()->withInput()->with(['stat' => 'danger', 'msg' => $delete['messages'] ?? 'Data gagal dihapus.']);
    }

    protected function getSingleSchool(string $id): JsonResponse
    {
        $school = collect($this->getSchools()->original)->firstWhere('id', $id);
        return response()->json($school);
    }

    protected function getSchools(): JsonResponse
    {
        $data = collect([
            (object) [
                'id' => "deda147d-c1eb-4326-b181-9477eca7bcf9",
                'name' => 'SMPN 1 Makassar',
                'npsn' => 40311914,
                'unit' => 'SMP',
                'address' => 'Jl.Daeng Siraju No.58',
            ],
            (object) [
                'id' => "6ad9b8de-6087-457c-8fe7-19bd8542deb6",
                'name' => 'SMPN 20 Maros',
                'npsn' => 4342314,
                'unit' => 'SMP',
                'address' => 'Jl. Poros Rappang Parepare',
            ],
            (object) [
                'id' => "3491c8bf-2e94-4c46-87ca-34b57effdcb5",
                'name' => 'SMPN 3 Enrekang',
                'npsn' => 6545346,
                'unit' => 'SMP',
                'address' => 'Jl. Jenderal Sudirman No. 70',
            ],
            (object) [
                'id' => "5b803c2f-13ad-48ff-ad0f-b86a0a566afa",
                'name' => 'SMPN 2 Parepare',
                'npsn' => 8767566,
                'unit' => 'SMP',
                'address' => 'Jl. Pesantren No. 10',
            ],
            (object) [
                'id' => "a969c612-df24-4f8b-be04-f07e4ea91dc2",
                'name' => 'SMPN 1 Parepare',
                'npsn' => 7567563,
                'unit' => 'SMP',
                'address' => 'Jl. Karaeng Burane No. 18',
            ],
            (object) [
                'id' => "f618654a-bfcb-42b5-9cb3-1c2a0caa9d4a",
                'name' => 'SMPN 12 Parepare',
                'npsn' => 4232456,
                'unit' => 'SMP',
                'address' => 'Jl. Bau Massepe No. 24',
            ],
            (object) [
                'id' => "8db60494-f9b5-4384-ad97-5f8a8a78f767",
                'name' => 'SMPN 5 Gowa',
                'npsn' => 9673521,
                'unit' => 'SMP',
                'address' => 'Industri Kecil No 99',
            ],
            (object) [
                'id' => "3d4bf164-0c99-4fe9-aca3-63b7fb8c5806",
                'name' => 'SMPN 8 Parepare',
                'npsn' => 5378654,
                'unit' => 'SMP',
                'address' => 'Jl. Muhammadiyah No. 8',
            ],
        ]);

        return response()->json($data);
    }
}
