<?php

namespace App\Http\Controllers\HasRole\Superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;
use Illuminate\View\View;

class RoleController extends Controller
{
    public function index(): View
    {
        return view('has-role.superadmin.roles.index', [
            'collections' => $this->rolesCollections(),
        ]);
    }

    public function create(): View
    {
        return view('has-role.superadmin.roles.create', [
            'permissions' => $this->permissions(),
            'permissionsChunk' => $this->permissions()->chunk(5),
            'permissionGroupNames' => $this->permissionGroupNames(),
        ]);
    }

    public function edit(string $identifier): View
    {
        return view('has-role.superadmin.roles.edit', [
            'role' => $this->singleRole($identifier),
            'permissions' => $this->permissions(),
            'selected_permissions' => $this->selectedRolePermissions($identifier),
        ]);
    }

    protected function singleRole(string $identifier): object
    {
        $roles = $this->rolesCollections()->where('identifier', $identifier);
        $data = json_decode($roles, true);
        foreach ($data as $key => $item) {
            $result = (object) $item;
        }

        return $result;
    }

    protected function rolesCollections(): Collection
    {
        $premissions_value = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20'];

        return collect([
            (object) [
                'id' => 1,
                'name' => $name = 'Super Admin',
                'identifier' => str(strtolower($name))->slug(),
                'user_count' => random_int(10, 99),
                'permissions' => $array_count = array_rand($premissions_value, rand(5, 20)),
                'count' => count($array_count),
            ],
            (object) [
                'id' => 2,
                'name' => $name = 'Admin Provinsi',
                'identifier' => str(strtolower($name))->slug(),
                'user_count' => random_int(10, 99),
                'permissions' => $array_count = array_rand($premissions_value, rand(5, 10)),
                'count' => count($array_count),
            ],
            (object) [
                'id' => 3,
                'name' => $name = 'Admin Cabang Dinas',
                'identifier' => str(strtolower($name))->slug(),
                'user_count' => random_int(10, 99),
                'permissions' => $array_count = array_rand($premissions_value, rand(5, 10)),
                'count' => count($array_count),
            ],
            (object) [
                'id' => 4,
                'name' => $name = 'Admin Sekolah Asal',
                'identifier' => str(strtolower($name))->slug(),
                'user_count' => random_int(10, 99),
                'permissions' => $array_count = array_rand($premissions_value, rand(5, 10)),
                'count' => count($array_count),
            ],
            (object) [
                'id' => 5,
                'name' => $name = 'Operator Cabang Dinas',
                'identifier' => str(strtolower($name))->slug(),
                'user_count' => random_int(10, 99),
                'permissions' => $array_count = array_rand($premissions_value, rand(5, 10)),
                'count' => count($array_count),
            ],
            (object) [
                'id' => 6,
                'name' => $name = 'Operator Sekolah Tujuan',
                'identifier' => str(strtolower($name))->slug(),
                'user_count' => random_int(10, 99),
                'permissions' => $array_count = array_rand($premissions_value, rand(5, 10)),
                'count' => count($array_count),
            ],
            (object) [
                'id' => 7,
                'name' => $name = 'Admin Sekolah Asal',
                'identifier' => str(strtolower($name))->slug(),
                'user_count' => random_int(10, 99),
                'permissions' => $array_count = array_rand($premissions_value, rand(5, 10)),
                'count' => count($array_count),
            ],
        ]);
    }

    protected function permissionGroupNames(): array
    {
        return [
            'Pemissions Group 1',
            'Pemissions Group 2',
            'Pemissions Group 3',
            'Pemissions Group 4',
        ];
    }

    public function selectedRolePermissions(string $identifier): array
    {
        $role = $this->singleRole($identifier);
        $new_array = array_map(fn ($index) => strval($index + 1), array_values($role->permissions));
        $json_encode = json_encode($new_array);
        $json_decode = json_decode($json_encode, true);

        return $json_decode;
    }

    protected function permissions(): Collection
    {
        return collect([
            (object) [
                'value' => '1',
                'label' => 'Permission 1',
            ],
            (object) [
                'value' => '2',
                'label' => 'Permission 2',
            ],
            (object) [
                'value' => '3',
                'label' => 'Permission 3',
            ],
            (object) [
                'value' => '4',
                'label' => 'Permission 4',
            ],
            (object) [
                'value' => '5',
                'label' => 'Permission 5',
            ],
            (object) [
                'value' => '6',
                'label' => 'Permission 6',
            ],
            (object) [
                'value' => '7',
                'label' => 'Permission 7',
            ],
            (object) [
                'value' => '8',
                'label' => 'Permission 8',
            ],
            (object) [
                'value' => '9',
                'label' => 'Permission 9',
            ],
            (object) [
                'value' => '10',
                'label' => 'Permission 10',
            ],
            (object) [
                'value' => '11',
                'label' => 'Permission 11',
            ],
            (object) [
                'value' => '12',
                'label' => 'Permission 12',
            ],
            (object) [
                'value' => '13',
                'label' => 'Permission 13',
            ],
            (object) [
                'value' => '14',
                'label' => 'Permission 14',
            ],
            (object) [
                'value' => '15',
                'label' => 'Permission 15',
            ],
            (object) [
                'value' => '16',
                'label' => 'Permission 16',
            ],
            (object) [
                'value' => '17',
                'label' => 'Permission 17',
            ],
            (object) [
                'value' => '18',
                'label' => 'Permission 18',
            ],
            (object) [
                'value' => '19',
                'label' => 'Permission 19',
            ],
            (object) [
                'value' => '20',
                'label' => 'Permission 20',
            ],
        ]);
    }
}
