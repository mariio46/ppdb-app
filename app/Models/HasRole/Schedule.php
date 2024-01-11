<?php

namespace App\Models\HasRole;

use App\Models\Base;

class Schedule extends Base
{
  public function getDataSchedules(): array
  {
    return $this->getWithToken('tahap');
  }

  public function getDetailData(string $id): array
  {
    return $this->getWithToken("tahap/batas?id=$id");
  }

  public function getDataSchedule(string $id): array
  {
    return $this->getWithToken("tahap/detail?id=$id");
  }

  public function getDetailTime(string $id, string $type): array
  {
    return $this->getWithToken("batas/jenis?id=$id&tipe=$type");
  }
}
