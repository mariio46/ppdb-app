@extends('layouts.student.auth')

@section('styles')
    <link type="text/css" href="/app-assets/css/plugins/forms/form-validation.css" rel="stylesheet">
    <link type="text/css" href="/app-assets/css/pages/page-profile.css" rel="stylesheet">
    <link type="text/css" href="/css/student/pages/dashboard/dashboard.css" rel="stylesheet">
@endsection

@section('content')
    <div class="modal fade text-start" id="firstTimeLoginModal" data-bs-backdrop="static" aria-labelledby="ftlLabel" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="ftlLabel">Perbarui Kata Sandi</h4>
                </div>
                <form id="ftlForm" action="{{ route('student.personal.first-login') }}" method="post">
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

    <x-error-reload />

    <section id="loader">
        <div id="user-profile">
            <div class="card profile-header mb-2 placeholder-glow">
                <img class="card-img-top placeholder" src="/app-assets/images/profile/user-uploads/timeline.jpg" />

                <div class="position-relative">
                    <div class="profile-img-container d-flex align-items-center">
                        <div class="profile-img placeholder-glow">
                            <div class="rounded placeholder h-100 w-100"></div>
                        </div>
                    </div>
                </div>

                <div class="profile-header-nav" style="min-height: 3rem;">
                    <nav class="navbar navbar-expand-md navbar-light justify-content-end justify-content-md-between w-100">
                        <div class="profile-tabs d-flex justify-content-end flex-wrap mt-md-0 placeholder-glow">
                        </div>
                    </nav>
                </div>
            </div>

            <div class="card">
                <div class="card-body placeholder-glow">
                    <h4 class="mb-2 placeholder rounded col-6 col-lg-2"></h4>

                    <div class="row placeholder-glow">
                        <div class="col-12 col-sm-6 placeholder-glow">
                            <p class="placeholder col-12 rounded"></p>
                            <p class="placeholder col-12 rounded"></p>
                            <p class="placeholder col-12 rounded"></p>
                            <p class="placeholder col-12 rounded"></p>
                            <p class="placeholder col-12 rounded"></p>
                        </div>
                        <div class="col-12 col-sm-6">
                            <p class="placeholder col-12 rounded"></p>
                            <p class="placeholder col-12 rounded"></p>
                            <p class="placeholder col-12 rounded"></p>
                            <p class="placeholder col-12 rounded"></p>
                        </div>
                    </div>
                </div>
                <div class="card-body border-top placeholder-glow">
                    <h4 class="mb-2 placeholder col-6 col-sm-2 rounded"></h4>

                    <div class="row">
                        <div class="col-12 col-sm-6 placeholder-glow">
                            <p class="placeholder col-12 rounded"></p>
                            <p class="placeholder col-12 rounded"></p>
                            <p class="placeholder col-12 rounded"></p>
                            <p class="placeholder col-12 rounded"></p>
                        </div>
                        <div class="col-12 col-sm-6">
                            <p class="placeholder col-12 rounded"></p>
                            <p class="placeholder col-12 rounded"></p>
                            <p class="placeholder col-12 rounded"></p>
                        </div>
                    </div>
                </div>

                <div class="card-body placeholder-glow">
                    <h4 class="mb-2 placeholder rounded col-6 col-lg-2"></h4>

                    <div class="row placeholder-glow">
                        <div class="col-12 col-sm-6 placeholder-glow">
                            <p class="placeholder col-12 rounded"></p>
                            <p class="placeholder col-12 rounded"></p>
                        </div>
                        <div class="col-12 col-sm-6">
                            <p class="placeholder col-12 rounded"></p>
                            <p class="placeholder col-12 rounded"></p>
                        </div>
                    </div>
                </div>

                <div class="card-body border-top placeholder-glow">
                    <h4 class="mb-2 placeholder col-6 col-sm-2 rounded"></h4>

                    <div class="row">
                        <div class="col-12 col-sm-6 placeholder-glow">
                            <p class="placeholder col-12 rounded"></p>
                            <p class="placeholder col-12 rounded"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="content-body" id="content" style="display: none;">
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
                                    <x-link class="d-none" id="btnEditData" href="{{ route('student.personal.data') }}" color="success" withIcon="true">
                                        <x-tabler-pencil style="width: 14px; height: 14px;" />
                                        <span class="fw-bold">Edit Data</span>
                                    </x-link>
                                </div>
                            </nav>
                        </div>
                    </div>

                    {{-- personal data --}}
                    <div class="card">
                        {{-- data diri --}}
                        <div class="card-body px-lg-3 py-lg-2">
                            <h4 class="mb-2">Data Diri</h4>

                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <table class="table table-borderless">
                                        <x-three-row-info identifier="selfName" value="{{ session()->get('stu_name') }}" label="Nama Lengkap" />
                                        <x-three-row-info identifier="selfNisn" value="{{ session()->get('stu_nisn') }}" label="NISN" />
                                        <x-three-row-info identifier="selfNik" label="NIK" />
                                        <x-three-row-info identifier="selfOriginSchool" label="Asal Sekolah" />
                                        <x-three-row-info identifier="selfGender" label="Jenis Kelamin" />
                                    </table>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <table class="table table-borderless">
                                        <x-three-row-info identifier="selfBirthPlace" label="Tempat Lahir" />
                                        <x-three-row-info identifier="selfBirthDay" label="Tanggal Lahir" />
                                        <x-three-row-info identifier="selfPhoneNumber" label="Nomor Telepon" />
                                        <x-three-row-info identifier="selfEmail" label="Email" />
                                    </table>
                                </div>
                            </div>
                        </div>
                        {{-- /data diri --}}

                        {{-- data alamat --}}
                        <div class="card-body border-top px-lg-3 py-lg-2">
                            <h4 class="mb-2">Data Alamat</h4>

                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <table class="table table-borderless">
                                        <x-three-row-info identifier="selfProvince" label="Provinsi" />
                                        <x-three-row-info identifier="selfCity" label="Kabupaten / Kota" />
                                        <x-three-row-info identifier="selfSubDistrict" label="Kecamatan" />
                                        <x-three-row-info identifier="selfVillage" label="Desa / Kelurahan" />
                                    </table>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <table class="table table-borderless">
                                        <x-three-row-info identifier="selfHamlet" label="Dusun / Lingkungan" />
                                        <x-three-row-info identifier="selfRtRw" label="RT / RW" />
                                        <x-three-row-info identifier="selfAddress" label="Alamat Jalan" />
                                    </table>
                                </div>
                            </div>
                        </div>
                        {{-- /data alamat --}}

                        {{-- data orang tua --}}
                        <div class="card-body border-top px-lg-3 py-lg-2">
                            <h4 class="mb-2">Data Orang Tua</h4>

                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <table class="table table-borderless">
                                        <x-three-row-info identifier="selfMothersName" label="Nama Ibu Kandung" />
                                        <x-three-row-info identifier="selfMothersPhone" label="Nomor Telepon Ibu" />
                                    </table>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <table class="table table-borderless">
                                        <x-three-row-info identifier="selfFathersName" label="Nama Ayah" />
                                        <x-three-row-info identifier="selfFathersPhone" label="Nomor Telepon Ayah" />
                                    </table>
                                </div>
                            </div>
                        </div>
                        {{-- /data orang tua --}}

                        {{-- data wali --}}
                        <div class="card-body border-top px-lg-3 py-lg-2">
                            <h4 class="mb-2">Data Wali</h4>

                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <table class="table table-borderless">
                                        <x-three-row-info identifier="selfGuardsName" label="Nama Wali" />
                                        <x-three-row-info identifier="selfGuardsPhone" label="Nomor Telepon Wali" />
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

                                <x-link class="ms-auto d-none" id="btnEditScore" href="{{ route('student.personal.score', ['semester-1']) }}" color="success" withIcon="true">
                                    <x-tabler-pencil style="width: 14px; height: 14px;" />
                                    Edit Nilai
                                </x-link>
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
                                        <td class="py-2 text-center text-success"><span id="smt1Bid"><i class="text-black">Loading...</i></span></td>
                                        <td class="py-2 text-center text-success"><span id="smt2Bid"><i class="text-black">Loading...</i></span></td>
                                        <td class="py-2 text-center text-success"><span id="smt3Bid"><i class="text-black">Loading...</i></span></td>
                                        <td class="py-2 text-center text-success"><span id="smt4Bid"><i class="text-black">Loading...</i></span></td>
                                        <td class="py-2 text-center text-success"><span id="smt5Bid"><i class="text-black">Loading...</i></span></td>
                                    </tr>
                                    <tr>
                                        <td class="py-2">Bahasa Inggris</td>
                                        <td class="py-2 text-center text-success"><span id="smt1Big"><i class="text-black">Loading...</i></span></td>
                                        <td class="py-2 text-center text-success"><span id="smt2Big"><i class="text-black">Loading...</i></span></td>
                                        <td class="py-2 text-center text-success"><span id="smt3Big"><i class="text-black">Loading...</i></span></td>
                                        <td class="py-2 text-center text-success"><span id="smt4Big"><i class="text-black">Loading...</i></span></td>
                                        <td class="py-2 text-center text-success"><span id="smt5Big"><i class="text-black">Loading...</i></span></td>
                                    </tr>
                                    <tr>
                                        <td class="py-2">Matematika</td>
                                        <td class="py-2 text-center text-success"><span id="smt1Mtk"><i class="text-black">Loading...</i></span></td>
                                        <td class="py-2 text-center text-success"><span id="smt2Mtk"><i class="text-black">Loading...</i></span></td>
                                        <td class="py-2 text-center text-success"><span id="smt3Mtk"><i class="text-black">Loading...</i></span></td>
                                        <td class="py-2 text-center text-success"><span id="smt4Mtk"><i class="text-black">Loading...</i></span></td>
                                        <td class="py-2 text-center text-success"><span id="smt5Mtk"><i class="text-black">Loading...</i></span></td>
                                    </tr>
                                    <tr>
                                        <td class="py-2">Ilmu Pengetahuan Alam</td>
                                        <td class="py-2 text-center text-success"><span id="smt1Ipa"><i class="text-black">Loading...</i></span></td>
                                        <td class="py-2 text-center text-success"><span id="smt2Ipa"><i class="text-black">Loading...</i></span></td>
                                        <td class="py-2 text-center text-success"><span id="smt3Ipa"><i class="text-black">Loading...</i></span></td>
                                        <td class="py-2 text-center text-success"><span id="smt4Ipa"><i class="text-black">Loading...</i></span></td>
                                        <td class="py-2 text-center text-success"><span id="smt5Ipa"><i class="text-black">Loading...</i></span></td>
                                    </tr>
                                    <tr>
                                        <td class="py-2">Ilmu Pengetahuan Sosial</td>
                                        <td class="py-2 text-center text-success"><span id="smt1Ips"><i class="text-black">Loading...</i></span></td>
                                        <td class="py-2 text-center text-success"><span id="smt2Ips"><i class="text-black">Loading...</i></span></td>
                                        <td class="py-2 text-center text-success"><span id="smt3Ips"><i class="text-black">Loading...</i></span></td>
                                        <td class="py-2 text-center text-success"><span id="smt4Ips"><i class="text-black">Loading...</i></span></td>
                                        <td class="py-2 text-center text-success"><span id="smt5Ips"><i class="text-black">Loading...</i></span></td>
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
                                                <form id="lockDataForm" action="{{ route('student.personal.lock-data') }}" method="post">
                                                    @csrf
                                                    <div class="d-none" id="alertBeforeLock">
                                                        <div class="alert alert-warning p-1">
                                                            <div class="d-flex justify-content-center">
                                                                <x-tabler-alert-triangle-filled />
                                                            </div>
                                                            <p class="text-center">Pastikan bahwa nilai rapor telah terisi.</p>
                                                        </div>
                                                    </div>
                                                    <div class="alert alert-danger p-1">
                                                        Data yang sudah dikunci tidak dapat diubah kembali. Pastikan data kamu sudah benar sebelum mengunci data.
                                                    </div>

                                                    <x-button class="float-end mb-1" type="submit" color="danger" withIcon="true"><x-tabler-lock-access style="width: 16px; height: 16px;" />
                                                        Kunci Data
                                                    </x-button>
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
    {{-- <script src="/js/student/pages/dashboard/index-v1.0.7.js"></script> --}}
    <script>
        $(function() {
            'use strict';

            var loader = $('#loader'),
                content = $('#content'),
                firstTimeLoginForm = $('#ftlForm'),
                lockDataCheckbox = $('#lockCheck'),
                lockDataBtn = $('#lockCheckBtn'),
                alertBeforeLock = $('#alertBeforeLock'),
                allData = {};

            //------------------------------------------------------------INIT
            // jQuery Validation
            if (firstTimeLoginForm.length) {
                firstTimeLoginForm.validate({
                    rules: {
                        ftlEmail: {
                            required: true,
                            email: true
                        },
                        ftlPhoneNumber: {
                            required: true,
                            digits: true,
                            rangelength: [10, 13]
                        },
                        ftlNewPassword: {
                            required: true,
                            minlength: 6
                        },
                        ftlConfirmPassword: {
                            required: true,
                            minlength: 6,
                            equalTo: "#ftlNewPassword"
                        }
                    },
                    messages: {
                        ftlEmail: {
                            required: "*Bidang ini harus diisi.",
                            email: "*Mohon masukkan alamat email yang valid."
                        },
                        ftlPhoneNumber: {
                            required: "*Bidang ini harus diisi.",
                            digits: "*Mohon masukkan nomor telepon yang valid.",
                            rangelength: "*Mohon masukkan nomor telepon yang valid."
                        },
                        ftlNewPassword: {
                            required: "*Bidang ini harus diisi.",
                            minlength: "*Mohon masukkan minimal 6 karakter."
                        },
                        ftlConfirmPassword: {
                            required: "*Bidang ini harus diisi.",
                            minlength: "*Mohon masukkan minimal 6 karakter.",
                            equalTo: "*Ulangi kata sandi harus sama dengan kata sandi baru."
                        },
                    }
                });
            }

            // Lock Data
            lockDataCheckbox.click(function() {
                lockDataBtn.prop('disabled', !lockDataCheckbox.is(":checked"));
            });

            lockDataBtn.click(function() {
                console.log(allData);
                if (!isDataComplete(allData)) {
                    alertBeforeLock.removeClass('d-none');
                } else {
                    alertBeforeLock.addClass('d-none');
                }
            });

            //------------------------------------------------------------CALL
            getData();

            getScore();

            //------------------------------------------------------------FUNC
            function getData() {
                $.ajax({
                    url: "/json/get-data-pribadi-siswa",
                    method: 'get',
                    dataType: 'json',
                    success: function(data) {
                        let d = data.data;

                        let check = {
                            'jenis_kelamin': d.jenis_kelamin,
                            'tempat_lahir': d.tempat_lahir,
                            'tanggal_lahir': d.tanggal_lahir,
                            'telepon': d.telepon,
                            'kecamatan': d.kecamatan
                        };
                        Object.assign(allData, check);

                        if (d.pertama_login == 't' && d.kunci == '0') {
                            $('#btnEditData, #btnEditScore, #cardLock').removeClass("d-none");
                        } else if (d.pertama_login == 'y') {
                            $('#firstTimeLoginModal').modal('show');
                        }

                        $('#profileImage').attr('src', d.pasfoto || '/img/base-profile.png'); // profile image
                        $('#selfNik').text(d.nik); // personal's data
                        $('#selfOriginSchool').text(d.sekolah_asal);
                        $('#selfGender').text((d.jenis_kelamin == 'l') ? 'Laki-laki' : 'Perempuan');
                        $('#selfBirthPlace').text(d.tempat_lahir);
                        $('#selfBirthDay').text(d.tanggal_lahir);
                        $('#selfPhoneNumber').text(d.telepon);
                        $('#selfEmail').text(d.email);
                        $('#selfProvince').text(d.provinsi); // address's data
                        $('#selfCity').text(d.kabupaten);
                        $('#selfSubDistrict').text(d.kecamatan);
                        $('#selfVillage').text(d.desa);
                        $('#selfHamlet').text(d.dusun);
                        $('#selfRtRw').text(d.rtrw);
                        $('#selfAddress').text(d.alamat_jalan);
                        $('#selfMothersName').text(d.nama_ibu); // parent's data
                        $('#selfMothersPhone').text(d.telepon_ibu == '0' ? '-' : d.telepon_ibu);
                        $('#selfFathersName').text(d.nama_ayah);
                        $('#selfFathersPhone').text(d.telepon_ayah == '0' ? '-' : d.telepon_ayah);
                        $('#selfGuardsName').text(d.nama_wali);
                        $('#selfGuardsPhone').text(d.telepon_wali);

                        // hide load
                        loader.hide();
                        content.show();
                    },
                    error: function(x, s, e) {
                        console.error("gagal mendapatkan data.", s, e);
                        $('#loader, #content').hide();
                        $('#error-section').show();
                    }
                });
            }

            function getScore() {
                $.ajax({
                    url: "/json/get-data-nilai-siswa",
                    method: 'get',
                    dataType: 'json',
                    success: function(score) {
                        if (score.statusCode == 200) {
                            let s = score.data;
                            let check = Object.fromEntries(
                                Object.entries(s).map(([key, value]) => [key, value === 0 ? null : value])
                            );
    
                            Object.assign(allData, check)
                            for (let i = 1; i <= 5; i++) {
                                $(`#smt${i}Bid`).text(s[`sm${i}_bid`]);
                                $(`#smt${i}Big`).text(s[`sm${i}_big`]);
                                $(`#smt${i}Mtk`).text(s[`sm${i}_mtk`]);
                                $(`#smt${i}Ipa`).text(s[`sm${i}_ipa`]);
                                $(`#smt${i}Ips`).text(s[`sm${i}_ips`]);
                            }
                        } else if (score.statusCode == 400) {
                            Object.assign(allData, {'score': null})
                            for (let i = 1; i <= 5; i++) {
                                $(`#smt${i}Bid`).text(0);
                                $(`#smt${i}Big`).text(0);
                                $(`#smt${i}Mtk`).text(0);
                                $(`#smt${i}Ipa`).text(0);
                                $(`#smt${i}Ips`).text(0);
                            }
                        }
                    },
                    error: function(x, s, e) {
                        console.error('gagal mendapatkan data.', s, e);
                        let check = {
                            score: null
                        };
                        Object.assign(allData, check);
                    }
                });
            }

            function isDataComplete(data) {
                for (var key in data) {
                    if (data[key] === null || data[key] === '-') {
                        return false; // Jika ada nilai yang belum terisi
                    }
                }
                return true;
            }
        });
    </script>
@endpush
