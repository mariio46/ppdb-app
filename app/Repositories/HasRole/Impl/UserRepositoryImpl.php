<?php

namespace App\Repositories\HasRole\Impl;

use App\Models\HasRole\User;
use App\Repositories\HasRole\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

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

    public function update(Request $request, string $user_id): array
    {
        return $this->user->updateUser(request: $request, user_id: $user_id);
    }

    public function store(Request $request): array
    {
        return $this->user->createUser($request);
    }

    public function destroy(string $user_id): array
    {
        return $this->user->deleteUser(user_id: $user_id);
    }

    // -------------------------FORM DATA-------------------------

    public function regions(): Collection
    {
        return $this->user->getRegionsList();
    }

    public function schools(): Collection
    {
        return $this->user->getSchoolList();
    }

    public function originSchools(): Collection
    {
        return $this->user->getOriginSchoolsList();
    }

    public function roles(): Collection
    {
        return $this->user->getRolesList();
    }
}
