<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
  <div class="navbar-header h-auto">
    <ul class="nav navbar-nav flex-row">
      <li class="nav-item me-auto">
        <a class="navbar-brand" href="">
          {{-- <span class="brand-logo"> --}}
          {{-- disini logo --}}
          {{-- </span> --}}
          <img class="img-fluid h-80" src="/app-assets/images/logo-ppdb-sulsel-full.png" alt="Logo PPDB">
          {{-- <h2 class="brand-text">{{ config('app.name') }}</h2> --}}
        </a>
      </li>
    </ul>
  </div>
  <div class="shadow-bottom"></div>
  {{-- with background --}}
  <div class="main-menu-content" style="background-image: url('/app-assets/images/banner02.png'); background-repeat: no-repeat; background-position: bottom center; background-size: contain;">
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
          <i data-feather='user'></i>
          <span class="menu-title text-truncate">Data Diri</span>
        </a>
      </li>
      <li class="@if ($path1 == 'pendaftaran') active @endif nav-item my-1">
        <a class="d-flex align-items-center" href="/pendaftaran">
          <i data-feather='edit-3'></i>
          <span class="menu-title text-truncate">Pendaftaran</span>
        </a>
      </li>
      <li class="@if ($path1 == 'status') active @endif nav-item my-1">
        <a class="d-flex align-items-center" href="/status">
          <i data-feather='send'></i>
          <span class="menu-title text-truncate">Status</span>
        </a>
      </li>
      <li class="@if ($path1 == 'sekolah') active @endif nav-item my-1">
        <a class="d-flex align-items-center" href="/sekolah">
          <i data-feather='home'></i>
          <span class="menu-title text-truncate">Sekolah</span>
        </a>
      </li>
      <li class="@if ($path1 == 'faq') active @endif nav-item my-1">
        <a class="d-flex align-items-center" href="/faq">
          <i data-feather='file'></i>
          <span class="menu-title text-truncate">FAQ</span>
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
        <i class="bottom-navbar-icon" data-feather="user"></i>
        <span class="bottom-navbar-label">Data Diri</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link @if ($path1 == 'pendaftaran') active @endif" href="/pendaftaran">
        <i class="bottom-navbar-icon" data-feather="edit-3"></i>
        <span class="bottom-navbar-label">Pendaftaran</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link @if ($path1 == 'status') active @endif" href="/status">
        <i class="bottom-navbar-icon" data-feather="send"></i>
        <span class="bottom-navbar-label">Status</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link @if ($path1 == 'sekolah') active @endif" href="/sekolah">
        <i class="bottom-navbar-icon" data-feather="home"></i>
        <span class="bottom-navbar-label">Sekolah</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link @if ($path1 == 'faq') active @endif" href="/faq">
        <i class="bottom-navbar-icon" data-feather="file"></i>
        <span class="bottom-navbar-label">FAQ</span>
      </a>
    </li>
  </ul>
</nav>
