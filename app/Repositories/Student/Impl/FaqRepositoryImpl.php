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
        return $this->faqModel->getData($search);
    }
}
