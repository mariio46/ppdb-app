<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item me-auto">
                <a class="navbar-brand" href="">
                    <span class="brand-logo">
                        {{-- disini logo --}}
                    </span>
                    <h2 class="brand-text">{{ config('app.name') }}</h2>
                </a>
            </li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            {{-- header menu --}}
            {{-- <li class=" navigation-header">
        <span>HEADER</span>
        <i data-feather="more-horizontal"></i>
      </li> --}}

            {{-- single menu template --}}
            {{-- <li class="active nav-item">
        <a class="d-flex align-items-center" href="/endpoint-url">
          <i data-feather="icon"></i>
          <span class="menu-title text-truncate">Single Menu</span>
        </a>
      </li> --}}

            {{-- nested menu template --}}
            {{-- <li class=" nav-item">
        <a class="d-flex align-items-center" href="/endpoint-url">
          <i data-feather="home"></i>
          <span class="menu-title text-truncate">Level 1</span>
        </a>
        <ul class="menu-content">
          <li class="active">
            <a class="d-flex align-items-center" href="/endpoint-url/level-2">
              <i data-feather="circle"></i>
              <span class="menu-item text-truncate">Level 2</span>
            </a>
          </li>
          <li>
            <a class="d-flex align-items-center" href="/endpoint-url/level-2">
              <i data-feather="circle"></i>
              <span class="menu-item text-truncate">Level 2</span>
            </a>
          </li>
        </ul>
      </li> --}}

            <li class="active nav-item">
                <a class="d-flex align-items-center" href="/data-diri">
                    <i data-feather='user'></i>
                    <span class="menu-title text-truncate">Data Diri</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="d-flex align-items-center" href="/pendaftaran">
                    <i data-feather='edit-3'></i>
                    <span class="menu-title text-truncate">Pendaftaran</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="d-flex align-items-center" href="/status">
                    <i data-feather='send'></i>
                    <span class="menu-title text-truncate">Status</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="d-flex align-items-center" href="/sekolah">
                    <i data-feather='home'></i>
                    <span class="menu-title text-truncate">Sekolah</span>
                </a>
            </li>
            <li class="nav-item">
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
            <a class="nav-link" href="/data-diri">
                <i class="bottom-navbar-icon" data-feather="user"></i>
                <span class="bottom-navbar-label">Data Diri</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/pendaftaran">
                <i class="bottom-navbar-icon" data-feather="edit-3"></i>
                <span class="bottom-navbar-label">Pendaftaran</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="bottom-navbar-icon" data-feather="send"></i>
                <span class="bottom-navbar-label">Status</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="">
                <i class="bottom-navbar-icon" data-feather="home"></i>
                <span class="bottom-navbar-label">Sekolah</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="">
                <i class="bottom-navbar-icon" data-feather="file"></i>
                <span class="bottom-navbar-label">Profil</span>
            </a>
        </li>
    </ul>
</nav>
