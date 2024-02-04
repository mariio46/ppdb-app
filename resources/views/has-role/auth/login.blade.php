@extends('layouts.has-role.guest', ['title' => 'Login'])

@section('styles')
    <link type="text/css" href="../../../app-assets/css/pages/authentication.css" rel="stylesheet" />
@endsection

@section('content')
    <div class="app-content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row"></div>
            <div class="content-body">
                {{-- d-flex align-items-center justify-content-center min-vh-100 --}}
                <div class="auth-wrapper auth-basic px-2">
                    <div class="auth-inner my-2">
                        <!-- Login card -->
                        <div class="card mb-0">
                            <div class="card-body">
                                <a class="brand-logo" href="#" style="display: flex;">
                                    <x-application-logo />
                                </a>
                                <h4 class="card-title mb-1">Selamat Datang di PPDB 2024 👋👋</h4>
                                <p class="card-text mb-2">Silahkan masukkan username dan password yang sudah di berikan oleh sekolah asal kamu</p>
                                <form class="auth-login-form mt-2" action="{{ route('login') }}" method="POST">
                                    @csrf
                                    <div class="mb-2">
                                        <x-label class="mb-1" for="username">Username</x-label>
                                        <x-input id="username" name="username" type="text" value="{{ old('username', 'mario46_') }}" placeholder="Masukkan username" autofocus required />
                                    </div>
                                    <div class="mb-2">
                                        <x-label class="mb-1" for="password">Password</x-label>
                                        <div class="input-group input-group-merge form-password-toggle">
                                            <x-input id="password" name="password" type="password" value="password" placeholder="Masukkan password" required />
                                            <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                        </div>
                                    </div>
                                    <x-button class="w-100" type="submit">Login</x-button>
                                </form>
                            </div>
                        </div>
                        <!-- /Login card -->
                    </div>
                </div>
            </div>
        </div>
    @endsection
