<?php

namespace App\Repositories\Student\Impl;

use App\Models\Student\FaqModel;
use App\Repositories\Student\FaqRepository;

class FaqRepositoryImpl implements FaqRepository
{
    public function __construct(
        protected FaqModel $faqModel
    ) {
    }

    public function getFaqData(?string $search): array
    {
        $faqListDummy = $this->faqModel->getData();

        $collection = collect($faqListDummy);

        $firstTen = $collection->take(10)->toArray();

        if ($search != null) {
            $data = $collection->filter(function ($item) use ($search) {
                $searchWords = explode(' ', $search);
                foreach ($searchWords as $word) {
                    // search every words in question or answer
                    $foundInQuestion = stripos($item['question'], $word) !== false;
                    $foundInAnswer = stripos($item['answer'], $word) !== false;

                    // if found in question or answer, return true
                    if ($foundInQuestion || $foundInAnswer) {
                        return true;
                    }
                }

                // if there is no match, return false
                return false;
            })->toArray();
        } else {
            $data = $firstTen;
        }

        return array_values($data);
    }
}
