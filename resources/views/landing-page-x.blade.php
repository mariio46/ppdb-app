@extends('layouts.base-landing')

@section('x-content')
<div id="content">
    <section class="vh-100 pt-5 px-xl-5 bg-white" id="banner">
        <div class="row h-100 px-5 justify-content-center">
            <div class="col-xl-6 col-12 d-flex align-items-center">
                <div>
                    <p class="banner-title fw-bolder">PPDB Online <span class="text-primary fw-normal">2024</span></p>
                    <p class="banner-title fw-bolder">Sulawesi Selatan</p>
                    <p class="fs-5 text-secondary mb-5">Penerimaan Peserta Didik Baru Tahun Ajaran 2024/2025 Provinsi Sulawesi Selatan</p>
                    <div class="row align-items-center">
                        <div class="col-md-auto col-12 me-md-5">
                            <a class="btnx btnx-success btn-lg py-2 px-5 fs-6 shadow" href="{{ route('student.masuk') }}">Masuk ke Akun</a>
                        </div>
                        <div class="col-md-auto col-12">
                            <a class="text-decoration-none text-secondary cursor-pointer" href="#uye">
                                <span class="d-flex align-items-center">
                                    <span class="shadow-lg p-2 rounded-pill">
                                        <x-tabler-player-play-filled class="text-danger" />
                                    </span>
                                    <span class="mb-0 ms-1">Tata cara pendaftaran</span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-5 col-12 d-none d-xl-flex align-items-center justify-content-end par-x">
                <div class="par-container">
                    <img class="par-img" data-value="2" src="/img/par-arrow.png" alt="banner">
                    <img class="par-img" data-value="5" src="/img/par-girl.png" alt="banner">
                    <img class="par-img" data-value="12" src="/img/par-text.png" alt="banner">
                </div>
            </div>
        </div>
    </section>

    <section class="p-5" id="jadwal">
        <div class="px-xl-5 pt-5">
            <div class="d-flex align-items-end px-xl-5">
                <div>
                    <p class="text-success mb-0">LIHAT DETAIL</p>
                    <h1 class="fw-bolder">Jadwal Penerimaan</h1>
                    <p class="text-muted mb-0">Geser untuk melihat detail jadwal penerimaan per tahap.</p>
                </div>
                <div class="ms-auto">
                    <button class="btn-rounded btn-rounded-white btn-rounded-previous shadow shadow-lg me-2"><x-tabler-arrow-left /></button>
                    <button class="btn-rounded btn-rounded-success btn-rounded-next shadow shadow-lg text-white"><x-tabler-arrow-right /></button>
                </div>
            </div>

            <div class="card mt-2 p-lg-3 px-xl-5">
                <div class="card-body">
                    <h2 class="mb-2 px-xl-2">Tahap 1</h2>

                    <p class="px-xl-2 ">SMA : Jalur Boarding School</p>
                    <p class="px-xl-2 mb-3">SMK : Jalur Afirmasi, Perpindahan tugas orang tua/wali, Jalur anak guru, Jalur anak DUDI mitra SMK, Jalur prestasi Non Akademik dan Jalur Domisili terdekat dari sekolah</p>

                    <div class="container">
                        <div class="timeline">
                            <div class="timeline-item">
                                <span class="timeline-point timeline-point-indicator"></span>
                                <div class="timeline-event">
                                    <div class="d-md-flex align-items-center d-block border-bottom">
                                        <h4 class="">Pendaftaran</h4>
                                        <h4 class="mb-0 ms-auto">20 - 25 Juni 2024</h4>
                                    </div>
                                    <div class="">
                                        <p class="pt-1 ps-1">Calon peserta didik melakukan pendaftaran melalui laman PPBD Sulawesi Selatan Tahun 2024.</p>
                                        <a href="" class="btn btn-flat-success">Daftar Disini</a>
                                    </div>
                                </div>
                            </div>
                            <div class="timeline-item">
                                <span class="timeline-point timeline-point-indicator"></span>
                                <div class="timeline-event">
                                    <div class="d-md-flex align-items-center d-block border-bottom">
                                        <h4 class="">Verifikasi dan Validasi</h4>
                                        <h4 class="mb-0 ms-auto">20 - 25 Juni 2024</h4>
                                    </div>
                                    <div class="timeline-body">
                                        <p class="pt-1 ps-1">Sekolah melakukan verifikasi dan validasi data calon peserta didik.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="timeline-item">
                                <span class="timeline-point timeline-point-indicator"></span>
                                <div class="timeline-event">
                                    <div class="d-md-flex align-items-center d-block border-bottom">
                                        <h4 class="">Pengumuman</h4>
                                        <h4 class="mb-0 ms-auto">26 Juni 2024</h4>
                                    </div>
                                    <div class="timeline-body">
                                        <p class="pt-1 ps-1">Calon peserta didik dapat melihat pengumuman melalui laman PPBD Sulawesi Selatan 2024.</p>
                                        <a href="" class="btn btn-flat-success">Lihat Pengumuman disini</a>
                                    </div>
                                </div>
                            </div>
                            <div class="timeline-item">
                                <span class="timeline-point timeline-point-indicator"></span>
                                <div class="timeline-event">
                                    <div class="d-md-flex align-items-center d-block border-bottom">
                                        <h4 class="">Daftar Ulang</h4>
                                        <h4 class="mb-0 ms-auto">27 - 28 Juni 2024</h4>
                                    </div>
                                    <div class="timeline-body">
                                        <p class="pt-1 ps-1">Calon perserta didik melakukan Daftar Ulang.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 px-xl-5 bg-white" id="aduan">
        <div class="row h-100 px-5 justify-content-center">
            <div class="col-xl-6 col-12 d-none d-xl-flex align-items-center justify-content-end par-x">
                <div class="par-container">
                    <img class="par-img" data-value="2" src="/img/par-arrow-2.png" alt="banner">
                    <img class="par-img" data-value="5" src="/img/par-girl-2.png" alt="banner">
                    <img class="par-img" data-value="12" src="/img/par-text-2.png" alt="banner">
                </div>
            </div>
            <div class="col-xl-4 col-12 d-flex align-items-center">
                <div>
                    <p class="text-hijau">MENGALAMI MASALAH?</p>
                    <h1 class="fw-bolder mb-4" style="font-size: 3rem;">Pengaduan PPDB online 2024</h1>
                    <p class="text-muted mb-5">Jika kamu mengalami masalah terkait PPDB Online silahkan membuat pengaduan.</p>

                    <a href="" class="btnx btnx-utama px-5 py-2">Buat Pengaduan</a>
                </div>
            </div>
        </div>
    </section>

    <section id="pengumuman">
        <div class="px-md-5 px-3 h-100 row align-items-center justify-content-center">
            <div class="card border-0 p-0" style="border-radius: 10%;">
                <div class="card-body">
                    <div class="row align-items-center h-100 px-md-5 px-3">
                        <div class="col-md-6 col-auto">
                            <h3 class="text-white">Lihat Pengumuman PPDB Sulawesi Selatan Tahun Pelajaran 2024/2025</h3>
                        </div>

                        <div class="col-md-6 col-auto d-flex justify-content-end">
                            <a href="" class="btnx btnx-warning text-end py-2 px-xl-5 px-3">Lihat Pengumuman</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 px-xl-5 bg-white" id="cabdin">
        <div class="row h-100 px-5 justify-content-center">
            <div class="col-xl-3 col-12 d-flex align-items-center">
                <div>
                    <p class="text-warning">HUBUNGI</p>
                    <h1 class="fw-bolder" style="font-size: 3rem;">Cabang Dinas</h1>
                    <p class="text-muted mb-3">Temukan lokasi dan kontak tiap cabang dinas PPDB Online Sulawesi Selatan.</p>

                    <a href="" class="btnx btnx-utama py-2 px-xl-5 px-3">Lihat Cabang Dinas</a>
                </div>
            </div>
            <div class="col-xl-6 col-12 d-none d-xl-flex align-items-center justify-content-end par-x">
                <div class="par-container">
                    <img class="par-img" data-value="2" src="/img/par-arrow-3.png" alt="banner">
                    <img class="par-img" data-value="5" src="/img/par-boy.png" alt="banner">
                    <img class="par-img" data-value="12" src="/img/par-text-3.png" alt="banner">
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 px-xl-5 bg-white" id="maps">
        <div class="row h-100 px-5 justify-content-center">
            <div class="col-xl-6 col-12 d-none d-xl-flex align-items-center justify-content-end par-x">
                <div class="par-container">
                    <img class="par-img" data-value="2" src="/img/map-sulawesi.png" alt="banner">
                    <img class="par-img" data-value="5" src="/img/map-sulsel.png" alt="banner">
                </div>
            </div>
            <div class="col-xl-4 col-12 d-flex align-items-center">
                <div>
                    <p class="text-hijau">Lihat</p>
                    <h1 class="fw-bolder" style="font-size: 3rem;">Peta Zonasi</h1>
                    <p class="text-muted mb-3">Lihat pemetaan jarak zonasi dari sekolah di Sulawesi Selatan.</p>

                    <a href="" class="btnx btnx-utama py-2 px-xl-5 px-3">Lihat Peta Zonasi</a>
                </div>
            </div>
        </div>
    </section>
</div>    
@endsection
