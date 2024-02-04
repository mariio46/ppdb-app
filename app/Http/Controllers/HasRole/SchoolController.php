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

        if ($cabdin_id == null) {
            return back()->with(['stat' => 'error', 'msg' => 'Anda bukan Admin Cabang Dinas!']);
        }

        $response = $this->school->store(request: $request, cabdin_id: $cabdin_id);

        return $this->repositoryResponseWithPostMethod(response: $response, route: 'sekolah.index');
    }

    public function show(Request $request, string $id, string $unit): View
    {
        return view('has-role.school.detail', [
            'id' => $id,
            'unit' => $unit,
        ]);
    }

    public function edit(string $id, string $unit): View
    {
        return view('has-role.school.edit', [
            'id' => $id,
            'unit' => $unit,
        ]);
    }

    public function update(Request $request, string $id, string $unit): RedirectResponse
    {
        $cabdin_id = session()->get('cabdin_id');

        if ($cabdin_id == null) {
            return back()->with(['stat' => 'error', 'msg' => 'Anda bukan Admin Cabang Dinas!']);
        }

        $response = $this->school->update(request: $request, school_id: $id, cabdin_id: $cabdin_id);

        return $this->repositoryResponseWithPostMethod(response: $response, route: 'sekolah.edit', params: ['id' => $id, 'unit' => $unit]);
    }

    public function destroy(string $school_id): RedirectResponse
    {
        $response = $this->school->destroy(school_id: $school_id);

        return $this->repositoryResponseWithPostMethod(response: $response, route: 'sekolah.index');
    }

    public function quota(string $id, string $unit): View
    {
        return view($unit == 'smk' ? 'has-role.school.quota.smk' : 'has-role.school.quota.sma', [
            'id' => $id,
            'unit' => $unit,
        ]);
    }

    public function document(string $id, string $unit): View
    {
        return view('has-role.school.document', [
            'id' => $id,
            'unit' => $unit,
        ]);
    }

    public function coordinate(string $id, string $unit): View
    {
        return view('has-role.school.coordinate', [
            'id' => $id,
            'unit' => $unit,
        ]);
    }

    public function zone(string $id, string $unit): View|RedirectResponse
    {
        if ($unit == 'smk' || $unit == 'fbs') {
            $newUnit = $unit == 'smk' ? 'SMK' : 'Full Boading School';

            return to_route('dashboard')->with([
                'stat' => 'error',
                'msg' => "{$newUnit} tidak memiliki wilayah zonasi",
            ]);
        }

        return view('has-role.school.zone', [
            'id' => $id,
            'unit' => $unit,
        ]);
    }

    public function verify(Request $request, string $id, string $unit): RedirectResponse
    {
        $verify = $this->school->verify(school_id: $id, cabdin_id: $request->attributes->get('cabdin_id'));

        return $this->repositoryResponseWithPostMethod(response: $verify, route: 'sekolah.detail', params: ['id' => $id, 'unit' => $unit]);
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

    protected function quotas(string $unit, string $id): JsonResponse
    {
        $quotas = $this->school->quotas(school_unit: $unit, school_id: $id);

        return response()->json($quotas);
    }

    protected function zones(string $id): JsonResponse
    {
        $zones = $this->school->zones(school_id: $id);

        return response()->json($zones);
    }

    // -----------------------------------------------DATA API JSON FORM DATA-----------------------------------------------

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
}
