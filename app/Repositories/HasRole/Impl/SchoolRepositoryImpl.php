<?php

namespace App\Repositories\HasRole\Impl;

use App\Models\HasRole\School;
use App\Repositories\HasRole\SchoolRepository;
use Illuminate\Http\Request;

class SchoolRepositoryImpl implements SchoolRepository
{
    public function __construct(protected School $school)
    {
        //
    }

    public function index(): array
    {
        return $this->school->getSchools();
    }

    public function store(Request $request, string $cabdin_id): array
    {
        return $this->school->createSchool(request: $request, cabdin_id: $cabdin_id);
    }

    public function show(string $school_id): array
    {
        return $this->school->getSingleSchool(school_id: $school_id);
    }

    public function update(Request $request, string $user_id, string $cabdin_id): array
    {
        return $this->school->updateSchool(request: $request, user_id: $user_id, cabdin_id: $cabdin_id);
    }
}
