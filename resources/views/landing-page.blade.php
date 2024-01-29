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
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">

        {{-- Tautan Bootstrap JavaScript dan Popper.js (diperlukan untuk beberapa komponen Bootstrap) --}}
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>

        <style>
            body {
                font-family: "Poppins", sans-serif;
            }

            #banner .banner-title {
                font-size: 5rem;
                margin-bottom: 0px;
            }

            #banner .par-x {
                position: relative;
            }

            #banner .par-img {
                position: absolute;
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
        </style>

        <title>PPDB - 2024</title>
        
    </head>

    <body>
        {{-- Top Bar Navigasi  --}}
        <nav class="navbar fixed-top navbar-expand-lg navbar-light border-top border-warning border-5">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="/img/logo-ppdb-sulsel-full.png" alt="logo" height="50">
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Features</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Pricing</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        {{-- Konten Halaman  --}}
        <div id="content">
            
            <section class="vh-100 pt-5 px-5" id="banner">
                <div class="row h-100 mx-lg-5">
                    <div class="col-lg-7 col-12 d-flex align-items-center">
                        <div>
                            <p class="banner-title fw-bold">PPDB Online <span class="text-primary fw-normal">2024</span></p>
                            <p class="banner-title fw-bold">Sulawesi Selatan</p>
                            <p class="fs-5 text-secondary mb-5">Penerimaan Peserta Didik Baru 2024 Provinsi Sulawesi Selatan</p>
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <a href="" class="btn btn-success btn-lg py-3 px-5 fs-6 shadow">Masuk ke akun</a>
                                </div>
                                <div class="col-md-6 col-12">
                                    <a href="#uye" class="text-decoration-none text-secondary cursor-pointer">
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
                    <div class="col-lg-5 col-12 d-none d-lg-flex align-items-center justify-content-end par-x">
                        <div class="par-container">
                            <img src="/img/par-arrow.png" alt="banner" class="par-img" data-value="2">
                            <img src="/img/par-girl.png" alt="banner" class="par-img" data-value="5">
                            <img src="/img/par-text.png" alt="banner" class="par-img" data-value="12">
                        </div>
                    </div>
                </div>
            </section>
        </div>

        {{-- Tautan Bootstrap JS (diakhiri dengan tag </body>) --}}
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

        <script>
            document.addEventListener("mousemove", parallax);
            function parallax(e) {
                document.querySelectorAll('.par-img').forEach(function (move) {
                    var moving_value = move.getAttribute("data-value");
                    var x = (e.clientX * moving_value) / 250;
                    var y = (e.clientY * moving_value) / 250;

                    move.style.transform = `translateX(${x}px) translateY(${y}px)`;
                });
            }
        </script>          
    </body>

</html>
