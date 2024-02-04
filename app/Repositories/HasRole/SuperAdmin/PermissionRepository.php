<?php

namespace App\Repositories\HasRole\SuperAdmin;

use Illuminate\Http\Request;

interface PermissionRepository
{
    public function index(): array;

    public function store(Request $request): array;

    public function show(string $permission_id): array;

    public function update(Request $request, string $permission_id): array;

    public function destroy(string $permission_id): array;
}
