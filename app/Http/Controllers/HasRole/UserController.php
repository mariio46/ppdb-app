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

        return $this->repositoryResponseWithPostMethod(response: $response, route: 'users.index');
    }

    public function show(string $id): View
    {
        return view('has-role.users.show', compact('id'));
    }

    public function update(Request $request, string $id)
    {
        // A.02.003
        $response = $this->user->update(request: $request, user_id: $id);

        return $this->repositoryResponseWithPostMethod(response: $response, route: 'users.index');
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

        return $this->repositoryResponseWithPostMethod(response: $response, route: 'users.index');
    }

    // --------------------------------------------------DATA JSON API--------------------------------------------------
    protected function users(): JsonResponse
    {
        // A.02.001
        $role_name = session()->get('roles.name');
        $users = $this->user->index(role_name: $role_name);

        return response()->json($users['data']);
    }

    public function user(string $id): JsonResponse
    {
        // A.02.002
        $user = $this->user->show(user_id: $id);

        return response()->json($user['data']);
    }

    // --------------------------------------------------DATA JSON API FORM DATA--------------------------------------------------
    protected function regions(): JsonResponse
    {
        return response()->json($this->user->regions());
    }

    protected function schools(): JsonResponse
    {
        return response()->json($this->user->schools());
    }

    public function originSchools(): JsonResponse
    {
        return response()->json($this->user->originSchools());
    }

    protected function roles(): JsonResponse
    {
        return response()->json($this->user->roles());
    }
}
