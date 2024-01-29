<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header h-auto">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item me-auto">
                <div class="navbar-brand">
                    <img class="img-fluid h-80" src="/img/logo-ppdb-sulsel-full.png" alt="Logo PPDB">
                </div>
            </li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content mt-1">
        <ul class="navigation navigation-main mb-5" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="{{ route('dashboard') }}">
                    <x-tabler-chart-pie-3 />
                    <span class="menu-title text-truncate">Dashboard</span>
                </a>
            </li>
            @issuperadmin
                <li class="nav-item {{ request()->routeIs('users.*') ? 'active' : '' }}">
                    <a class="d-flex align-items-center" href="{{ route('users.index') }}">
                        <x-tabler-users-group />
                        <span class="menu-title text-truncate">User</span>
                    </a>
                </li>
            @endissuperadmin
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
            {{-- @iscabdin --}}
            <li class="nav-item {{ request()->routeIs('sekolah.*') ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="{{ route('sekolah.index') }}">
                    <x-tabler-map-pin />
                    <span class="menu-title text-truncate">Sekolah</span>
                </a>
            </li>
            {{-- @endiscabdin --}}
            <li class="nav-item {{ request()->routeIs('school-data.*', 'school-quota.*', 'school-zone.*', 'school-coordinate.*') ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="{{ route('school-data.index') }}">
                    <x-tabler-file-database />
                    <span class="menu-title text-truncate">Data Sekolah</span>
                </a>
            </li>
            <li class="nav-item {{ request()->routeIs('operators.*') ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="{{ route('operators.index') }}">
                    <x-tabler-user-plus />
                    <span class="menu-title text-truncate">Pengajuan Operator</span>
                </a>
            </li>
            <li class="nav-item {{ request()->routeIs('verifikasi.manual*') ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="{{ route('verifikasi.manual') }}">
                    <x-tabler-file-check />
                    <span class="menu-title text-truncate">Verifikasi Manual</span>
                </a>
            </li>
            <li class="nav-item {{ request()->routeIs('daftar-ulang.*') ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="{{ route('daftar-ulang.index') }}">
                    <x-tabler-file-plus />
                    <span class="menu-title text-truncate">Daftar Ulang</span>
                </a>
            </li>
            <li class="nav-item {{ request()->routeIs('cabang-dinas.*') ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="{{ route('cabang-dinas.index') }}">
                    <x-tabler-building-bank />
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

            @issuperadmin
                <li class=" nav-item">
                    <a class="d-flex align-items-center" href="#">
                        <x-tabler-shield />
                        <span class="menu-title text-truncate" data-i18n="Roles &amp; Permission">
                            Roles &amp; Permission
                        </span>
                    </a>
                    <ul class="menu-content">
                        <li class="{{ request()->routeIs('roles.*') ? 'active' : '' }}">
                            <a class="d-flex align-items-center" href="{{ route('roles.index') }}">
                                <i data-feather="circle"></i>
                                <span class="menu-item text-truncate" data-i18n="Roles">
                                    Roles
                                </span>
                            </a>
                        </li>
                        <li class="{{ request()->routeIs('permissions.*') ? 'active' : '' }}">
                            <a class="d-flex align-items-center" href="{{ route('permissions.index') }}">
                                <i data-feather="circle"></i>
                                <span class="menu-item text-truncate" data-i18n="Roles">
                                    Permission
                                </span>
                            </a>
                        </li>
                    </ul>
                </li>
            @endissuperadmin

            <li class="nav-item {{ request()->routeIs('faqs.*') ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="{{ route('faqs.index') }}">
                    <x-tabler-message-question />
                    <span class="menu-title text-truncate">FAQ</span>
                </a>
            </li>

            <li class="nav-item {{ request()->routeIs('majors.*') ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="{{ route('majors.index') }}">
                    <x-tabler-binary-tree-2 />
                    <span class="menu-title text-truncate">Jurusan</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="d-flex align-items-center" href="{{ route('logout') }}">
                    <x-tabler-logout-2 />
                    <span class="menu-title text-truncate">Logout</span>
                </a>
            </li>

        </ul>
    </div>
</div>
<!-- END: Main Menu-->
