<?php

namespace App\Repositories\HasRole;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;

interface SchoolDataRepository
{
    public function index(string $school_id): array;

    public function update(Request $request, string $id): array;

    public function districts(string $code): Collection;

    public function uploadFirstDocument(Request $request, string $school_id): array;

    public function uploadSecondDocument(Request $request, string $school_id): array;

    public function uploadLogo(Request $request, string $school_id): array;

    public function lock(string $school_id): array;
}
