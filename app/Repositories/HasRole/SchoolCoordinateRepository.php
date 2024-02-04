<?php

namespace App\Repositories\HasRole;

use Illuminate\Http\Request;

interface SchoolCoordinateRepository
{
    public function show(string $school_id): array;

    public function update(Request $request, string $school_id): array;
}
