<?php

namespace App\Http\Middleware\HasRole;

use App\Repositories\HasRole\SchoolRepository as School;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerifyingSchool
{
    protected ?string $cabdinId;

    protected bool $hasCabdinId;

    public function __construct(protected School $school)
    {
        $this->hasCabdinId = session()->get('cabdin_id') != null;

        $this->cabdinId = $this->hasCabdinId ? session()->get('cabdin_id') : null;
    }

    public function handle(Request $request, Closure $next): Response
    {
        if (! $this->hasCabdinId) {
            return to_route('sekolah.detail', ['id' => $request->id, 'unit' => $request->unit])->with([
                'stat' => 'error',
                'msg' => 'Anda bukan Admin Cabang Dinas',
            ]);
        }

        $schoolStatus = $this->school->show(school_id: $request->id)['data']['terverifikasi'];

        if ($schoolStatus != 'simpan') {
            $message = $schoolStatus == 'belum_simpan'
                ? 'Sekolah ini belum melengkapi data sekolahnya!'
                : 'Sekolah ini sudah terverifikasi!';

            return to_route('sekolah.detail', ['id' => $request->id, 'unit' => $request->unit])->with([
                'stat' => 'error',
                'msg' => $message,
            ]);
        }

        $request->attributes->add(['cabdin_id' => $this->cabdinId]);

        return $next($request);
    }
}
