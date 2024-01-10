@extends('layouts.has-role.auth', ['title' => "Detail Siswa"])

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
                    <h2 class="content-header-title float-start mb-0">Akun Siswa</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('siswa.index') }}">
                                    Akun Siswa
                                </a>
                            </li>
                            <li class="breadcrumb-item active">
                                Detail Siswa
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (session()->get('msg'))
        <div class="alert alert-danger p-1">
            <p class="mb-0 text-center">{{ session()->get('msg') }}</p>
        </div>
    @endif

    <div class="content-body">
        {{-- <div id="user-profile">
            <div class="row">
                <div class="col-12">
                    <div class="card profile-header mb-2">
                        <!-- profile cover photo -->
                        <img class="card-img-top" src="{{ Storage::url('images/static/sampul-detail-sekolah.png') }}" alt="Sampul Detail Sekolah" />
                        <!--/ profile cover photo -->
                        <div class="position-relative">
                            <!-- profile picture -->
                            <div class="profile-img-container d-flex align-items-center">
                                <div class="profile-img">
                                    <img class="rounded img-fluid" src="{{ Storage::url('images/static/profil-siswa.png') }}" alt="Profil Siswa" />
                                </div>
                                <!-- profile title -->
                            </div>
                        </div>
                        <!-- tabs pill -->
                        <div class="profile-header-nav">
                            <!-- navbar -->
                            <nav class="navbar navbar-expand-md navbar-light justify-content-end justify-content-md-between w-100">
                                <!-- collapse  -->
                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <div class="profile-tabs d-flex justify-content-end align-items-center flex-wrap mt-1 mt-md-0">
                                        <div>
                                            <a class="btn btn-success mb-2" href="{{ route('siswa.edit', $id) }}">
                                                <x-tabler-pencil />
                                                Edit Data
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
        </div> --}}
        <div class="card">
            <div class="card-body px-0">
                <section id="data-diri" class="px-2">
                    <div class="d-flex align-items-center">
                        <h4 class="text-primary">Data Diri</h4>

                        <x-link class="ms-auto" href="{{ route('siswa.edit', [$id]) }}" color="success">
                            <x-tabler-pencil style="width: 1rem; height: 1rem;" />
                            Edit Data
                        </x-link>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <table class="table table-borderless">
                                <x-three-row-info label="Nama Lengkap" identifier="fullname" />

                                <x-three-row-info label="NISN" identifier="nisn" />
                                
                                <x-three-row-info label="NIK" identifier="nik" />
                                
                                <x-three-row-info label="Asal Sekolah" identifier="origin_school" />
                                
                                <x-three-row-info label="Jenis Kelamin" identifier="gender" />
                                
                            </table>
                        </div>
                        <div class="col-sm-6">
                            <table class="table table-borderless">
                                <x-three-row-info label="Tempat Lahir" identifier="birth_place" />
                                
                                <x-three-row-info label="Tanggal Lahir" identifier="birth_day" />
                                
                                <x-three-row-info label="Nomor HP" identifier="phone" />
                                
                                <x-three-row-info label="Email" identifier="email" />
                            </table>
                        </div>
                    </div>
                </section>
                <x-separator marginY="3" />
                <section id="data-alamat">
                    <h4 class="text-primary" style="margin-left: 2rem; margin-top: 1.5rem">Data Alamat</h4>
                    <div class="row">
                        <div class="col-sm-6">
                            <table class="table table-borderless">
                                <x-three-row-info label="Provinsi" identifier="province" />

                                <x-three-row-info label="Kabupaten / kota" identifier="city" />
                                
                                <x-three-row-info label="Kecamatan" identifier="district" />
                                
                                <x-three-row-info label="Desa / Kelurahan" identifier="village" />
                            </table>
                        </div>
                        <div class="col-sm-6">
                            <table class="table table-borderless">
                                <x-three-row-info label="Dusun / Lingkungan" identifier="hamlet" />

                                <x-three-row-info label="RT / RW" identifier="rtrw" />
                                
                                <x-three-row-info label="Alamat Jalan" identifier="address" />
                            </table>
                        </div>
                    </div>
                </section>
                <x-separator marginY="3" />
                <section id="data-orang-tua">
                    <h4 class="text-primary" style="margin-left: 2rem; margin-top: 1.5rem">Data Orang Tua</h4>
                    <div class="row">
                        <div class="col-sm-6">
                            <table class="table table-borderless">
                                <x-three-row-info label="Nama Ibu Kandung" identifier="mother_name" />
                            
                                <x-three-row-info label="Nomor HP" identifier="mother_phone" />
                                </tr>
                            </table>
                        </div>
                        <div class="col-sm-6">
                            <table class="table table-borderless">
                                <x-three-row-info label="Nama Ayah" identifier="father_name" />
                                
                                <x-three-row-info label="Nomor HP" identifier="father_phone" />
                            </table>
                        </div>
                    </div>
                </section>
                <x-separator marginY="3" />
                <section id="data-orang-tua">
                    <h4 class="text-primary" style="margin-left: 2rem; margin-top: 1.5rem">Data Wali</h4>
                    <div class="row">
                        <div class="col-sm-6">
                            <table class="table table-borderless">
                                <x-three-row-info label="Nama Wali" identifier="guard_name" />
                                
                                <x-three-row-info label="Nomor HP" identifier="guard_phone" />
                            </table>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <div class="card">
            <div class="card-body px-0">
                <section id="data-nilai-rapor">
                    <div class="d-flex align-items-center justify-content-between px-2 mb-2">
                        <h4 class="text-primary mb-0">Data Nilai Rapor</h4>
                        <x-link href="{{ route('siswa.score', [$id, 'semester-1']) }}" color="success">
                            <x-tabler-pencil style="width: 1rem; height: 1rem;" /> 
                            Edit Nilai
                        </x-link>
                    </div>
                    <div>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Mata Pelajaran</th>
                                    <th class="text-center">Semester 1</th>
                                    <th class="text-center">Semester 2</th>
                                    <th class="text-center">Semester 3</th>
                                    <th class="text-center">Semester 4</th>
                                    <th class="text-center">Semester 5</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="py-2">Bahasa Indonesia</td>
                                    <td class="text-success text-center" id="bid1">0</td>
                                    <td class="text-success text-center" id="bid2">0</td>
                                    <td class="text-success text-center" id="bid3">0</td>
                                    <td class="text-success text-center" id="bid4">0</td>
                                    <td class="text-success text-center" id="bid5">0</td>
                                </tr>
                                <tr>
                                    <td class="py-2">Bahasa Inggris</td>
                                    <td class="text-success text-center" id="big1">0</td>
                                    <td class="text-success text-center" id="big2">0</td>
                                    <td class="text-success text-center" id="big3">0</td>
                                    <td class="text-success text-center" id="big4">0</td>
                                    <td class="text-success text-center" id="big5">0</td>
                                </tr>
                                <tr>
                                    <td class="py-2">Matematika</td>
                                    <td class="text-success text-center" id="mtk1">0</td>
                                    <td class="text-success text-center" id="mtk2">0</td>
                                    <td class="text-success text-center" id="mtk3">0</td>
                                    <td class="text-success text-center" id="mtk4">0</td>
                                    <td class="text-success text-center" id="mtk5">0</td>
                                </tr>
                                <tr>
                                    <td class="py-2">Ilmu Pengetahuan Alam (IPA)</td>
                                    <td class="text-success text-center" id="ipa1">0</td>
                                    <td class="text-success text-center" id="ipa2">0</td>
                                    <td class="text-success text-center" id="ipa3">0</td>
                                    <td class="text-success text-center" id="ipa4">0</td>
                                    <td class="text-success text-center" id="ipa5">0</td>
                                </tr>
                                <tr>
                                    <td class="py-2">Ilmu Pengetahuan Sosial (IPS)</td>
                                    <td class="text-success text-center" id="ips1">0</td>
                                    <td class="text-success text-center" id="ips2">0</td>
                                    <td class="text-success text-center" id="ips3">0</td>
                                    <td class="text-success text-center" id="ips4">0</td>
                                    <td class="text-success text-center" id="ips5">0</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </section>
            </div>
        </div>
        {{-- <div class="card">
            <div class="card-body">
                <section id="kunci-data-diri" style="margin: 1.5rem 2rem;">
                    <h4>Kunci Data Diri</h4>
                    <div class="alert alert-danger alert-dismissible fade show my-2" role="alert">
                        <div class="alert-body p-2">
                            <span>Apakah anda yakin ingin mengunci data diri? Data diri yang sudah dikunci tidak dapat diubah
                                kembali, Periksa kembali data kamu dan pastikan semuanya benar sebelum mengunci.</span>
                        </div>
                    </div>
                    <x-checkbox class="form-check-danger" identifier="confirmation" label="Saya yakin untuk mengunci data diri saya" variant="danger" />
                    <x-button class="mt-2" data-bs-toggle="modal" data-bs-target="#modal-kunci-data-diri" type="button" color="danger">Kunci Data Diri</x-button>
                    <x-modal modal_id="modal-kunci-data-diri" label_by="modalKunciDataDiri">
                        <x-modal.header>
                            <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
                        </x-modal.header>
                        <x-modal.body>
                            <h5 class="text-center mt-2">Kunci Data Diri</h5>
                            <p>Apakah Anda yakin ingin mengunci data diri? Data yang sudah di kunci tidak bisa di edit kembali</p>
                        </x-modal.body>
                        <x-modal.footer class="justify-content-center mb-3">
                            <x-button color="danger">Ya, Kunci</x-button>
                            <x-button data-bs-dismiss="modal" color="secondary">Batalkan</x-button>
                        </x-modal.footer>
                    </x-modal>
                </section>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <section id="hapus-data-siswa" style="margin: 1.5rem 2rem;">
                    <h4>Hapus Data Siswa</h4>
                    <div class="alert alert-warning alert-dismissible fade show my-2" role="alert">
                        <div class="alert-body p-2">
                            <span>Apakah anda yakin ingin menghapus data Siswa ini?</span>
                        </div>
                    </div>
                    <x-checkbox class="form-check-danger" identifier="confirmation" label="Saya yakin untuk menghapus data siswa ini" variant="warning" />
                    <x-button class="mt-2" data-bs-toggle="modal" data-bs-target="#modal-hapus-data-siswa" type="button" color="danger">Hapus Data User</x-button>
                    <x-modal modal_id="modal-hapus-data-siswa" label_by="modalHapusDataSiswa">
                        <x-modal.header>
                            <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
                        </x-modal.header>
                        <x-modal.body>
                            <h5 class="text-center mt-2">Hapus Data Siswa</h5>
                            <p>Apakah Anda yakin ingin menghapus data siswa ini? Data yang sudah di hapus tidak bisa di kembalikan kembali</p>
                        </x-modal.body>
                        <x-modal.footer class="justify-content-center mb-3">
                            <x-button color="danger">Ya, Hapus</x-button>
                            <x-button data-bs-dismiss="modal" color="secondary">Batalkan</x-button>
                        </x-modal.footer>
                    </x-modal>
                </section>
            </div>
        </div> --}}
    </div>
