<?php

namespace App\Http\Controllers\HasRole\Superadmin;

use App\Http\Controllers\Controller;
use App\Repositories\HasRole\SuperAdmin\RoleRepository as Role;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RoleController extends Controller
{
    public function __construct(protected Role $role)
    {
        //
    }

    public function index(): View
    {
        return view('has-role.superadmin.roles.index');
    }

    public function create(): View
    {
        return view('has-role.superadmin.roles.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $response = $this->role->store(request: $request);
        if ($response['statusCode'] == 201) {
            return to_route('roles.index')->with([
                'stat' => 'success',
                'msg' => $response['messages'],
            ]);
        } else {
            return to_route('roles.index')->with([
                'stat' => 'error',
                'msg' => $response['messages'],
            ]);
        }
    }

    public function edit(string $id): View
    {
        return view('has-role.superadmin.roles.edit', compact('id'));
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $response = $this->role->update(request: $request);
        if ($response['statusCode'] == 200) {
            return to_route('roles.index')->with([
                'stat' => 'success',
                'msg' => $response['messages'],
            ]);
        } else {
            return to_route('roles.index')->with([
                'stat' => 'error',
                'msg' => $response['messages'],
            ]);
        }
    }

    // --------------------------------------------------DATA API JSON--------------------------------------------------
    protected function roles(): JsonResponse
    {
        $roles = $this->role->index()['data'];

        return response()->json($roles);
    }

    protected function role(string $role_id): JsonResponse
    {
        $role = $this->role->show(role_id: $role_id);

        return response()->json($role['data']);
    }
}
