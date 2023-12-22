@extends('layouts.has-role.auth', ['title' => "Detail {$school->school_name}"])

@section('styles')
    <link type="text/css" href="/app-assets/css/pages/page-profile.css" rel="stylesheet">
@endsection

@push('scripts')
    <script src="/app-assets/js/scripts/pages/page-profile.js"></script>
@endpush

@section('content')
    <div class="content-body">
        <div id="user-profile">
            @include('has-role.school.partials.school-header')
        </div>
        <div class="d-flex gap-md-2">
            @include('has-role.school.partials.school-tab')
        </div>
        <div class="card">
            <div class="card-body">
                <section id="informasi-detail-sekolah">
                    <div class="d-flex align-items-center justify-content-between" style="margin-left: 2rem; margin-top: 1.5rem; margin-bottom: 1.5rem; margin-right: 2rem;">
                        <h4 class="text-primary">Informasi Detail Sekolah</h4>
                        <x-link href="{{ route('sekolah.edit', $school->npsn) }}" color="success">
                            Edit Info Sekolah
                        </x-link>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <table class="table table-borderless">
                                <tr>
                                    <td>Nama Kepala Sekolah</td>
                                    <td>:</td>
                                    <td>H. Ryan Rafli, S.T, M.Kom, Ph.D</td>
                                </tr>
                                <tr>
                                    <td>NIP Kepala Sekolah</td>
                                    <td>:</td>
                                    <td>12345678909</td>
                                </tr>
                                <tr>
                                    <td>Ketua PPDB</td>
                                    <td>:</td>
                                    <td>Muhammad Al Muqtadir, S.kom</td>
                                </tr>
                                <tr>
                                    <td>NIP Ketua PPDB</td>
                                    <td>:</td>
                                    <td>9876543212</td>
                                </tr>
                                <tr>
                                    <td>Alamat Jalan</td>
                                    <td>:</td>
                                    <td>Jalan Kemerdekaan No.3</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-sm-6">
                            <table class="table table-borderless">
                                <tr>
                                    <td>Kabupaten/Kota</td>
                                    <td>:</td>
                                    <td>Parepare</td>
                                </tr>
                                <tr>
                                    <td>Kecamatan</td>
                                    <td>:</td>
                                    <td>Bacukiki</td>
                                </tr>
                                <tr>
                                    <td>Desa Kelurahan</td>
                                    <td>:</td>
                                    <td>Galung Maloang</td>
                                </tr>
                                <tr>
                                    <td>RT/RW</td>
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
                </section>
                <x-separator marginY="3" />
                <section id="lokasi-sekolah">
                    <h4 class="text-primary" style="margin-left: 2rem; margin-top: 1.5rem">Lokasi Sekolah</h4>
                    <div class="w-100 p-2">
                        <img class="w-100" src="{{ Storage::url('images/static/lokasi-sekolah.png') }}" alt="Lokasi Sekolah">
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
