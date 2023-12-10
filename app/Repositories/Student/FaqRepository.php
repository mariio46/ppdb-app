<?php

namespace App\Repositories\Student;

interface FaqRepository
{
  public function getFaqData(?string $search): array;
}
