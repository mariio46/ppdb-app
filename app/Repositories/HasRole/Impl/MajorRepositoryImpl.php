<?php

namespace App\Repositories\HasRole\Impl;

use App\Models\HasRole\Major;
use App\Repositories\HasRole\MajorRepository;
use Illuminate\Http\Request;

class MajorRepositoryImpl implements MajorRepository
{
    public function __construct(protected Major $major)
    {
        //
    }

    public function index(): array
    {
        return $this->major->getMajors();
    }

    public function store(Request $request): array
    {
        return $this->major->createMajor(request: $request);
    }

    public function show(string $major_id): array
    {
        return $this->major->getSingleMajor(major_id: $major_id);
    }

    public function update(Request $request, string $major_id): array
    {
        return $this->major->updateMajor(request: $request, major_id: $major_id);
    }

    public function destroy(string $major_id): array
    {
        return $this->major->deleteMajor(major_id: $major_id);
    }
}
