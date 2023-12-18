@extends('layouts.student.auth')

@section('styles')
    <link type="text/css" href="/app-assets/css/plugins/forms/form-validation.css" rel="stylesheet">
    <link type="text/css" href="/app-assets/css/pages/page-profile.css" rel="stylesheet">
    <link type="text/css" href="/css/student/pages/dashboard/dashboard.css" rel="stylesheet">
@endsection

@section('content')
    {{-- first time login --}}
    @if (session()->get('ftlStatus'))
        <div class="alert alert-{{ session()->get('ftlStatus') }} p-1">
            <p class="mb-0 text-center">{{ session()->get('ftlMsg') }}</p>
        </div>
    @endif

    <div class="modal fade text-start" id="firstTimeLoginModal" data-bs-backdrop="static" aria-labelledby="ftlLabel" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="ftlLabel">Perbarui Kata Sandi</h4>
                </div>
                <form id="ftlForm" action="/first-time-login" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="alert alert-warning p-1">
                            <p class="mb-0"><strong>Penting!</strong></p>
                            <ul class="mb-0">
                                <li>Perbarui kata sandi berguna untuk menjaga data kamu agar tetap aman.</li>
                                <li>Masukkan email aktif dan nomor telepon yang valid agar dapat tetap terhubung dengan kami.</li>
                            </ul>
                        </div>
                    </div>
                    <div class="modal-body border-top">
                        <div class="mt-1">
                            <x-label for="ftlEmail"><i>Email</i></x-label>
                            <x-input id="ftlEmail" name="ftlEmail" type="text" placeholder="Email" />
                        </div>
                        <div class="mt-1">
                            <x-label for="ftlPhoneNumber">Nomor <i>Handphone</i></x-label>
                            <x-input id="ftlPhoneNumber" name="ftlPhoneNumber" type="text" placeholder="08xx xxxx xxxx" maxlength="13" />
                        </div>
                        <div class="mt-1">
                            <x-label for="ftlNewPassword">Kata Sandi Baru</x-label>
                            <div class="input-group input-group-merge form-password-toggle">
                                <x-input id="ftlNewPassword" name="ftlNewPassword" type="password" placeholder="············" />
                                <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                            </div>
                        </div>
                        <div class="mt-1">
                            <x-label for="ftlConfirmPassword">Ulangi Kata Sandi Baru</x-label>
                            <div class="input-group input-group-merge form-password-toggle">
                                <x-input id="ftlConfirmPassword" name="ftlConfirmPassword" type="password" placeholder="············" />
                                <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                            </div>
                        </div>
                        <div class="mt-2 mb-2 text-end">
                            <x-button type="submit">Simpan Perubahan</x-button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- /first time login --}}

    <div class="content-body">
        <div id="user-profile">
            <div class="row">
                <div class="col-12">
                    <div class="card profile-header mb-2">
                        {{-- profile cover photo  --}}
                        <img class="card-img-top" src="/app-assets/images/profile/user-uploads/timeline.jpg" alt="User Profile Image" />
                        {{-- /profile cover photo  --}}

                        <div class="position-relative">
                            {{-- profile picture  --}}
                            <div class="profile-img-container d-flex align-items-center">
                                <div class="profile-img">
                                    <img class="rounded img-fluid" id="profileImage" src="" alt="Profile image" />
                                </div>
                            </div>
                        </div>

                        <div class="profile-header-nav" style="min-height: 3rem;">
                            <nav class="navbar navbar-expand-md navbar-light justify-content-end justify-content-md-between w-100">
                                <div class="profile-tabs d-flex justify-content-end flex-wrap mt-md-0">
                                    {{-- edit button  --}}
                                    <a class="btn btn-success btn-icon d-none" id="btnEditData" href="/data-diri/data-pribadi">
                                        <x-tabler-pencil />
                                        <span class="fw-bold">Edit Data</span>
                                    </a>
                                </div>
                            </nav>
                        </div>
                    </div>

                    {{-- personal data --}}
                    <div class="card">
                        {{-- data diri --}}
                        <div class="card-body">
                            <h4 class="mb-2">Data Diri</h4>

                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <table class="table table-borderless">
                                        <tr>
                                            <td class="px-1 col-auto" style="width: 40%;">Nama Lengkap</td>
                                            <td class="px-1 col-auto">:</td>
                                            <td class="px-1 col-auto">{{ session()->get('stu_name') }}</td>
                                        </tr>
                                        <tr>
                                            <td class="px-1">NISN</td>
                                            <td class="px-1">:</td>
                                            <td class="px-1">{{ session()->get('stu_nisn') }}</td>
                                        </tr>
                                        <tr>
                                            <td class="px-1">NIK</td>
                                            <td class="px-1">:</td>
                                            <td class="px-1"><span id="selfNik"><i>loading...</i></span></td>
                                        </tr>
                                        <tr>
                                            <td class="px-1">Asal Sekolah</td>
                                            <td class="px-1">:</td>
                                            <td class="px-1"><span id="selfFromSchool"><i>Loading...</i></span></td>
                                        </tr>
                                        <tr>
                                            <td class="px-1">Jenis Kelamin</td>
                                            <td class="px-1">:</td>
                                            <td class="px-1"><span id="selfGender"><i>Loading...</i></span></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <table class="table table-borderless">
                                        <tr>
                                            <td class="px-1 col-auto" style="width: 40%;">Tempat Lahir</td>
                                            <td class="px-1 col-auto">:</td>
                                            <td class="px-1 col-auto"><span id="selfBirthPlace"><i>Loading...</i></span></td>
                                        </tr>
                                        <tr>
                                            <td class="px-1 ">Tanggal Lahir</td>
                                            <td class="px-1 ">:</td>
                                            <td class="px-1 "><span id="selfBirthDay"><i>Loading...</i></span></td>
                                        </tr>
                                        <tr>
                                            <td class="px-1 ">Nomor <i>Handphone</i></td>
                                            <td class="px-1 ">:</td>
                                            <td class="px-1 "><span id="selfPhoneNumber"><i>Loading...</i></span></td>
                                        </tr>
                                        <tr>
                                            <td class="px-1 "><i>Email</i></td>
                                            <td class="px-1 ">:</td>
                                            <td class="px-1 text-break"><span id="selfEmail"><i>Loading...</i></span></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        {{-- /data diri --}}

                        {{-- data alamat --}}
                        <div class="card-body border-top">
                            <h4 class="mb-2">Data Alamat</h4>

                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <table class="table table-borderless">
                                        <tr>
                                            <td class="px-1 col-auto" style="width: 40%;">Provinsi</td>
                                            <td class="px-1 col-auto">:</td>
                                            <td class="px-1 col-auto"><span id="selfProvince"><i>Loading...</i></span></td>
                                        </tr>
                                        <tr>
                                            <td class="px-1">Kabupaten / Kota</td>
                                            <td class="px-1">:</td>
                                            <td class="px-1"><span id="selfCity"><i>Loading...</i></span></td>
                                        </tr>
                                        <tr>
                                            <td class="px-1">Kecamatan</td>
                                            <td class="px-1">:</td>
                                            <td class="px-1"><span id="selfSubDistrict"><i>Loading...</i></span></td>
                                        </tr>
                                        <tr>
                                            <td class="px-1">Desa / Kelurahan</td>
                                            <td class="px-1">:</td>
                                            <td class="px-1"><span id="selfVillage"><i>Loading...</i></span></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <table class="table table-borderless">
                                        <tr>
                                            <td class="px-1" style="width: 40%;">Dusun / Lingkungan</td>
                                            <td class="px-1 col-auto">:</td>
                                            <td class="px-1 col-auto"><span id="selfHamlet"><i>Loading...</i></span></td>
                                        </tr>
                                        <tr>
                                            <td class="px-1">RT/RW</td>
                                            <td class="px-1">:</td>
                                            <td class="px-1"><span id="selfRtRw"><i>Loading...</i></span></td>
                                        </tr>
                                        <tr>
                                            <td class="px-1">Alamat Jalan</td>
                                            <td class="px-1">:</td>
                                            <td class="px-1"><span id="selfAddress"><i>Loading...</i></span></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        {{-- /data alamat --}}

                        {{-- data orang tua --}}
                        <div class="card-body border-top">
                            <h4 class="mb-2">Data Orang Tua</h4>

                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <table class="table table-borderless">
                                        <tr>
                                            <td class="px-1 col-auto" style="width: 40%;">Nama Ibu Kandung</td>
                                            <td class="px-1 col-auto">:</td>
                                            <td class="px-1 col-auto"><span id="selfMothersName"><i>Loading...</i></span></td>
                                        </tr>
                                        <tr>
                                            <td class="px-1">Nomor <i>Handphone</i> Ibu</td>
                                            <td class="px-1">:</td>
                                            <td class="px-1"><span id="selfMothersPhone"><i>Loading...</i></span></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <table class="table table-borderless">
                                        <tr>
                                            <td class="px-1 col-auto" style="width: 40%;">Nama Ayah</td>
                                            <td class="px-1 col-auto">:</td>
                                            <td class="px-1 col-auto"><span id="selfFathersName"><i>Loading...</i></span></td>
                                        </tr>
                                        <tr>
                                            <td class="px-1">Nomor <i>Handphone</i> Ayah</td>
                                            <td class="px-1">:</td>
                                            <td class="px-1"><span id="selfFathersPhone"><i>Loading...</i></span></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        {{-- /data orang tua --}}

                        {{-- data wali --}}
                        <div class="card-body border-top">
                            <h4 class="mb-2">Data Wali <small>(Opsional)</small></h4>

                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <table class="table table-borderless">
                                        <tr>
                                            <td class="px-1 col-auto" style="width: 40%;">Nama Wali</td>
                                            <td class="px-1 col-auto">:</td>
                                            <td class="px-1 col-auto"><span id="selfGuardsName"><i>Loading...</i></span></td>
                                        </tr>
                                        <tr>
                                            <td class="px-1">Nomor <i>Handphone</i> Wali</td>
                                            <td class="px-1">:</td>
                                            <td class="px-1"><span id="selfGuardsPhone"><i>Loading...</i></span></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        {{-- /data wali --}}
                    </div>
                    {{-- /personal data --}}

                    {{-- score data --}}
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-end mb-1">
                                <h4 class="text-title mb-0">Data Nilai Rapor</h4>

                                <a class="ms-auto btn btn-success d-none" id="btnEditScore" href="/data-diri/edit-nilai/semester-1"><x-tabler-pencil /> Edit Nilai</a>
                            </div>

                            <small class="text-subtitle">Data nilai rapor adalah data <strong>nilai pengetahuan</strong> mata pelajaran Bahasa Indonesia, Bahasa Inggris, Matematika, Ilmu Pengetahuan Alam
                                dan Ilmu Pengetahuan Sosial pada semester 1 sampai semester 5.</small>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="py-2">Mata Pelajaran</th>
                                        <th class="py-2 text-center">Semester 1</th>
                                        <th class="py-2 text-center">Semester 2</th>
                                        <th class="py-2 text-center">Semester 3</th>
                                        <th class="py-2 text-center">Semester 4</th>
                                        <th class="py-2 text-center">Semester 5</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="py-2">Bahasa Indonesia</td>
                                        <td class="py-2 text-center"><span id="smt1Bid"><i>Loading...</i></span></td>
                                        <td class="py-2 text-center"><span id="smt2Bid"><i>Loading...</i></span></td>
                                        <td class="py-2 text-center"><span id="smt3Bid"><i>Loading...</i></span></td>
                                        <td class="py-2 text-center"><span id="smt4Bid"><i>Loading...</i></span></td>
                                        <td class="py-2 text-center"><span id="smt5Bid"><i>Loading...</i></span></td>
                                    </tr>
                                    <tr>
                                        <td class="py-2">Bahasa Inggris</td>
                                        <td class="py-2 text-center"><span id="smt1Big"><i>Loading...</i></span></td>
                                        <td class="py-2 text-center"><span id="smt2Big"><i>Loading...</i></span></td>
                                        <td class="py-2 text-center"><span id="smt3Big"><i>Loading...</i></span></td>
                                        <td class="py-2 text-center"><span id="smt4Big"><i>Loading...</i></span></td>
                                        <td class="py-2 text-center"><span id="smt5Big"><i>Loading...</i></span></td>
                                    </tr>
                                    <tr>
                                        <td class="py-2">Matematika</td>
                                        <td class="py-2 text-center"><span id="smt1Mtk"><i>Loading...</i></span></td>
                                        <td class="py-2 text-center"><span id="smt2Mtk"><i>Loading...</i></span></td>
                                        <td class="py-2 text-center"><span id="smt3Mtk"><i>Loading...</i></span></td>
                                        <td class="py-2 text-center"><span id="smt4Mtk"><i>Loading...</i></span></td>
                                        <td class="py-2 text-center"><span id="smt5Mtk"><i>Loading...</i></span></td>
                                    </tr>
                                    <tr>
                                        <td class="py-2">Ilmu Pengetahuan Alam</td>
                                        <td class="py-2 text-center"><span id="smt1Ipa"><i>Loading...</i></span></td>
                                        <td class="py-2 text-center"><span id="smt2Ipa"><i>Loading...</i></span></td>
                                        <td class="py-2 text-center"><span id="smt3Ipa"><i>Loading...</i></span></td>
                                        <td class="py-2 text-center"><span id="smt4Ipa"><i>Loading...</i></span></td>
                                        <td class="py-2 text-center"><span id="smt5Ipa"><i>Loading...</i></span></td>
                                    </tr>
                                    <tr>
                                        <td class="py-2">Ilmu Pengetahuan Sosial</td>
                                        <td class="py-2 text-center"><span id="smt1Ips"><i>Loading...</i></span></td>
                                        <td class="py-2 text-center"><span id="smt2Ips"><i>Loading...</i></span></td>
                                        <td class="py-2 text-center"><span id="smt3Ips"><i>Loading...</i></span></td>
                                        <td class="py-2 text-center"><span id="smt4Ips"><i>Loading...</i></span></td>
                                        <td class="py-2 text-center"><span id="smt5Ips"><i>Loading...</i></span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            <p>
                                <small><b>Catatan</b>:<br>
                                    Jika terdapat Nilai Semester yang tidak terlihat, kamu dapat menggeser tabel ke kanan atau ke kiri.
                                </small>
                            </p>
                        </div>
                    </div>
                    {{-- /score data --}}

                    {{-- card lock data --}}
                    <div class="card d-none" id="cardLock">
                        <div class="card-body">
                            <h4 class="card-title">Kunci Data Diri</h4>

                            <div class="alert alert-danger p-2">
                                <p class="mb-0">
                                    Kamu hanya dapat melakukan pendaftaran setelah mengunci data diri kamu.
                                </p>
                                <p>
                                    Data yang sudah dikunci tidak dapat dibuka kembali. Maka pastikan bahwa data kamu sudah benar dan sesuai sebelum data dikunci.
                                </p>
                            </div>

                            <div class="mt-2">
                                <x-checkbox identifier="lockCheck" label="Saya yakin untuk mengunci data diri saya" variant="danger" />

                                <div class="mt-2">
                                    <x-button id="lockCheckBtn" data-bs-toggle="modal" data-bs-target="#lockStudentDataModal" type="button" disabled color="danger">Kunci Data Diri</x-button>
                                </div>

                                <!-- Modal -->
                                <div class="modal fade modal-danger text-start" id="lockStudentDataModal" aria-labelledby="lockStudentDataModalLabel" aria-hidden="true" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Kunci Data Diri</h5>
                                                <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form id="lockDataForm" action="/lock-student-data" method="post">
                                                    @csrf
                                                    <div class="alert alert-danger p-1">
                                                        Data yang sudah dikunci tidak dapat diubah kembali. Pastikan data kamu sudah benar sebelum mengunci data.
                                                    </div>

                                                    <x-button class="float-end mb-1" type="submit" color="danger" withIcon="true"><x-tabler-lock-access /> Kunci Data</x-button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- /card lock data --}}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('vendorScripts')
    <script src="/app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
@endsection

@push('scripts')
    <script src="/js/student/pages/dashboard/index-v1.0.4.js"></script>
@endpush
