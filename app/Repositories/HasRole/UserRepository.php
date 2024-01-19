<?php

namespace App\Repositories\HasRole;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;

interface UserRepository
{
    public function index(string $role_name): array;

    public function show(string $user_id): array;

    public function update(Request $request, string $user_id): array;

    public function store(Request $request): array;

    public function destroy(string $user_id): array;

    // -------------------------FORM DATA-------------------------

    public function regions(): Collection;

    public function schools(): Collection;

    public function originSchools(): Collection;

    public function roles(): Collection;
}
