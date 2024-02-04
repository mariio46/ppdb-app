<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{-- Tautan Bootstrap CSS --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

        {{-- font style --}}
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700;800&family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">

        {{-- Tautan Bootstrap JavaScript dan Popper.js (diperlukan untuk beberapa komponen Bootstrap) --}}
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>

        <style>
            body {
                font-family: "Poppins", sans-serif;
            }
            
            section {
                padding: 0;
            }

            .text-hijau {
                color: #28C76F;
            }

            .bg-white-transparent {
                background-color: rgba(255, 255, 255, .50);
                backdrop-filter: blur(5px);
            }

            .navbar-light .navbar-nav .nav-link.active {
                color: #28C76F;
            }

            .banner-title {
                font-size: 3rem;
                margin-bottom: 0px;
            }

            .par-x {
                position: relative;
            }

            .par-img {
                position: absolute;
                height: 100%;
                width: 100%;
                top: 0;
                left: 0;
                margin-left: auto;
                margin-right: auto;
                object-fit: contain;
            }

            .btn {
                border-radius: 1rem;
            }

            .btnx {
                border-radius: 1rem;
                text-decoration: none;
                font-size: 1rem;
                padding: 1rem 2rem;
                text-align: center;
                box-shadow: 0px 26.667px 65.333px -13.333px rgba(0, 0, 0, 0.08);
            }

            .btnx:hover {
                box-shadow: 0px 0px 2.2px rgba(0, 0, 0, 0.014), 0.4px 0.3px 5.3px rgba(0, 0, 0, 0.016), 1.4px 0.9px 10px rgba(0, 0, 0, 0.018), 3.4px 2.3px 17.9px rgba(0, 0, 0, 0.025), 7.8px 5.2px 33.4px rgba(0, 0, 0, 0.041), 21px 14px 80px rgba(0, 0, 0, 0.07);
            }

            .btnx-utama {
                color: white;
                background: #0084fe;
            }

            .btnx-utama:hover {
                color: white;
                background: #0779E1;
            }

            .btnx-warning {
                color: white;
                background: #FFD35E;
            }

            .btnx-warning:hover {
                color: white;
                background: #EFC24A;
            }

            .btnx-success, .btn-masuk {
                color: white;
                background: #28C76F;
            }

            .btnx-success:hover, .btn-masuk:hover {
                color: white;
                background: #23AF61;
            }

            .btn-rounded {
                height: 50px;
                width: 50px;
                border-radius: 50%;
                border: none;
            }

            .btn-rounded-white {
                background: white;
            }

            .btn-rounded-previous:hover {
                padding-right: 1rem;
            }

            .btn-rounded-success {
                background: #28C76F;
            }

            .btn-rounded-next:hover {
                padding-left: 1rem;
            }

            .btn-flat-success {
                font-family: 'Montserrat', sans-serif;
                font-weight: 600;
                color: #28C76F;
            }

            .btn-flat-success:hover {
                padding-left: 1rem;
                color: #28C76F;
            }

            #jadwal {
                background: #FAFDFF;
            }

            /*  */
            .timeline {
                position: relative;
            }

            .timeline-item {
                display: flex;
                align-items: flex-start;
                margin-bottom: 20px;
                width: 100%;
            }

            .timeline-bullet {
                width: 15px;
                height: 15px;
                background-color: #007bff; /* Bullet color */
                border-radius: 50%;
                margin-right: 10px;
                flex-shrink: 0;
                z-index: 2;
            }

            .timeline-title {
                font-weight: bold;
                width: 100%;
                border-bottom: 1px solid #E9E9EB;
                margin-bottom: 1rem;
            }

            .timeline-body {
                margin-left: 20px;
            }

            .timeline-item::before {
                content: '';
                position: absolute;
                top: 0;
                left: 7px; /* Adjust the left position based on the bullet size */
                width: 1px; /* Line width */
                height: 100%;
                background-color: #E9E9EB; /* Line color */
                z-index: 1;
            }

            /*  */

            #aduan, #cabdin, #maps {
                height: 40vh;
            }

            #pengumuman {
                background: url({{ asset('img/pengumuman-bg.png') }});
                background-repeat: no-repeat;
                background-size: cover;
                background-position: top center;
                height: 400px;
            }

            #pengumuman .card-body {
                background: url({{ asset('img/pengumuman-card-bg.png') }});
                background-repeat: no-repeat;
                background-size: cover;
                background-position: center center;
                height: 200px;
                border-radius: 1.5rem;
            }

            #footer {
                background: #222222;
                color: white;
                position: relative;
            }

            #gayagaya {
                position: absolute;
                top: 0;
                left: 0;
            }

            .footer-logo {
                height: 3rem;
                width: auto;
            }

            .footer-link {
                color: white;
                text-decoration: none;
            }

            #to-top {
                display: none;
                position: fixed;
                bottom: 40px;
                right: 40px;
                border-radius: 50%;
                cursor: pointer;
                height: 3.5rem;
                width: 3.5rem;
                border: none;
                background: #0084fe;
                color: white;
            }

            #to-top:hover {
                padding-bottom: .5rem;
            }

            #to-top svg {
                height: 24px;
                width: 24px;
            }


            /* Medium devices (tablets, 768px and up) */
            @media (min-width: 768px) {
                .banner-title {
                    font-size: 3rem;
                }

                #aduan, #cabdin, #maps {
                    height: 40vh;
                }
            }

            /* Large devices (desktops, 992px and up) */
            @media (min-width: 992px) {
                section {
                    padding: 0 5rem;
                }

                .banner-title {
                    font-size: 5rem;
                }

                #aduan, #cabdin, #maps {
                    height: 40vh;
                }

                #pengumuman {
                    height: 400px;
                }
            }

            /* Extra large devices (large desktops, 1200px and up) */
            @media (min-width: 1200px) {
                section {
                    padding: 0 5rem;
                }

                .banner-title {
                    font-size: 5rem;
                }

                #aduan, #cabdin, #maps {
                    height: 80vh;
                }
            }
        </style>

        <title>PPDB - 2024</title>

    </head>

    <body>
        {{-- Top Bar Navigasi  --}}
        <nav class="navbar fixed-top navbar-expand-lg navbar-light border-top border-warning border-5 bg-white-transparent">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="/img/logo-ppdb-sulsel-full.png" alt="logo" height="50">
                </a>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item d-none d-lg-block">
                        <a class="nav-link active" href="{{ route('home') }}" aria-current="page">Home</a>
                    </li>
                    <li class="nav-item ms-5 d-none d-lg-block">
                        <a class="nav-link" href="{{ route('home.announcement') }}">Pengumuman</a>
                    </li>
                    <li class="nav-item ms-5 d-none d-lg-block">
                        <a class="nav-link" href="{{ route('home.zone-map') }}">Peta Zonasi</a>
                    </li>
                    <li class="nav-item ms-5">
                        <a class="btn btn-masuk px-5" href="{{ route('student.masuk') }}">Masuk</a>
                    </li>
                </ul>
            </div>
        </nav>

        {{-- Konten Halaman  --}}
        <div id="content">
            <section class="vh-100 pt-5 px-xl-5" id="banner">
                <div class="row h-100 px-5 justify-content-center">
                    <div class="col-xl-6 col-12 d-flex align-items-center">
                        <div>
                            <p class="banner-title fw-bold">PPDB Online <span class="text-primary fw-normal">2024</span></p>
                            <p class="banner-title fw-bold">Sulawesi Selatan</p>
                            <p class="fs-5 text-secondary mb-5">Penerimaan Peserta Didik Baru Tahun Ajaran 2024/2025 Provinsi Sulawesi Selatan</p>
                            <div class="row">
                                <div class="col-md-auto col-12 me-md-5 mb-4">
                                    <a class="btnx btnx-success btn-lg py-3 px-5 fs-6 shadow" href="{{ route('student.masuk') }}">Masuk ke akun</a>
                                </div>
                                <div class="col-md-auto col-12">
                                    <a class="text-decoration-none text-secondary cursor-pointer" href="#uye">
                                        <span class="d-flex align-items-center">
                                            <span class="shadow-lg p-3 rounded-pill">
                                                <x-tabler-player-play-filled class="text-danger" />
                                            </span>
                                            <span class="mb-0 ms-3">Tata cara pendaftaran</span>
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
                            <h1 class="fw-bold">Jadwal Penerimaan</h1>
                            <p class="text-muted mb-0">Geser untuk melihat detail jadwal penerimaan per tahap.</p>
                        </div>
                        <div class="ms-auto">
                            <button class="btn-rounded btn-rounded-white btn-rounded-previous shadow shadow-lg me-2"><x-tabler-arrow-left /></button>
                            <button class="btn-rounded btn-rounded-success btn-rounded-next shadow shadow-lg text-white"><x-tabler-arrow-right /></button>
                        </div>
                    </div>

                    <div class="card border-0 mt-4 p-lg-5">
                        <div class="card-body">
                            <h5 class="mb-5 px-xl-4">Tahap 1</h5>

                            <p class="px-xl-4 mb-4">SMA : Jalur Boarding School</p>
                            <p class="px-xl-4 mb-5">SMK : Jalur Afirmasi, Perpindahan tugas orang tua/wali, Jalur anak guru, Jalur anak DUDI mitra SMK, Jalur prestasi Non Akademik dan Jalur Domisili terdekat dari sekolah</p>

                            <div class="container">
                                <div class="timeline">
                                    <div class="timeline-item">
                                        <div class="timeline-bullet"></div>
                                        <div class="w-100">
                                            <div class="timeline-title d-md-flex align-items-center d-block">
                                                <h5 class="ps-2">Pendaftaran</h5>
                                                <h5 class="mb-0 ms-auto">20 - 25 Juni 2024</h5>
                                            </div>
                                            <div class="timeline-body">
                                                <p>Calon peserta didik melakukan pendaftaran melalui laman PPBD Sulawesi Selatan Tahun 2024.</p>
                                                <a href="" class="btn btn-flat-success">Daftar Disini</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="timeline-item">
                                        <div class="timeline-bullet"></div>
                                        <div class="w-100">
                                            <div class="timeline-title d-md-flex align-items-center d-block">
                                                <h5 class="ps-2">Verifikasi dan Validasi</h5>
                                                <h5 class="mb-0 ms-auto">20 - 25 Juni 2024</h5>
                                            </div>
                                            <div class="timeline-body">
                                                <p>Sekolah melakukan verifikasi dan validasi data calon peserta didik.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="timeline-item">
                                        <div class="timeline-bullet"></div>
                                        <div class="w-100">
                                            <div class="timeline-title d-md-flex align-items-center d-block">
                                                <h5 class="ps-2">Pengumuman</h5>
                                                <h5 class="mb-0 ms-auto">26 Juni 2024</h5>
                                            </div>
                                            <div class="timeline-body">
                                                <p>Calon peserta didik dapat melihat pengumuman melalui laman PPBD Sulawesi Selatan 2024.</p>
                                                <a href="" class="btn btn-flat-success">Lihat Pengumuman disini</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="timeline-item">
                                        <div class="timeline-bullet"></div>
                                        <div class="w-100">
                                            <div class="timeline-title d-md-flex align-items-center d-block">
                                                <h5 class="ps-2">Daftar Ulang</h5>
                                                <h5 class="mb-0 ms-auto">27 - 28 Juni 2024</h5>
                                            </div>
                                            <div class="timeline-body">
                                                <p>Calon perserta didik melakukan Daftar Ulang.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="py-5 px-xl-5" id="aduan">
                <div class="row h-100 px-5 justify-content-center">
                    <div class="col-xl-5 col-12 d-none d-xl-flex align-items-center justify-content-end par-x">
                        <div class="par-container">
                            <img class="par-img" data-value="2" src="/img/par-arrow-2.png" alt="banner">
                            <img class="par-img" data-value="5" src="/img/par-girl-2.png" alt="banner">
                            <img class="par-img" data-value="12" src="/img/par-text-2.png" alt="banner">
                        </div>
                    </div>
                    <div class="col-xl-4 col-12 d-flex align-items-center">
                        <div>
                            <p class="text-hijau">MENGALAMI MASALAH?</p>
                            <h1 class="fw-bold mb-4">Pengaduan PPDB online 2024</h1>
                            <p class="text-muted mb-5">Jika kamu mengalami masalah terkait PPDB Online silahkan membuat pengaduan.</p>

                            <a href="" class="btnx btnx-utama">Buat Pengaduan</a>
                        </div>
                    </div>
                </div>
            </section>

            <section id="pengumuman">
                <div class="px-md-5 px-3 h-100 row align-items-center justify-content-center">
                    <div class="card border-0">
                        <div class="card-body">
                            <div class="row align-items-center h-100 px-md-5 px-3">
                                <div class="col-md-6 col-auto">
                                    <h3 class="text-white">Lihat Pengumuman PPDB Sulawesi Selatan Tahun Pelajaran 2024/2025</h3>
                                </div>
    
                                <div class="col-md-6 col-auto d-flex justify-content-end">
                                    <a href="" class="btnx btnx-warning text-end">Lihat Pengumuman</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
    
            <section class="py-5 px-xl-5" id="cabdin">
                <div class="row h-100 px-5 justify-content-center">
                    <div class="col-xl-3 col-12 d-flex align-items-center">
                        <div>
                            <p class="text-warning">HUBUNGI</p>
                            <h1 class="fw-bold mb-4">Cabang Dinas</h1>
                            <p class="text-muted mb-5">Temukan lokasi dan kontak tiap cabang dinas PPDB Online Sulawesi Selatan.</p>
    
                            <a href="" class="btnx btnx-utama">Lihat Cabang Dinas</a>
                        </div>
                    </div>
                    <div class="col-xl-4 col-12 d-none d-xl-flex align-items-center justify-content-end par-x">
                        <div class="par-container">
                            <img class="par-img" data-value="2" src="/img/par-arrow-3.png" alt="banner">
                            <img class="par-img" data-value="5" src="/img/par-boy.png" alt="banner">
                            <img class="par-img" data-value="12" src="/img/par-text-3.png" alt="banner">
                        </div>
                    </div>
                </div>
            </section>
    
            <section class="py-5 px-xl-5" id="maps">
                <div class="row h-100 px-5 justify-content-center">
                    <div class="col-xl-5 col-12 d-none d-xl-flex align-items-center justify-content-end par-x">
                        <div class="par-container">
                            <img class="par-img" data-value="2" src="/img/map-sulawesi.png" alt="banner">
                            <img class="par-img" data-value="5" src="/img/map-sulsel.png" alt="banner">
                        </div>
                    </div>
                    <div class="col-xl-4 col-12 d-flex align-items-center">
                        <div>
                            <p class="text-hijau">Lihat?</p>
                            <h1 class="fw-bold mb-4">Peta Zonasi</h1>
                            <p class="text-muted mb-5">Lihat pemetaan jarak zonasi dari sekolah di Sulawesi Selatan.</p>
    
                            <a href="" class="btnx btnx-utama">Lihat Peta Zonasi</a>
                        </div>
                    </div>
                </div>
            </section>
        </div>


        <section class="p-5" id="footer">
            <div id="gayagaya">
                <img src="{{ asset('img/gayagaya.png') }}" alt="gayagaya">
            </div>
            <div class="px-lg-5 py-5">
                <div class="row">
                    <div class="col-xl-5 col-12 mb-5">
                        <div class="d-flex align-items-end mb-xl-5">
                            <img src="{{ asset('img/logo-only.png') }}" alt="logo" class="footer-logo">
                            <h3 class="mb-0 ms-2">PPDB SULSEL 2024</h3>
                        </div>
                        <div class="mb-xl-5">
                            <p class="mb-0">Penerimaan Peserta Didik Baru SMA & SMK 2024</p>
                            <p>Dinas Pendidikan Provinsi Sulawesi Selatan</p>
                        </div>

                        <div class="mb-xl-5">
                            <p class="mb-0">Jl. Perintis Kemerdekaan, Tamalanrea Indah</p>
                            <p>Kec. Tamalanrea, Kota Makassar, Sulawesi Selatan</p>
                        </div>
                    </div>

                    <div class="col-xl-5 col-12 mb-5">
                        <h5 class="mt-xl-4 mb-xl-5">Menu</h5>

                        <p class="mb-xl-4"><a class="footer-link" href="">Home</a></p>
                        <p class="mb-xl-4"><a class="footer-link" href="">Pengumuman</a></p>
                        <p class="mb-xl-4"><a class="footer-link" href="">Peta Zonasi</a></p>
                    </div>

                    <div class="col-xl-auto col-12 mb-5">
                        <h5 class="mt-xl-4 mb-xl-5">Media Sosial</h5>

                        <x-tabler-brand-instagram style="width: 32px; height: 32px;" />
                    </div>
                </div>

                <div class="border-top border-white d-flex align-items-center pt-2">
                    <p class="mb-0"><small>All Rights Reserved @labkaf.id 2024</small></p>

                    <div class="ms-auto">
                        <i><small class="me-3"><a href="" class="footer-link">Privacy & Policy</a></small></i>
                        <i><small><a href="" class="footer-link">Terms & Conditions</a></small></i>
                    </div>
                </div>
            </div>
        </section>

        <button id="to-top" class="shadow"><x-tabler-chevron-up /></button>
        
        {{-- Tautan Bootstrap JS (diakhiri dengan tag </body>) --}}
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

        <script>
            document.addEventListener("mousemove", parallax);

            function parallax(e) {
                document.querySelectorAll('.par-img').forEach(function(move) {
                    var moving_value = move.getAttribute("data-value");
                    var x = (e.clientX * moving_value) / 250;
                    var y = (e.clientY * moving_value) / 250;

                    move.style.transform = `translateX(${x}px) translateY(${y}px)`;
                });
            }

            const scrollTopBtn = document.getElementById("to-top");

            // Tampilkan tombol saat scroll ke bawah
            window.addEventListener("scroll", function () {
                if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                scrollTopBtn.style.display = "block";
                } else {
                scrollTopBtn.style.display = "none";
                }
            });

            // Scroll ke atas saat tombol diklik
            scrollTopBtn.addEventListener("click", function () {
                document.body.scrollTop = 0; // Untuk dukungan browser yang lebih lama
                document.documentElement.scrollTop = 0; // Untuk browser modern
            });
        </script>
    </body>
</html>
