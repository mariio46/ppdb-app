<?php

namespace App\Repositories\HasRole\Impl;

use App\Models\HasRole\Faq;
use App\Repositories\HasRole\FaqRepository;
use Illuminate\Http\Request;

class FaqRepositoryImpl implements FaqRepository
{
    public function __construct(protected Faq $faq)
    {
        //
    }

    public function index(): array
    {
        return $this->faq->getFaqs();
    }

    public function store(Request $request): array
    {
        return $this->faq->createFaq(request: $request);
    }

    public function show(string $faq_id): array
    {
        return $this->faq->getSingleFaq(faq_id: $faq_id);
    }

    public function update(Request $request, string $faq_id): array
    {
        return $this->faq->updateFaq(request: $request, faq_id: $faq_id);
    }

    public function destroy(string $faq_id): array
    {
        return $this->faq->deleteFaq(faq_id: $faq_id);
    }
}
