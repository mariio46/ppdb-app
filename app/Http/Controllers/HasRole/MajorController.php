<?php

namespace App\Http\Controllers\HasRole;

use App\Http\Controllers\Controller;
use App\Repositories\HasRole\MajorRepository as Major;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MajorController extends Controller
{
    public function __construct(protected Major $major)
    {
        //
    }

    public function index(): View
    {
        return view('has-role.majors.index');
    }

    public function create(): View
    {
        return view('has-role.majors.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $response = $this->major->store(request: $request);

        return $this->repositoryResponseWithPostMethod(response: $response, route: 'majors.index');
    }

    public function edit(string $id): View
    {
        return view('has-role.majors.edit', compact('id'));
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $response = $this->major->update(request: $request, major_id: $id);

        return $this->repositoryResponseWithPostMethod(response: $response, route: 'majors.index');
    }

    public function destroy(string $id): RedirectResponse
    {
        $response = $this->major->destroy(major_id: $id);

        return $this->repositoryResponseWithPostMethod(response: $response, route: 'majors.index');
    }

    // --------------------------------------------------DATA API JSON--------------------------------------------------

    public function majors(): JsonResponse
    {
        $majors = $this->major->index();

        return response()->json($majors);
    }

    public function major(string $id): JsonResponse
    {
        $major = $this->major->show(major_id: $id);

        return response()->json($major['data']);
    }
}
