<?php

namespace App\Repositories\HasRole;

use Illuminate\Http\Request;

interface OperatorRepository
{
    public function index(string $key, string $param): array;

    public function show(string $operator_id): array;

    public function store(Request $request, string $param): array;

    public function verify(string $operator_id): array;

    public function status(Request $request, string $operator_id): array;
}
