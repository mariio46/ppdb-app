<?php

namespace App\Models\HasRole;

use App\Models\Base;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class SchoolQuota extends Base
{
    public function getQuotasBySchoolId(string $satuan_pendidikan, string $school_id): array
    {
        $unit = Str::upper($satuan_pendidikan);

        $quotas = $this->getWithToken(endpoint: "kuota/?satuan_pendidikan={$unit}&id={$school_id}");

        return $this->serverResponseWithGetMethod(response: $quotas);
    }

    public function getSingleQuota(string $satuan_pendidikan, string $quota_id): array
    {
        $unit = Str::upper($satuan_pendidikan);

        $quota = $this->getWithToken(endpoint: "kuota/detail?satuan_pendidikan={$unit}&id={$quota_id}");

        return $this->serverResponseWithGetMethod(response: $quota);
    }

    public function createQuotaSmk(Request $request, string $school_id): array
    {
        $major = explode('|', $request->jurusan);

        $body = [
            'sekolah_id' => $school_id,
            'jurusan_id' => $major[0],
            'jurusan' => $major[1],
            'afirmasi' => $request->inputQuotaAfirmasi,
            'mutasi' => $request->inputQuotaMutasi,
            'anak_guru' => $request->inputQuotaAnakGuru,
            'anak_dudi' => $request->inputQuotaAnakDudi,
            'akademik' => $request->inputQuotaAkademik,
            'non_akademik' => $request->inputQuotaNonAkademik,
            'domisili' => $request->inputQuotaZonasi,
            'total_kuota' => $request->inputTotalQuota,
            'syarat_butawarna' => $request->syarat_butawarna == 'on' ? 'y' : 'n',
            'syarat_tinggibadan' => $request->syarat_tinggibadan == 'on' ? 'y' : 'n',
        ];

        $response = $this->postWithToken(endpoint: 'kuota/smk/add/update', data: $body);

        return $this->serverResponseWithPostMethod(data: $response);
    }

    public function updateQuotaSmk(Request $request, string $quota_id): array
    {
        $body = [
            'id' => $quota_id,
            'jurusan_id' => $request->jurusan,
            'afirmasi' => $request->inputQuotaAfirmasi,
            'mutasi' => $request->inputQuotaMutasi,
            'anak_guru' => $request->inputQuotaAnakGuru,
            'anak_dudi' => $request->inputQuotaAnakDudi,
            'akademik' => $request->inputQuotaAkademik,
            'non_akademik' => $request->inputQuotaNonAkademik,
            'domisili' => $request->inputQuotaZonasi,
            'total_kuota' => $request->inputTotalQuota,
            'syarat_butawarna' => $request->syarat_butawarna == 'on' ? 'y' : 'n',
            'syarat_tinggibadan' => $request->syarat_tinggibadan == 'on' ? 'y' : 'n',
        ];

        $response = $this->postWithToken(endpoint: 'kuota/smk/add/update', data: $body);

        return $this->serverResponseWithPostMethod(data: $response);
    }

    public function createQuotaSma(Request $request, string $school_id): array
    {
        $body = [
            'sekolah_id' => $school_id,
            'afirmasi' => $request->inputQuotaAfirmasi ?? null,
            'mutasi' => $request->inputQuotaMutasi ?? null,
            'anak_guru' => $request->inputQuotaAnakGuru ?? null,
            'akademik' => $request->inputQuotaAkademik ?? null,
            'non_akademik' => $request->inputQuotaNonAkademik ?? null,
            'zonasi' => $request->inputQuotaZonasi ?? null,
            'total_kuota' => $request->inputTotalQuota ?? null,
            'bs_lakilaki' => $request->bs_lakilaki ?? null,
            'bs_perempuan' => $request->bs_perempuan ?? null,
        ];

        $response = $this->postWithToken(endpoint: 'kuota/sma/add/update', data: $body);

        return $this->serverResponseWithPostMethod(data: $response);
    }

    public function updateQuotaSma(Request $request, string $quota_id): array
    {
        $body = [
            'id' => $quota_id,
            'afirmasi' => $request->inputQuotaAfirmasi ?? null,
            'mutasi' => $request->inputQuotaMutasi ?? null,
            'anak_guru' => $request->inputQuotaAnakGuru ?? null,
            'akademik' => $request->inputQuotaAkademik ?? null,
            'non_akademik' => $request->inputQuotaNonAkademik ?? null,
            'zonasi' => $request->inputQuotaZonasi ?? null,
            'total_kuota' => $request->inputTotalQuota ?? null,
            'bs_lakilaki' => $request->bs_lakilaki ?? null,
            'bs_perempuan' => $request->bs_perempuan ?? null,
        ];

        $response = $this->postWithToken(endpoint: 'kuota/sma/add/update', data: $body);

        return $this->serverResponseWithPostMethod(data: $response);
    }

    public function deleteQuotaSmk(string $quota_id, string $school_id): array
    {
        $response = $this->postWithToken(endpoint: 'kuota/smk/hapus', data: ['id' => $quota_id, 'sekolah_id' => $school_id]);

        return $this->serverResponseWithPostMethod(data: $response);
    }

    // -------------------------FORM DATA-------------------------

    public function schoolMajorList(): Collection
    {
        $majors = $this->getWithToken(endpoint: 'jurusan');

        return $majors['status_code'] == 200
            ? $this->jsonToCollectionFormData(collections: $majors, value: 'id', label: 'jurusan')
            : $this->serverFailedResponse(error: $majors);
    }
}
