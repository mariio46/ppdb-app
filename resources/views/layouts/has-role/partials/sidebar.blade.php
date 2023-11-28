<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item me-auto">
                <div class="navbar-brand">
                    <a class="brand-logo" href="#">
                        <x-application-logo />
                    </a>

                </div>
            </li>
            <li class="nav-item nav-toggle">
                <a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse">
                    <i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i>
                    <i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i>
                </a>
            </li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content mt-3">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="{{ route('dashboard') }}">
                    <x-tabler-chart-pie-3 />
                    <span class="menu-title text-truncate">Dashboard</span>
                </a>
            </li>
            <li class="nav-item {{ request()->routeIs('users.*') ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="{{ route('users.index') }}">
                    <x-tabler-users-group />
                    <span class="menu-title text-truncate">User</span>
                </a>
            </li>
            <li class="nav-item {{ request()->routeIs('sekolah-asal.*') ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="{{ route('sekolah-asal.index') }}">
                    <x-tabler-compass />
                    <span class="menu-title text-truncate">Sekolah Asal</span>
                </a>
            </li>
            <li class="nav-item {{ request()->routeIs('siswa.*') ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="{{ route('siswa.index') }}">
                    <x-tabler-users />
                    <span class="menu-title text-truncate">Akun Siswa</span>
                </a>
            </li>
            <li class="nav-item {{ request()->routeIs('sekolah.*') ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="{{ route('sekolah.index') }}">
                    <x-tabler-map-pin />
                    <span class="menu-title text-truncate">Sekolah</span>
                </a>
            </li>
            <li class="nav-item {{ request()->routeIs('operators.*') ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="{{ route('operators.index') }}">
                    <x-tabler-user-plus />
                    <span class="menu-title text-truncate">Pengajuan Operator</span>
                </a>
            </li>
            <li class="nav-item {{ request()->routeIs('verifikasi.manual') ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="{{ route('verifikasi.manual') }}">
                    <x-tabler-file-text />
                    <span class="menu-title text-truncate">Verifikasi Manual</span>
                </a>
            </li>
            <li class="nav-item {{ request()->routeIs('verifikasi.daftar.ulang') ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="{{ route('verifikasi.daftar.ulang') }}">
                    <x-tabler-file-plus />
                    <span class="menu-title text-truncate">Daftar Ulang</span>
                </a>
            </li>
            <li class="nav-item {{ request()->routeIs('cabang-dinas.*') ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="{{ route('cabang-dinas.index') }}">
                    <x-tabler-home />
                    <span class="menu-title text-truncate">Cabang Dinas</span>
                </a>
            </li>
            <li class="nav-item {{ request()->routeIs('kunci-sekolah.*') ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="{{ route('kunci-sekolah.index') }}">
                    <x-tabler-lock-square-rounded />
                    <span class="menu-title text-truncate">Buka Kunci Sekolah</span>
                </a>
            </li>
            <li class="nav-item {{ request()->routeIs('ranking.*') ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="{{ route('ranking.index') }}">
                    <x-tabler-chart-histogram />
                    <span class="menu-title text-truncate">Perangkingan</span>
                </a>
            </li>
            <li class="nav-item {{ request()->routeIs('schedules.*') ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="{{ route('schedules.index') }}">
                    <x-tabler-calendar />
                    <span class="menu-title text-truncate">Tahap & Jadwal</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="d-flex align-items-center" href="#">
                    <x-tabler-id-badge-2 />
                    <span class="menu-title text-truncate">Role & Permission</span>
                </a>
            </li>

            <li class="nav-item {{ request()->routeIs('faq.index') ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="{{ route('faq.index') }}">
                    <x-tabler-message-question />
                    <span class="menu-title text-truncate">FAQ</span>
                </a>
            </li>
        </ul>
    </div>
</div>
<!-- END: Main Menu-->
