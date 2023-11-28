@extends('layouts.has-role.auth', ['title' => $school->name])

@section('styles')
    <link type="text/css" href="/app-assets/css/pages/page-profile.css" rel="stylesheet">
@endsection

@push('scripts')
    <script src="/app-assets/js/scripts/pages/page-profile.js"></script>
@endpush

@section('content')
    <div class="content-body">
        <div id="user-profile">
            <div class="row">
                <div class="col-12">
                    <div class="card profile-header mb-2">
                        <!-- profile cover photo -->
                        <img class="card-img-top" src="{{ Storage::url('images/static/sampul-detail-sekolah.png') }}" alt="Sampul Detail Sekolah" />
                        <!--/ profile cover photo -->
                        <!-- tabs pill -->
                        <div class="profile-header-nav">
                            <!-- navbar -->
                            <nav class="navbar navbar-expand-md navbar-light justify-content-end justify-content-md-between w-100">
                                <div class="position-relative">
                                    <!-- profile picture -->
                                    <div class="profile-img-container d-flex align-items-center">
                                        <div class="profile-img">
                                            <img class="rounded img-fluid" src="{{ Storage::url('images/static/profil-sekolah.png') }}" alt="Profil Sekolah" />
                                        </div>
                                        <!-- profile title -->
                                    </div>
                                </div>

                                <!-- collapse  -->
                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <div class="profile-tabs d-flex justify-content-between align-items-center flex-wrap mt-1 mt-md-0">
                                        <div class="profile-title">
                                            <h2 class="text-dark">{{ $school->name }}</h2>
                                            <p class="text-dark">NPSN.{{ $school->npsn }}</p>
                                        </div>
                                        <!-- edit button -->
                                        <div>
                                            <a class="btn btn-success mb-2" href="{{ route('sekolah-asal.edit', $school->id) }}">
                                                <x-tabler-pencil />
                                                Edit Sekolah
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!--/ collapse  -->
                            </nav>
                            <!--/ navbar -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-between align-items-center">
            <a class="btn btn-primary mb-2" href="#">
                <x-tabler-home />
                Info Sekolah
            </a>
        </div>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title" style="margin-left: 2rem; margin-top: 1.5rem">Informasi detail sekolah {{ $school->name }}</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6 col-12 mb-1 mb-sm-2">
                        <table class="table table-borderless">
                            <tr>
                                <td>Nama Kepala Sekolah</td>
                                <td>:</td>
                                <td>Ryan Rafli</td>
                            </tr>
                            <tr>
                                <td>NIP Kepala Sekolah</td>
                                <td>:</td>
                                <td>12345678909</td>
                            </tr>
                            <tr>
                                <td>Ketua PPDB</td>
                                <td>:</td>
                                <td>Muhammad Al Muqtadir, S.PDI</td>
                            </tr>
                            <tr>
                                <td>NIP Ketua PPDB</td>
                                <td>:</td>
                                <td>9876543212</td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>:</td>
                                <td>Jalan Kemerdekaan No.3</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-sm-6 col-12 mb-1 mb-sm-2">
                        <table class="table table-borderless">
                            <tr>
                                <td>Kabupaten / Kota</td>
                                <td>:</td>
                                <td>Parepare</td>
                            </tr>
                            <tr>
                                <td>Kecamatan</td>
                                <td>:</td>
                                <td>Bacukiki</td>
                            </tr>
                            <tr>
                                <td>Desa / Kelurahan</td>
                                <td>:</td>
                                <td>Galung Maloang</td>
                            </tr>
                            <tr>
                                <td>RT / RW</td>
                                <td>:</td>
                                <td>001/002</td>
                            </tr>
                            <tr>
                                <td>Koordinat Sekolah</td>
                                <td>:</td>
                                <td>-2.649099922180</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
