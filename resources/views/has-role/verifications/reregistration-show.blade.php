@extends('layouts.has-role.auth', ['title' => "Detail {$registrant->name}"])

@section('styles')
    <link type="text/css" href="/app-assets/css/pages/page-profile.css" rel="stylesheet">
@endsection

@push('scripts')
    <script src="/app-assets/js/scripts/pages/page-profile.js"></script>
@endpush

@section('content')
    <div class="content-body">
        <section id="user-profile">
            <div class="row">
                <div class="col-12">
                    <div class="card profile-header mb-2">
                        <img class="card-img-top" src="{{ Storage::url('images/static/sampul-detail-sekolah.png') }}" alt="Sampul Detail Sekolah" />
                        <div class="position-relative" style="margin-bottom: 80px">
                            <div class="profile-img-container d-flex align-items-center">
                                <div class="profile-img">
                                    <img class="rounded img-fluid" src="{{ Storage::url('images/static/profil-siswa.png') }}" alt="Profil Siswa" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="data-pendaftar">
            <div class="card">
                <div class="card-header border">
                    <div class="card-title fw-bold">Pendaftaran Ulang SMA</div>
                </div>
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
                                </table>
                            </div>
                            <div class="col-sm-6">
                                <table class="table table-borderless">
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
                        </div>
                    </section>
                    <x-separator marginY="2" />
                    <section id="informasi-pendaftaran">
                        <h4 class="text-primary" style="margin-left: 2rem; margin-top: 1.5rem">Pendaftaran</h4>
                        <div class="row">
                            <div class="col-sm-6">
                                <table class="table table-borderless">
                                    <tr>
                                        <td>Jalur Pendaftaran</td>
                                        <td>:</td>
                                        <td>Jalur Afirmasi</td>
                                    </tr>
                                    @if ($registrant->unit === 'SMK')
                                        <tr>
                                            <td>Jurusan</td>
                                            <td>:</td>
                                            <td>Teknik Kendaraan Ringan</td>
                                        </tr>
                                    @endif
                                </table>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </section>
        <section id="konfirmasi-verifikasi-daftar-ulang">
            <div class="card">
                <div class="card-body">
                    <section id="verifikasi-daftar-ulang" style="margin: 1.5rem 2rem;">
                        <h4>Verifikasi Daftar Ulang</h4>
                        <div class="alert alert-primary alert-dismissible fade show my-2" role="alert">
                            <div class="alert-body p-2">
                                <span>Data yang telah diverifikasi tidak dapat diubah kembali</span>
                            </div>
                        </div>
                        <x-button data-bs-toggle="modal" data-bs-target="#modal-verifikasi-daftar-ulang" type="button" color="success">Verifikasi Daftar Ulang Siswa</x-button>
                        <x-modal modal_id="modal-verifikasi-daftar-ulang" label_by="modalKonfirmasiVerifikasiDaftarUlang">
                            <x-modal.header>
                                <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
                            </x-modal.header>
                            <x-modal.body>
                                <h5 class="text-center mt-2">Verifikasi Daftar Ulang</h5>
                                <p>Apakah Anda yakin ingin memverifikasi ulang siswa ini? Data yang sudah di kunci tidak bisa di edit kembali</p>
                            </x-modal.body>
                            <x-modal.footer class="justify-content-center mb-3">
                                <x-button color="success">Verifikasi</x-button>
                                <x-button data-bs-dismiss="modal" color="secondary">Batalkan</x-button>
                            </x-modal.footer>
                        </x-modal>
                    </section>
                </div>
            </div>
        </section>
    </div>
@endsection
