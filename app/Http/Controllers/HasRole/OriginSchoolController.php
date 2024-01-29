<?php

namespace App\Http\Controllers\HasRole;

use App\Http\Controllers\Controller;
use App\Models\HasRole\OriginSchool;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OriginSchoolController extends Controller
{
    public function __construct(protected OriginSchool $originschool)
    {
    }

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

    public function store(Request $request): RedirectResponse // A.03.003
    {
        $save = $this->originschool->store($request);

        if ($save['statusCode'] == 201) {
            return to_route('sekolah-asal.index')->with(['stat' => 'success', 'msg' => $save['messages']]);
        }

        return redirect()->back()->withInput()->with(['stat' => 'error', 'msg' => $save['messages'] ?? 'Data gagal ditambahkan.']);
    }

    public function update(Request $request): RedirectResponse
    {
        $save = $this->originschool->update($request);

        if ($save['statusCode'] == 200) {
            return to_route('sekolah-asal.show', $request->id)->with(['stat' => 'success', 'msg' => $save['messages']]);
        }

        return redirect()->back()->withInput()->with(['stat' => 'danger', 'msg' => $save['messages'] ?? 'Data gagal diubah.']);
    }

    public function delete(Request $request): RedirectResponse
    {
        $delete = [
            'statusCode' => 200,
            'messages' => 'Berhasil menghapus data.',
        ];

        if ($delete['statusCode'] == 200) {
            return to_route('sekolah-asal.index')->with(['stat' => 'success', 'msg' => $delete['messages']]);
        }

        return redirect()->back()->withInput()->with(['stat' => 'danger', 'msg' => $delete['messages'] ?? 'Data gagal dihapus.']);
    }

    protected function getSingleSchool(string $id): JsonResponse // A.03.002
    {
        // $school = collect($this->getSchools()->original)->firstWhere('id', $id);

        $school = $this->originschool->getSingleById($id);

        return response()->json($school);
    }

    protected function getSchools(): JsonResponse // A.03.001
    {
        $data = $this->originschool->getAll();

        return response()->json($data);
    }
}
