@extends('layouts.has-role.auth', ['title' => "Detail {$student->name}"])

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
                                            <a class="btn btn-success mb-2" href="{{ route('siswa.edit', $student->username) }}">
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
        </div>
        <div class="card">
            <div class="card-body">
                <section id="data-diri">
                    <h4 class="text-primary" style="margin-left: 2rem; margin-top: 1.5rem">Data Diri</h4>
                    <div class="row">
                        <div class="col-sm-6">
                            <table class="table table-borderless">
                                <tr>
                                    <td>Nama Lengkap</td>
                                    <td>:</td>
                                    <td>Nadya Khietna Putri</td>
                                </tr>
                                <tr>
                                    <td>NISN</td>
                                    <td>:</td>
                                    <td>12345678909</td>
                                </tr>
                                <tr>
                                    <td>NIK</td>
                                    <td>:</td>
                                    <td>727201234567890</td>
                                </tr>
                                <tr>
                                    <td>Asal Sekolah</td>
                                    <td>:</td>
                                    <td>SMPN 8 Parepare</td>
                                </tr>
                                <tr>
                                    <td>Jenis</td>
                                    <td>:</td>
                                    <td>Perempuan</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-sm-6">
                            <table class="table table-borderless">
                                <tr>
                                    <td>Tempat Lahir</td>
                                    <td>:</td>
                                    <td>Parepare</td>
                                </tr>
                                <tr>
                                    <td>Tanggal Lahir</td>
                                    <td>:</td>
                                    <td>1 Januari 2001</td>
                                </tr>
                                <tr>
                                    <td>Nomor HP</td>
                                    <td>:</td>
                                    <td>081234567890</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>:</td>
                                    <td>nadya.putri@gmail.com</td>
                                </tr>
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
                                <tr>
                                    <td>Kabupaten kota</td>
                                    <td>:</td>
                                    <td>Kota Parepare</td>
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
                                    <td>Dusun / Lingkungan</td>
                                    <td>:</td>
                                    <td>-</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-sm-6">
                            <table class="table table-borderless">
                                <tr>
                                    <td>RT / RW</td>
                                    <td>:</td>
                                    <td>001 / 002</td>
                                </tr>
                                <tr>
                                    <td>Alamat Jalan</td>
                                    <td>:</td>
                                    <td>BTN Indah Permai 2</td>
                                </tr>
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
                                <tr>
                                    <td>Nama Ibu Kandung</td>
                                    <td>:</td>
                                    <td>Sukriani</td>
                                </tr>
                                <tr>
                                    <td>Pekerjaan</td>
                                    <td>:</td>
                                    <td>IRT</td>
                                </tr>
                                <tr>
                                    <td>Penghasilan</td>
                                    <td>:</td>
                                    <td>
                                        < Rp.500.000</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-sm-6">
                            <table class="table table-borderless">
                                <tr>
                                    <td>Nama Ayah</td>
                                    <td>:</td>
                                    <td>Ryan Rafli</td>
                                </tr>
                                <tr>
                                    <td>Pekerjaan</td>
                                    <td>:</td>
                                    <td>TNI</td>
                                </tr>
                                <tr>
                                    <td>Penghasilan</td>
                                    <td>:</td>
                                    <td>> Rp.100.000.000</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </section>
                <x-separator marginY="3" />
                <section id="data-orang-tua">
                    <h4 class="text-primary" style="margin-left: 2rem; margin-top: 1.5rem">Data Orang Tua Wali (Opsional)</h4>
                    <div class="row">
                        <div class="col-sm-6">
                            <table class="table table-borderless">
                                <tr>
                                    <td>Nama Wali</td>
                                    <td>:</td>
                                    <td>-</td>
                                </tr>
                                <tr>
                                    <td>Pekerjaan</td>
                                    <td>:</td>
                                    <td>-</td>
                                </tr>
                                <tr>
                                    <td>Penghasilan</td>
                                    <td>:</td>
                                    <td>-</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <section id="data-nilai-rapor">
                    <div class="d-flex align-items-center justify-content-between" style="margin-left: 2rem; margin-top: 1.5rem; margin-bottom: 1.5rem">
                        <h4 class="text-primary">Data Nilai Rapor</h4>
                        <a class="btn btn-success" href="#">
                            Edit Nilai
                        </a>
                    </div>
                    <div>
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <td>Mata Pelajaran</td>
                                    <td class="text-center">Semester 1</td>
                                    <td class="text-center">Semester 2</td>
                                    <td class="text-center">Semester 3</td>
                                    <td class="text-center">Semester 4</td>
                                    <td class="text-center">Semester 5</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($grades as $item)
                                    <tr>
                                        <td>{{ $item->mata_pelajaran }}</td>
                                        <td class="text-success text-center">{{ $item->semester_1 }}</td>
                                        <td class="text-success text-center">{{ $item->semester_2 }}</td>
                                        <td class="text-success text-center">{{ $item->semester_3 }}</td>
                                        <td class="text-success text-center">{{ $item->semester_4 }}</td>
                                        <td class="text-success text-center">{{ $item->semester_5 }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </section>
            </div>
        </div>
        <div class="card">
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
        </div>
    </div>
@endsection
