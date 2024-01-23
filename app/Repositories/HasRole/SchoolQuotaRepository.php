<?php

namespace App\Repositories\HasRole;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;

interface SchoolQuotaRepository
{
    public function index(string $satuan_pendidikan, string $school_id): array;

    public function show(string $satuan_pendidikan, string $quota_id): array;

    public function updateSmk(Request $request, string $quota_id): array;

    public function updateSma(Request $request, string $quota_id): array;

    public function storeSmk(Request $request, string $school_id): array;

    public function storeSma(Request $request, string $school_id): array;

    public function destroy(string $quota_id, string $school_id): array;

    public function lock(string $school_id): array;

    public function majors(): Collection;
}
