<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header h-auto">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item me-auto">
                <a class="navbar-brand" href="">
                    {{-- <span class="brand-logo"> --}}
                    {{-- disini logo --}}
                    {{-- </span> --}}
                    <img class="img-fluid h-80" src="/img/logo-ppdb-sulsel-full.png" alt="Logo PPDB">
                    {{-- <h2 class="brand-text">{{ config('app.name') }}</h2> --}}
                </a>
            </li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    {{-- with background --}}
    <div class="main-menu-content" style="background-image: url('/img/banner02.png'); background-repeat: no-repeat; background-position: bottom center; background-size: contain;">
        {{-- with no background --}}
        {{-- <div class="main-menu-content"> --}}
        <ul class="navigation navigation-main mt-2" id="main-menu-navigation" data-menu="menu-navigation">

            @php
                $path = explode('/', request()->path());
                $path1 = $path[0];
                $path2 = $path[1] ?? null;
                $path3 = $path[2] ?? null;
            @endphp

            <li class="@if ($path1 == 'data-diri') active @endif nav-item my-1">
                <a class="d-flex align-items-center" href="/data-diri">
                    <x-tabler-dashboard style="width: 24px; height: 24px;" />
                    <span class="menu-title text-truncate">Data Diri</span>
                </a>
            </li>
            <li class="@if ($path1 == 'pendaftaran') active @endif nav-item my-1">
                <a class="d-flex align-items-center" href="/pendaftaran">
                    <x-tabler-pencil-minus style="width: 24px; height: 24px;" />
                    <span class="menu-title text-truncate">Pendaftaran</span>
                </a>
            </li>
            <li class="@if ($path1 == 'status') active @endif nav-item my-1">
                <a class="d-flex align-items-center" href="/status">
                    <x-tabler-send style="width: 24px; height: 24px;" />
                    <span class="menu-title text-truncate">Status</span>
                </a>
            </li>
            <li class="@if ($path1 == 'sekolah') active @endif nav-item my-1">
                <a class="d-flex align-items-center" href="/sekolah">
                    <x-tabler-home-search style="width: 24px; height: 24px;" />
                    <span class="menu-title text-truncate">Sekolah</span>
                </a>
            </li>
            <li class="@if ($path1 == 'faq') active @endif nav-item my-1">
                <a class="d-flex align-items-center" href="/faq">
                    <x-tabler-file-dots style="width: 24px; height: 24px;" />
                    <span class="menu-title text-truncate">FAQ</span>
                </a>
            </li>
            <li class="nav-item my-1">
                <a class="d-flex align-items-center text-danger" href="/keluar">
                    <x-tabler-logout-2 style="width: 24px; height: 24px;" />
                    <span class="menu-title text-truncate">Keluar</span>
                </a>
            </li>
        </ul>
    </div>
</div>
<!-- END: Main Menu-->

{{-- Bottom Navigation Bar --}}
<nav class="bottom-navbar navbar navbar-expand navbar-shadow fixed-bottom bg-white d-xl-none">
    <ul class="nav nav-justified w-100">
        <li class="nav-item">
            <a class="nav-link @if ($path1 == 'data-diri') active @endif" href="/data-diri">
                <x-tabler-dashboard class="bottom-navbar-icon" />
                <span class="bottom-navbar-label">Data Diri</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link @if ($path1 == 'pendaftaran') active @endif" href="/pendaftaran">
                <x-tabler-pencil-minus class="bottom-navbar-icon" />
                <span class="bottom-navbar-label">Pendaftaran</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link @if ($path1 == 'status') active @endif" href="/status">
                <x-tabler-send class="bottom-navbar-icon" />
                <span class="bottom-navbar-label">Status</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link @if ($path1 == 'sekolah') active @endif" href="/sekolah">
                <x-tabler-home-search class="bottom-navbar-icon" />
                <span class="bottom-navbar-label">Sekolah</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link @if ($path1 == 'faq') active @endif" id="btnOther" role="button">
                <x-tabler-menu class="bottom-navbar-icon" />
                <span class="bottom-navbar-label">Lainnya</span>
            </a>
        </li>
    </ul>
</nav>
<div class="fixed-bottom-right" id="fixedBottomRight">
    <div class="bg-white list-group">
        <a class="list-group-item list-group-item-action @if ($path1 == 'faq') active @endif" href="/faq"><x-tabler-file-dots /> FAQ</a>
        <a class="list-group-item list-group-item-action text-danger" href="keluar"><x-tabler-logout-2 /> Keluar</a>
    </div>
</div>
