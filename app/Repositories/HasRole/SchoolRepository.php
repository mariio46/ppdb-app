<?php

namespace App\Repositories\HasRole;

use Illuminate\Http\Request;

interface SchoolRepository
{
    public function index(): array;

    public function store(Request $request, string $cabdin_id): array;

    public function show(string $school_id): array;

    public function update(Request $request, string $user_id, string $cabdin_id): array;

    public function quotas(string $school_unit, string $school_id): array;

    public function zones(string $school_id): array;

    public function verify(string $school_id, string $cabdin_id): array;
}