@endsection

@push('scripts')
    <script>
        var id = "{{ $id }}";
    </script>
    <script>
        $(function() {
            'use strict';

            var months = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];

            getData();
            getGrade();

            function getData() {
                $.ajax({
                    url: `/panel/siswa/json/get-single/${id}`,
                    method: 'get',
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        let tl = new Date(data.tanggal_lahir);

                        $('#fullname').text(data.nama);
                        $('#nisn').text(data.nisn);
                        $('#nik').text(data.nik || '-');
                        $('#origin_school').text(data.sekolah_asal);

                        $('#gender').text(data.jenis_kelamin == 'p' ? 'Perempuan' : (data.jenis_kelamin == 'l' ? "Laki-laki" : "-"));
                        $('#birth_place').text(data.tempat_lahir || '-');
                        $('#birth_day').text(`${tl.getDate()} ${months[tl.getMonth()]} ${tl.getFullYear()}`);
                        $('#phone').text(data.telepon || '-');
                        $('#email').text(data.email || '-');
                        $('#province').text(data.provinsi || '-');
                        $('#city').text(data.kabupaten || '-');
                        $('#district').text(data.kecamatan || '-');
                        $('#village').text(data.desa || '-');
                        $('#hamlet').text(data.dusun || '-');
                        $('#rtrw').text(data.rtrw || '-');
                        $('#address').text(data.alamat_jalan || '-');

                        $('#mother_name').text(data.nama_ibu || '-');
                        $('#mother_phone').text(data.telepon_ibu || '-');
                        $('#father_name').text(data.nama_ayah || '-');
                        $('#father_phone').text(data.telepon_ayah || '-');
                        $('#guard_name').text(data.nama_wali || '-');
                        $('#guard_phone').text(data.telepon_wali || '-');
                    },
                    error: function(xhr, status, error) {
                        console.error('gagal mendapatkan data.', status, error);
                    }
                });
            }

            function getGrade() {
                $.ajax({
                    url: `/panel/siswa/json/get-grades/${id}`,
                    method: 'get',
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);

                        for (let i = 1; i <= 5; i++) {
                            $(`#bid${i}`).text(data[`sm${i}_bid`]);
                            $(`#big${i}`).text(data[`sm${i}_big`]);
                            $(`#mtk${i}`).text(data[`sm${i}_mtk`]);
                            $(`#ipa${i}`).text(data[`sm${i}_ipa`]);
                            $(`#ips${i}`).text(data[`sm${i}_ips`]);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('gagal mendapatkan data.', status, error);
                    }
                });
            }
        });
    </script>
@endpush