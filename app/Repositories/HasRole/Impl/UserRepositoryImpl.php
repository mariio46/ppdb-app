<?php

namespace App\Repositories\HasRole\Impl;

use App\Models\HasRole\User;
use App\Repositories\HasRole\UserRepository;
use Illuminate\Http\Request;

class UserRepositoryImpl implements UserRepository
{
    public function __construct(protected User $user)
    {
        //
    }

    public function index(string $role_name): array
    {
        return $this->user->getUsers(role_name: $role_name);
    }

    public function show(string $user_id): array
    {
        return $this->user->getSingleUser(user_id: $user_id);
    }

    public function update(Request $request): array
    {
        return [];
    }

    public function store(Request $request): array
    {
        return $this->user->createUser($request);
    }

    public function destroy(string $user_id): array
    {
        return $this->user->deleteUser(user_id: $user_id);
    }
}
