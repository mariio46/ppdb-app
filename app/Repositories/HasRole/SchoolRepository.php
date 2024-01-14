<?php

namespace App\Repositories\HasRole;

use Illuminate\Http\Request;

interface SchoolRepository
{
    public function index(): array;

    public function store(Request $request): array;

    public function show(string $school_id): array;
}
