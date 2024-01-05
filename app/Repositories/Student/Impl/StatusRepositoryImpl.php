<?php

namespace App\Repositories\Student\Impl;

use App\Models\Student\StatusModel;
use App\Repositories\Student\StatusRepository;

class StatusRepositoryImpl implements StatusRepository
{
    public function __construct(
        public StatusModel $statusModel
    ) {
    }

    public function getStatus(): array
    {
        $studentId = session()->get('stu_id');

        $get = $this->statusModel->getStudentStatus($studentId);

        return $get;
    }
}
