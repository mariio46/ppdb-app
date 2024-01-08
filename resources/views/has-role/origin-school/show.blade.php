@extends('layouts.has-role.auth', ['title' => $id])

@section('styles')
    <link type="text/css" href="/app-assets/css/pages/page-profile.css" rel="stylesheet">
@endsection

@push('scripts')
    <script src="/app-assets/js/scripts/pages/page-profile.js"></script>
@endpush

@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">Sekolah Asal</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('sekolah-asal.index') }}">Sekolah Asal</a>
                            </li>
                            <li class="breadcrumb-item active">
                                Detail Sekolah Asal
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
                                            <h2 class="text-dark">{{ $id }}</h2>
                                            <p class="text-dark">NPSN.{{ $id }}</p>
                                        </div>
                                        <!-- edit button -->
                                        <div>
                                            <a class="btn btn-success mb-2" href="{{ route('sekolah-asal.edit', $id) }}">
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

        @if (session()->get('msg'))
            <div class="alert alert-{{ session()->get('stat') }} p-1">
                <p class="mb-0 text-center">{{ session()->get('msg') }}</p>
            </div>
        @endif

        <div class="card">
            <div class="card-header">
                <h4 class="card-title" style="margin-left: 2rem; margin-top: 1.5rem">Informasi detail sekolah {{ $id }}</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
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
                    <div class="col-sm-6">
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
