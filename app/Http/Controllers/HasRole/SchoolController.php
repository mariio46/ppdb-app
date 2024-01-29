<?php

namespace App\Http\Controllers\HasRole;

use App\Http\Controllers\Controller;
use App\Repositories\HasRole\SchoolRepository as School;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SchoolController extends Controller
{
    public function __construct(protected School $school)
    {
        //
    }

    public function index(): View
    {
        return view('has-role.school.index');
    }

    public function create(): View
    {
        return view('has-role.school.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $cabdin_id = session()->get('cabdin_id');
        if ($cabdin_id != null && $cabdin_id != '0' && $cabdin_id != 0) {
            $response = $this->school->store(request: $request, cabdin_id: $cabdin_id);

            return $this->repositoryResponseWithPostMethod(response: $response, route: 'sekolah.index');
        } else {
            return back()->with([
                'stat' => 'error',
                'msg' => 'Anda bukan Admin Cabang Dinas!',
            ]);
        }
    }

    public function show($id, $unit): View
    {
        return view('has-role.school.detail', [
            'id' => $id,
            'unit' => $unit,
        ]);
    }

    public function edit(string $id): View
    {
        return view('has-role.school.edit', compact('id'));
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $cabdin_id = session()->get('cabdin_id');
        if ($cabdin_id != null && $cabdin_id != '0' && $cabdin_id != 0) {
            $response = $this->school->update(request: $request, user_id: $id, cabdin_id: $cabdin_id);

            return $this->repositoryResponseWithPostMethod(response: $response, route: 'sekolah.edit', params: $id);
        } else {
            return back()->with([
                'stat' => 'error',
                'msg' => 'Anda bukan Admin Cabang Dinas!',
            ]);
        }
    }

    // --------------------------------------------------DATA JSON--------------------------------------------------

    protected function units(): JsonResponse
    {
        $units = [
            [
                'label' => 'SMA',
                'value' => 'sma',
            ],
            [
                'label' => 'SMK',
                'value' => 'smk',
            ],
            [
                'label' => 'SMA Boarding',
                'value' => 'fbs',
            ],
            [
                'label' => 'SMA Half Boarding',
                'value' => 'hbs',
            ],
        ];

        return response()->json($units);
    }

    // --------------------------------------------------DATA API JSON--------------------------------------------------

    protected function schools(): JsonResponse
    {
        $schools = $this->school->index();

        return response()->json($schools);
    }

    protected function school(string $school_id): JsonResponse
    {
        $school = $this->school->show(school_id: $school_id)['data'];

        return response()->json($school);
    }
}
