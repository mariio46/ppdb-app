<?php

namespace App\Repositories\HasRole;

use Illuminate\Http\Request;

interface AgencyRepository
{
  public function getAgency(): array;

  public function getById(string $id): array;

  public function create(Request $request): array;

  public function update(Request $request): array;

  public function remove(string $id): array;
}
