<?php

namespace App\Repositories\HasRole\Impl;

use App\Models\HasRole\Operator;
use App\Repositories\HasRole\OperatorRepository;
use Illuminate\Http\Request;

class OperatorRepositoryImpl implements OperatorRepository
{
    public function __construct(protected Operator $operator)
    {
        //
    }

    public function index(string $key, string $param): array
    {
        return $this->operator->getOperators(key: $key, param: $param);
    }

    public function show(string $param): array
    {
        return $this->operator->getSingleOperator(param: $param);
    }

    public function store(Request $request, string $param): array
    {
        return $this->operator->createOperator(request: $request, param: $param);
    }
}
