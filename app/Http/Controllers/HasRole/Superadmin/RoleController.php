<?php

namespace App\Http\Controllers\HasRole\Superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;

class RoleController extends Controller
{
    public function index(): View
    {
        return view('has-role.superadmin.roles.index');
    }

    public function create(): View
    {
        return view('has-role.superadmin.roles.create');
    }

    public function edit(int $id): View
    {
        return view('has-role.superadmin.roles.edit', compact('id'));
    }

    // --------------------------------------------------DATA JSON--------------------------------------------------

    protected function role(int $id): JsonResponse
    {
        $role = collect($this->roles()->original)->firstWhere('id', $id);

        return response()->json($role);
    }

    protected function roles(): JsonResponse
    {
        $roles = [
            [
                'id' => 1,
                'name' => 'Super Admin',
                'user_count' => 10,
                'permissions' => ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20'],
            ],
            [
                'id' => 2,
                'name' => 'Admin Provinsi',
                'user_count' => 20,
                'permissions' => ['6', '7', '8', '9', '10', '11', '12', '13', '14', '15'],
            ],
            [
                'id' => 3,
                'name' => 'Admin Cabang Dinas',
                'user_count' => 50,
                'permissions' => ['11', '12', '13', '14', '15', '16', '17', '18', '19', '20'],
            ],
            [
                'id' => 4,
                'name' => 'Admin Sekolah',
                'user_count' => 100,
                'permissions' => ['13', '14', '15', '16', '17', '18', '19', '20'],
            ],
            [
                'id' => 5,
                'name' => 'Admin Sekolah Asal',
                'user_count' => 150,
                'permissions' => ['17', '18', '19', '20'],
            ],
            [
                'id' => 6,
                'name' => 'Operator Sekolah',
                'user_count' => 200,
                'permissions' => ['18', '19', '20'],
            ],
        ];

        return response()->json($roles);
    }

    protected function permissions(): JsonResponse
    {
        $permissions = [
            [
                'value' => '1',
                'label' => 'Permission 1',
            ],
            [
                'value' => '2',
                'label' => 'Permission 2',
            ],
            [
                'value' => '3',
                'label' => 'Permission 3',
            ],
            [
                'value' => '4',
                'label' => 'Permission 4',
            ],
            [
                'value' => '5',
                'label' => 'Permission 5',
            ],
            [
                'value' => '6',
                'label' => 'Permission 6',
            ],
            [
                'value' => '7',
                'label' => 'Permission 7',
            ],
            [
                'value' => '8',
                'label' => 'Permission 8',
            ],
            [
                'value' => '9',
                'label' => 'Permission 9',
            ],
            [
                'value' => '10',
                'label' => 'Permission 10',
            ],
            [
                'value' => '11',
                'label' => 'Permission 11',
            ],
            [
                'value' => '12',
                'label' => 'Permission 12',
            ],
            [
                'value' => '13',
                'label' => 'Permission 13',
            ],
            [
                'value' => '14',
                'label' => 'Permission 14',
            ],
            [
                'value' => '15',
                'label' => 'Permission 15',
            ],
            [
                'value' => '16',
                'label' => 'Permission 16',
            ],
            [
                'value' => '17',
                'label' => 'Permission 17',
            ],
            [
                'value' => '18',
                'label' => 'Permission 18',
            ],
            [
                'value' => '19',
                'label' => 'Permission 19',
            ],
            [
                'value' => '20',
                'label' => 'Permission 20',
            ],
        ];

        return response()->json($permissions);
    }
}
