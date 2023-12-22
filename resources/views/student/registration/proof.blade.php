@extends('layouts.student.auth')

@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">Pendaftaran</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb breadcrumb-slash">
                            <li class="breadcrumb-item">
                                <a href="{{ route('student.regis') }}">Pendaftaran</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('student.regis.phase', [$phaseCode]) }}">Pendaftaran Tahap {{ $phase }}</a>
                            </li>
                            <li class="breadcrumb-item active">
                                Cetak Bukti Pendaftaran
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="text-center card-title mt-2">BUKTI PENDAFTARAN PPDB ONLINE SULAWESI SELATAN TAHUN 2024</h3>
                    </div>
                    <div class="card-body border-top">
                        <h4 class="mb-2">Pendaftaran <span id="schoolType"></span> Jalur <span id="chosenTrack"></span></h4>

                        <h5>Data Diri</h5>
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <table class="table table-borderless">
                                    <tr>
                                        <td class="col-auto px-0" style="width: 35%;">Nama Lengkap</td>
                                        <td class="col-auto">:</td>
                                        <td class="col-auto px-0" style="width: 60%;">{{ session()->get('stu_name') }}</td>
                                    </tr>
                                    <tr>
                                        <td class="col-auto px-0">NISN</td>
                                        <td class="col-auto">:</td>
                                        <td class="col-auto px-0">{{ session()->get('stu_nisn') }}</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-6 col-12">
                                <table class="table table-borderless">
                                    <tr>
                                        <td class="col-auto px-0" style="width: 35%;">Jenis Kelamin</td>
                                        <td class="col-auto">:</td>
                                        <td class="col-auto px-0" style="width: 60%;">{{ session()->get('stu_gender') == 'l' ? 'Laki-laki' : 'Perempuan' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="col-auto px-0">Asal Sekolah</td>
                                        <td class="col-auto">:</td>
                                        <td class="col-auto px-0">{{ session()->get('stu_school') }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div id="additionalDataSect"></div>

                    <div class="card-body border-top">
                        <h4 class="mb-2">Sekolah Pilihan</h4>

                        <div class="row">
                            <div class="col-lg-6 col-12" id="chosenSchoolSect"></div>
                        </div>

                        <h5 class="text-primary">Sekolah Verifikasi Berkas</h5>
                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <div class="d-flex align-items-center mb-2">
                                    <div style="width: 35%;">Sekolah Pilihan</div>
                                    <div class="px-1">:</div>
                                    <div style="width: 60%;"><span id="schoolVerif">-</span></div>
                                </div>
                            </div>
                        </div>

                        {{-- info --}}
                        <div class="alert alert-info p-1">
                            <p class="mb-0">
                                Silakan ke sekolah tempat verifikasi berkas yang kamu pilih selambat-lambatnya tanggal <span class="text-danger fw-bold" id="endVerif"></span> dengan membawa semua berkas
                                yang
                                diperlukan seperti:
                            </p>
                        </div>
                    </div>

                    <div class="card-body border-top">
                        <x-button color="success" withIcon="true"><x-tabler-printer style="width: 16px; height: 16px;" /><span class="ms-1">Cetak Bukti Pendaftaran</span></x-button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        var phase = '{{ $phase }}';
    </script>
    <script src="/js/student/pages/registration/proof-v1.0.1.js"></script>
@endpush
