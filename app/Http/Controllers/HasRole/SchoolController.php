<?php

namespace App\Http\Controllers\HasRole;

use App\Http\Controllers\Controller;
use App\Repositories\HasRole\SchoolRepository as School;
use App\Repositories\HasRole\UserRepository as User;
use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SchoolController extends Controller
{
    protected int $roleId;

    protected string $roleName;

    public function __construct(protected School $school, protected User $user)
    {
        $this->middleware('HasRole.isSchoolHasLock')->except(['index', 'schools', 'create', 'units']);
        $this->middleware(function (Request $request, Closure $next) {
            $this->roleId = session()->get('role_id');
            $this->roleName = session()->get('roles.name');

            return $next($request);
        });
        $this->middleware('HasRole.verifySchool')->only('verify');
    }

    public function index(): View
    {
        return view('has-role.school.index');
    }

    public function create(): View
    {
        return view('has-role.school.create', [
            'roleId' => $this->roleId,
            'roleName' => $this->roleName,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $cabdin_id = session()->get('cabdin_id');

        if ($cabdin_id == null && ! $request->has('user')) {
            return back()->with(['stat' => 'error', 'msg' => 'Anda bukan Admin Cabang Dinas!']);
        }

        $response = $this->school->store(request: $request, cabdin_id: $cabdin_id ?? $request->user);

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
            'roleId' => $this->roleId,
            'roleName' => $this->roleName,
        ]);
    }

    public function update(Request $request, string $id, string $unit): RedirectResponse
    {
        $cabdin_id = session()->get('cabdin_id');

        if ($cabdin_id == null && ! $request->has('user')) {
            return back()->with(['stat' => 'error', 'msg' => 'Anda bukan Admin Cabang Dinas!']);
        }

        $response = $this->school->update(request: $request, user_id: $id, cabdin_id: $cabdin_id ?? $request->user);

        return $this->repositoryResponseWithPostMethod(response: $response, route: 'sekolah.edit', params: ['id' => $id, 'unit' => $unit]);
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

    public function usersWithRoleAdminCabangDinas(): JsonResponse
    {
        if ($this->roleId != 1) {
            return response()->json([]);
        }

        $response = $this->user->index(role_name: $this->roleName);

        if ($response['status'] != 'success' || $response['statusCode'] != 200) {
            return response()->json([]);
        }

        $collections = collect($response['data'])->where('role_id', 3)->map(fn ($user) => [
            'value' => $user['id'],
            'label' => $user['nama'],
        ])->values();

        return response()->json($collections);
    }
}
