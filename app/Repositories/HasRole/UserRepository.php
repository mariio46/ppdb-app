<?php

namespace App\Repositories\HasRole;

use Illuminate\Http\Request;

interface UserRepository
{
    public function index(string $role_name): array;

    public function show(string $user_id): array;

    public function update(Request $request): array;

    public function store(Request $request): array;

    public function destroy(string $user_id): array;
}
