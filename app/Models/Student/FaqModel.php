<?php

namespace App\Models\Student;

use App\Models\Base;

class FaqModel extends Base
{
    public function getData(?string $search = null): array
    {
        $get = $this->swGetWithToken("faq?search=$search");

        return $this->serverResponseWithGetMethod($get);
    }
}
