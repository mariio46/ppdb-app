<?php

namespace App\Models\HasRole;

use App\Models\Base;

class SchoolData extends Base
{
    public function getSchool(string $school_id): array
    {
        $school = $this->getWithToken(endpoint: "sekolah/detail?id={$school_id}");

        return $this->serverResponseWithGetMethod(response: $school);
    }
}
