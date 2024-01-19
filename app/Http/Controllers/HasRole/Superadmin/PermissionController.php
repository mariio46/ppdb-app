<?php

namespace App\Http\Controllers\HasRole\Superadmin;

use App\Http\Controllers\Controller;
use App\Repositories\HasRole\SuperAdmin\PermissionRepository as Permission;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PermissionController extends Controller
{
    public function __construct(protected Permission $permission)
    {
        //
    }

    public function index(): View
    {
        return view('has-role.superadmin.permissions.index');
    }

    public function create(): View
    {
        return view('has-role.superadmin.permissions.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $response = $this->permission->store(request: $request);
        if ($response['statusCode'] == 201) {
            return to_route('permissions.index')->with([
                'stat' => 'success',
                'msg' => $response['messages'],
            ]);
        } else {
            return to_route('permissions.index')->with([
                'stat' => 'error',
                'msg' => $response['messages'],
            ]);
        }
    }

    public function edit(string $id): View
    {
        return view('has-role.superadmin.permissions.edit', compact('id'));
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $response = $this->permission->update(request: $request, permission_id: $id);

        if ($response['statusCode'] == 200) {
            return to_route('permissions.index')->with([
                'stat' => 'success',
                'msg' => $response['messages'],
            ]);
        } else {
            return to_route('permissions.index')->with([
                'stat' => 'error',
                'msg' => $response['messages'],
            ]);
        }
    }

    public function delete(string $id): RedirectResponse
    {
        $response = $this->permission->destroy(permission_id: $id);

        if ($response['statusCode'] == 200) {
            return to_route('permissions.index')->with([
                'stat' => 'success',
                'msg' => 'Permission berhasil dihapus.',
            ]);
        } else {
            return to_route('permissions.index')->with([
                'stat' => 'error',
                'msg' => $response['messages'],
            ]);
        }
    }

    // --------------------------------------------------DATA API JSON--------------------------------------------------

    protected function permissions(): JsonResponse
    {
        $response = $this->permission->index();

        return response()->json($response['data']);
    }

    protected function permission(string $permission_id): JsonResponse
    {
        $permission = $this->permission->show(permission_id: $permission_id);

        return response()->json($permission['data']);
    }
}
