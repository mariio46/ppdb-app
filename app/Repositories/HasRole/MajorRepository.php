<?php

namespace App\Repositories\HasRole;

use Illuminate\Http\Request;

interface MajorRepository
{
    public function index(): array;

    public function store(Request $request): array;

    public function show(string $major_id): array;

    public function update(Request $request, string $major_id): array;

    public function destroy(string $major_id): array;
}
