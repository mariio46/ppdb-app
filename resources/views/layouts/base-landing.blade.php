@extends('layouts.student.guest')

@section('styles')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700;800&family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">

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

    .border-top-warning {
        border-top: 1rem solid #FFD35E;
    }

    .border-top-white {
        border-top: 1px solid white;
    }

    .navbar-light .navbar-nav .nav-link.active {
        color: #28C76F;
    }

    .banner-title {
        font-size: 3rem;
        margin-bottom: 0px;
        line-height: 4rem; //
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
        /* padding: 1rem 2rem; */
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
            font-size: 4rem;
        }

        #aduan, #cabdin, #maps {
            height: 80vh;
        }
    }
</style>

@yield('x-styles')
@endsection

@section('content')
    {{-- Top Bar Navigasi  --}}
    <nav class="navbar fixed-top navbar-expand-lg navbar-light border-top-warning border-5 bg-white-transparent">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="/img/logo-ppdb-sulsel-full.png" alt="logo" height="50">
            </a>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item d-none d-lg-block">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}" aria-current="page">Home</a>
                </li>
                <li class="nav-item ms-5 d-none d-lg-block">
                    <a class="nav-link {{ request()->routeIs('home.announcement') ? 'active' : '' }}" href="{{ route('home.announcement') }}">Pengumuman</a>
                </li>
                <li class="nav-item ms-5 d-none d-lg-block">
                    <a class="nav-link {{ request()->routeIs('home.zone-map') ? 'active' : '' }}" href="{{ route('home.zone-map') }}">Peta Zonasi</a>
                </li>
                <li class="nav-item ms-5">
                    <a class="btn btn-masuk px-5" href="{{ route('student.masuk') }}">Masuk</a>
                </li>
            </ul>
        </div>
    </nav>

    {{-- Konten Halaman  --}}
    @yield('x-content')

    <section class="p-5" id="footer">
        <div id="gayagaya">
            <img src="{{ asset('img/gayagaya.png') }}" alt="gayagaya">
        </div>
        <div class="px-lg-5 py-5">
            <div class="row">
                <div class="col-xl-5 col-12 mb-5">
                    <div class="d-flex align-items-end mb-xl-2">
                        <img src="{{ asset('img/logo-only.png') }}" alt="logo" class="footer-logo">
                        <h2 class="mb-0 ms-2 text-white">PPDB SULSEL 2024</h2>
                    </div>
                    <div class="mb-xl-2">
                        <p class="mb-0">Penerimaan Peserta Didik Baru SMA & SMK 2024</p>
                        <p>Dinas Pendidikan Provinsi Sulawesi Selatan</p>
                    </div>

                    <div class="mb-xl-2">
                        <p class="mb-0">Jl. Perintis Kemerdekaan, Tamalanrea Indah</p>
                        <p>Kec. Tamalanrea, Kota Makassar, Sulawesi Selatan</p>
                    </div>
                </div>

                <div class="col-xl-5 col-12 mb-2">
                    <h4 class="mt-xl-2 mb-xl-2 text-white">Menu</h4>

                    <p class="mb-xl-1"><a class="footer-link" href="">Home</a></p>
                    <p class="mb-xl-1"><a class="footer-link" href="">Pengumuman</a></p>
                    <p class="mb-xl-1"><a class="footer-link" href="">Peta Zonasi</a></p>
                </div>

                <div class="col-xl-auto col-12 mb-5">
                    <h4 class="mt-xl-2 mb-xl-2 text-white">Media Sosial</h4>

                    <x-tabler-brand-instagram style="width: 32px; height: 32px;" />
                </div>
            </div>

            <div class="border-top-white d-flex align-items-center pt-1">
                <p class="mb-0"><small>All Rights Reserved @labkaf.id 2024</small></p>

                <div class="ms-auto">
                    <i><small class="me-3"><a href="" class="footer-link">Privacy & Policy</a></small></i>
                    <i><small><a href="" class="footer-link">Terms & Conditions</a></small></i>
                </div>
            </div>
        </div>
    </section>

    <button id="to-top" class="shadow"><x-tabler-chevron-up /></button>
@endsection

@push('scripts')
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

@yield('x-scripts')
@endpush
