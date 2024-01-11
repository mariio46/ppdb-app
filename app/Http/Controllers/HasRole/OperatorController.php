<?php

namespace App\Http\Controllers\HasRole;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;

class OperatorController extends Controller
{
    public function index(): View
    {
        return view('has-role.operator.index');
    }

    public function create(): view
    {
        return view('has-role.operator.create');
    }

    public function show(string $username): View
    {
        // return collect($this->operators()->original)->firstWhere('username', 'mawar58468');
        return view('has-role.operator.show', compact('username'));
    }

    public function edit(string $username): View
    {
        return view('has-role.operator.edit', compact('username'));
    }

    // --------------------------------------------------DATA JSON--------------------------------------------------
    protected function singleOperator(string $username): JsonResponse
    {
        $operator = collect($this->operators()->original)->firstWhere('username', $username);

        return response()->json($operator);
    }

    protected function operators(): JsonResponse
    {
        $operators = [
            [
                'id' => 1,
                'name' => 'Mawardi',
                'username' => 'mawar58468',
                'role' => 'Operator',
                'dokumen' => 1,
                'status_aktif' => 1,
            ],
            [
                'id' => 2,
                'name' => 'Rais',
                'username' => 'rais23078',
                'role' => 'Operator',
                'dokumen' => 0,
                'status_aktif' => 3,
            ],
            [
                'id' => 3,
                'name' => 'Edi Siswanto',
                'username' => 'edi23078',
                'role' => 'Operator',
                'dokumen' => 1,
                'status_aktif' => 1,
            ],
            [
                'id' => 4,
                'name' => 'Aldi Taher',
                'username' => 'taher23078',
                'role' => 'Operator',
                'dokumen' => 0,
                'status_aktif' => 3,
            ],
            [
                'id' => 5,
                'name' => 'Ainun Amirah',
                'username' => 'ainun23078',
                'role' => 'Operator',
                'dokumen' => 1,
                'status_aktif' => 2,
            ],
        ];

        return response()->json($operators);
    }
}
