<?php

namespace App\Repositories\HasRole;

use Illuminate\Http\Request;

interface FaqRepository
{
    public function index(): array;

    public function store(Request $request): array;

    public function show(string $faq_id): array;

    public function update(Request $request, string $faq_id): array;

    public function destroy(string $faq_id): array;
}
