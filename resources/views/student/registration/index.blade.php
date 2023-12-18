@extends('layouts.student.auth')

@section('content')
    <div class="row">
        <div class="col-12">
            @if (!session()->get('stu_is_locked'))
                <div class="alert alert-danger p-1">
                    <p class="text-center"><x-tabler-shield-lock /></p>
                    <p class="mb-0 text-center">Kamu belum mengunci data pribadi. Lakukan penguncian data terlebih dahulu untuk melakukan pendaftaran jalur.</p>
                </div>
            @else
                @if (session()->get('stu_is_regis'))
                    <div class="card">
                        <div class="card-body p-2">
                            <div class="d-md-flex align-items-center">
                                <h4 class="my-1">Lihat Bukti Pendaftaran</h4>
                                <a class="btn btn-success ms-auto" id="registrationProofButton" href="">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="card">
                    <div class="card-body px-5 pt-5">
                        <div class="row match-height" id="cardContainer">
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection

@push('scripts')
    <script src="/js/student/pages/registration/index-v1.0.1.js"></script>
@endpush
