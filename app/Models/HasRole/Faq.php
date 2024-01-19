<?php

namespace App\Models\HasRole;

use App\Models\Base;
use Illuminate\Http\Request;

class Faq extends Base
{
    protected string $url = 'faq/add';

    public function getFaqs(): array
    {
        $faqs = $this->getWithToken(endpoint: 'faq');

        return $this->serverResponseWithGetMethod(response: $faqs);
    }

    public function createFaq(Request $request): array
    {
        $body = [
            'pertanyaan' => $request->question,
            'jawaban' => $request->answer,
        ];

        $data = $this->postWithToken(endpoint: $this->url, data: $body);

        return $this->serverResponseWithPostMethod(data: $data);
    }

    public function getSingleFaq(string $faq_id): array
    {
        $faq = $this->getWithToken(endpoint: "faq/detail?id={$faq_id}");

        return $this->serverResponseWithGetMethod(response: $faq);
    }

    public function updateFaq(Request $request, string $faq_id): array
    {
        $body = [
            'id' => $faq_id,
            'pertanyaan' => $request->question,
            'jawaban' => $request->answer,
        ];

        $data = $this->postWithToken(endpoint: $this->url, data: $body);

        return $this->serverResponseWithPostMethod(data: $data);
    }

    public function deleteFaq(string $faq_id): array
    {
        $data = $this->postWithToken(endpoint: 'faq/hapus', data: ['id' => $faq_id]);

        return $this->serverResponseWithPostMethod(data: $data);
    }
}
