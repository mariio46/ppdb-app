<?php

namespace App\Repositories\HasRole\Impl;

use App\Models\HasRole\SchoolQuota;
use App\Repositories\HasRole\SchoolQuotaRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class SchoolQuotaRepositoryImpl implements SchoolQuotaRepository
{
    public function __construct(protected SchoolQuota $schoolQuota)
    {
        //
    }

    public function index(string $satuan_pendidikan, string $school_id): array
    {
        return $this->schoolQuota->getQuotasBySchoolId(satuan_pendidikan: $satuan_pendidikan, school_id: $school_id);
    }

    public function show(string $satuan_pendidikan, string $quota_id): array
    {
        return $this->schoolQuota->getSingleQuota(satuan_pendidikan: $satuan_pendidikan, quota_id: $quota_id);
    }

    public function updateSmk(Request $request, string $quota_id): array
    {
        return $this->schoolQuota->updateQuotaSmk(request: $request, quota_id: $quota_id);
    }

    public function updateSma(Request $request, string $quota_id): array
    {
        return $this->schoolQuota->updateQuotaSma(request: $request, quota_id: $quota_id);
    }

    public function storeSmk(Request $request, string $school_id): array
    {
        return $this->schoolQuota->createQuotaSmk(request: $request, school_id: $school_id);
    }

    public function storeSma(Request $request, string $school_id): array
    {
        return $this->schoolQuota->createQuotaSma(request: $request, school_id: $school_id);
    }

    public function destroy(string $quota_id, string $school_id): array
    {
        return $this->schoolQuota->deleteQuotaSmk(quota_id: $quota_id, school_id: $school_id);
    }

    public function majors(): Collection
    {
        return $this->schoolQuota->schoolMajorList();
    }
}
