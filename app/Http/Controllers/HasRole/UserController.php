<?php

namespace App\Http\Controllers\HasRole;

use App\Http\Controllers\Controller;
use App\Repositories\HasRole\UserRepository as User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    public function __construct(protected User $user)
    {
        //
    }

    public function index(): View
    {
        return view('has-role.users.index');
    }

    public function create(): View
    {
        return view('has-role.users.create');
    }

    public function store(Request $request): RedirectResponse
    {
        // A.02.003
        $response = $this->user->store($request);
        if ($response['statusCode'] == 201) {
            return back()->with([
                'stat' => 'success',
                'msg' => $response['messages'],
            ]);
        } else {
            return back()->with([
                'stat' => 'danger',
                'msg' => $response['messages'],
            ]);
        }
    }

    public function show(string $id): View
    {
        return view('has-role.users.show', compact('id'));
    }

    public function update(string $id): RedirectResponse
    {
        return back()->withwith([
            'stat' => 'success',
            'msg' => 'Berhasil',
        ]);
    }

    public function forgotPassword($id): View
    {
        return view('has-role.users.forgot-password', [
            'user' => $this->getSingleUser($id),
        ]);
    }

    public function destroy(string $id): RedirectResponse
    {
        // A.02.005
        $response = $this->user->destroy(user_id: $id);

        if ($response['statusCode'] == 200) {
            return to_route('users.index')->with([
                'stat' => 'success',
                'msg' => $response['messages'],
            ]);
        } else {
            return to_route('users.index')->with([
                'stat' => 'danger',
                'msg' => $response['messages'],
            ]);
        }
    }

    // --------------------------------------------------DATA JSON API--------------------------------------------------
    protected function users(): JsonResponse
    {
        $role_name = session()->get('roles.name');
        $users = $this->user->index(role_name: $role_name);

        return response()->json($users['data']);
    }

    public function user(string $id): JsonResponse
    {
        // $user_id = session()->get('id');
        $user = $this->user->show(user_id: $id);

        return response()->json($user['data']);
    }

    // --------------------------------------------------DATA JSON--------------------------------------------------
    protected function singleUser(string $username): JsonResponse
    {
        $user = [
            'id' => 1,
            'name' => 'Ryan Rafli',
            'username' => 'ryan58468',
            'role' => '3',
            'cabdin_id' => '12',
            'sekolah_id' => null,
            'sekolah_asal_id' => null,
            'unique_id' => 159174,
            'status' => 1,
        ];

        return response()->json($user);
    }

    protected function usersCollections(): JsonResponse
    {
        $users = [
            [
                'id' => 1,
                'name' => 'Ryan Rafli',
                'username' => 'ryan58468',
                'role' => 'Super Admin',
                'unique_id' => 159174,
                'status' => 1,
            ],
            [
                'id' => 2,
                'name' => 'Rafie Muis',
                'username' => 'rafie24937',
                'role' => 'Admin',
                'unique_id' => 282365,
                'status' => 2,
            ],
            [
                'id' => 3,
                'name' => 'Muhammad Al Muqtadir',
                'username' => 'tadir14440',
                'role' => 'Operator',
                'unique_id' => 173512,
                'status' => 2,
            ],
            [
                'id' => 4,
                'name' => 'Muhammad Raiz',
                'username' => 'raiz91130',
                'role' => 'admin cabang dinas',
                'unique_id' => 685894,
                'status' => 2,
            ],
            [
                'id' => 5,
                'name' => 'Edy Siswanto Syarif',
                'username' => 'edy49082',
                'role' => 'admin sekolah',
                'unique_id' => 976376,
                'status' => 1,
            ],
            [
                'id' => 6,
                'name' => 'Mario Arya Dimus',
                'username' => 'mario27145',
                'role' => 'operator sekolah',
                'unique_id' => 192545,
                'status' => 2,
            ],
            [
                'id' => 7,
                'name' => 'Mawardi',
                'username' => 'mawar71473',
                'role' => 'operator sekolah',
                'unique_id' => 188937,
                'status' => 1,
            ],
            [
                'id' => 8,
                'name' => 'egi',
                'username' => 'egi88081',
                'role' => 'operator sekolah',
                'unique_id' => 105978,
                'status' => 2,
            ],
            [
                'id' => 9,
                'name' => 'Walda',
                'username' => 'walda10531',
                'role' => 'operator sekolah',
                'unique_id' => 501416,
                'status' => 2,
            ],
            [
                'id' => 10,
                'name' => 'asdar',
                'username' => 'asdar72817',
                'role' => 'operator sekolah',
                'unique_id' => 971190,
                'status' => 1,
            ],
            [
                'id' => 11,
                'name' => 'Fitra',
                'username' => 'fitra28203',
                'role' => 'operator sekolah',
                'unique_id' => 361378,
                'status' => 1,
            ],
            [
                'id' => 12,
                'name' => 'Anggi',
                'username' => 'anggi79002',
                'role' => 'operator sekolah',
                'unique_id' => 542345,
                'status' => 2,
            ],
            [
                'id' => 13,
                'name' => 'Miftah',
                'username' => 'miftah26873',
                'role' => 'operator sekolah',
                'unique_id' => 451753,
                'status' => 2,
            ],
            [
                'id' => 14,
                'name' => 'Reni',
                'username' => 'reni36508',
                'role' => 'operator sekolah',
                'unique_id' => 249314,
                'status' => 2,
            ],
            [
                'id' => 15,
                'name' => 'Arsal',
                'username' => 'accang12370',
                'role' => 'operator sekolah',
                'unique_id' => 610132,
                'status' => 1,
            ],
        ];

        return response()->json($users);
    }

    // --------------------------------------------------FORM DATA JSON--------------------------------------------------
    protected function rolesCollections(): JsonResponse
    {
        $user = session()->get('role_id');

        $roles = [
            [
                'id' => 1,
                'name' => 'Super Admin',
            ],
            [
                'id' => 2,
                'name' => 'Admin Provinsi',
            ],
            [
                'id' => 3,
                'name' => 'Admin Cabang Dinas',
            ],
            [
                'id' => 4,
                'name' => 'Admin Sekolah',
            ],
            [
                'id' => 5,
                'name' => 'Admin Sekolah Asal',
            ],
        ];

        if ($user === 3) {
            $roles = array_filter($roles, function ($role) {
                return $role['id'] !== 1 && $role['id'] !== 2 && $role['id'] !== 3;
            });
        }

        return response()->json(array_values($roles));
    }

    protected function regionsCollections(): JsonResponse
    {
        $regions = [
            [
                'id' => 1,
                'name' => 'Wilayah I',
            ],
            [
                'id' => 2,
                'name' => 'Wilayah II',
            ],
            [
                'id' => 3,
                'name' => 'Wilayah III',
            ],
            [
                'id' => 4,
                'name' => 'Wilayah IV',
            ],
            [
                'id' => 5,
                'name' => 'Wilayah V',
            ],
            [
                'id' => 6,
                'name' => 'Wilayah VI',
            ],
            [
                'id' => 7,
                'name' => 'Wilayah VII',
            ],
            [
                'id' => 8,
                'name' => 'Wilayah VIII',
            ],
            [
                'id' => 9,
                'name' => 'Wilayah IX',
            ],
            [
                'id' => 10,
                'name' => 'Wilayah X',
            ],
            [
                'id' => 11,
                'name' => 'Wilayah XI',
            ],
            [
                'id' => 12,
                'name' => 'Wilayah XII',
            ],
        ];

        return response()->json($regions);
    }

    protected function schoolsCollections(): JsonResponse
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
                'name' => 'SMKN 1 Parepare',
                'npsn' => 7567563,
                'unit' => 'SMA',
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

    protected function originSchoolsCollections(): JsonResponse
    {
        $origin_schools = [
            [
                'id' => 1,
                'name' => 'SMPN 1 Makassar',
                'npsn' => 40311914,
                'unit' => 'SMP',
                'address' => 'Jl.Daeng Siraju No.58',
            ],
            [
                'id' => 2,
                'name' => 'SMPN 20 Maros',
                'npsn' => 4342314,
                'unit' => 'SMP',
                'address' => 'Jl. Poros Rappang Parepare',
            ],
            [
                'id' => 3,
                'name' => 'SMPN 3 Enrekang',
                'npsn' => 6545346,
                'unit' => 'SMP',
                'address' => 'Jl. Jenderal Sudirman No. 70',
            ],
            [
                'id' => 4,
                'name' => 'SMPN 2 Parepare',
                'npsn' => 8767566,
                'unit' => 'SMP',
                'address' => 'Jl. Pesantren No. 10',
            ],
            [
                'id' => 5,
                'name' => 'SMPN 1 Parepare',
                'npsn' => 7567563,
                'unit' => 'SMP',
                'address' => 'Jl. Karaeng Burane No. 18',
            ],
            [
                'id' => 6,
                'name' => 'SMPN 12 Parepare',
                'npsn' => 4232456,
                'unit' => 'SMP',
                'address' => 'Jl. Bau Massepe No. 24',
            ],
            [
                'id' => 6,
                'name' => 'SMPN 5 Gowa',
                'npsn' => 9673521,
                'unit' => 'SMP',
                'address' => 'Industri Kecil No 99',
            ],
            [
                'id' => 7,
                'name' => 'SMPN 8 Parepare',
                'npsn' => 5378654,
                'unit' => 'SMP',
                'address' => 'Jl. Muhammadiyah No. 8',
            ],
        ];

        return response()->json($origin_schools);
    }
}
