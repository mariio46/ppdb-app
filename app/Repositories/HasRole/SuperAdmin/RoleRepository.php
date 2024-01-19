<?php

namespace App\Repositories\HasRole\SuperAdmin;

use Illuminate\Http\Request;

interface RoleRepository
{
    public function index(): array;

    public function show(string $role_id): array;

    public function store(Request $request): array;

    public function update(Request $request): array;
}
