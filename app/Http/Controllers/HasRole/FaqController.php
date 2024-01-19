<?php

namespace App\Http\Controllers\HasRole;

use App\Http\Controllers\Controller;
use App\Repositories\HasRole\FaqRepository as Faq;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FaqController extends Controller
{
    public function __construct(protected Faq $faq)
    {
        //
    }

    public function index(): View
    {
        return view('has-role.faq.index');
    }

    public function create(): View
    {
        return view('has-role.faq.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $response = $this->faq->store(request: $request);

        return $this->repositoryResponseWithPostMethod(response: $response, route: 'faqs.index');
    }

    public function edit(string $id): View
    {
        return view('has-role.faq.edit', compact('id'));
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $response = $this->faq->update(request: $request, faq_id: $id);

        return $this->repositoryResponseWithPostMethod(response: $response, route: 'faqs.index');
    }

    public function destroy(string $id): RedirectResponse
    {
        $response = $this->faq->destroy(faq_id: $id);

        return $this->repositoryResponseWithPostMethod(response: $response, route: 'faqs.index');
    }

    // --------------------------------------------------DATA API JSON--------------------------------------------------
    protected function faqs(): JsonResponse
    {
        $faqs = $this->faq->index();

        return response()->json($faqs['data']);
    }

    protected function faq(string $id): JsonResponse
    {
        $faq = $this->faq->show(faq_id: $id);

        return response()->json($faq['data']);
    }
}
