@extends('layouts.student.guest')

@section('styles')
  <link type="text/css" href="/app-assets/css/plugins/forms/form-validation.css" rel="stylesheet">
  <link type="text/css" href="/app-assets/css/pages/authentication.css" rel="stylesheet">
@endsection

@section('content')
  <div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
      <div class="content-header row"></div>
      <div class="content-body">
        <div class="auth-wrapper auth-cover">
          <div class="auth-inner row m-0">
            <a class="brand-logo" href="/masuk">
              <img class="img-fluid" src="/app-assets/images/logo-ppdb-sulsel-full.png" alt="logo" width="200">
            </a>
            {{-- Left section --}}
            <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
              <div class="w-100 d-lg-flex align-items-center justify-content-center px-5">
                <img class="img-fluid" src="/app-assets/images/banner01.png" alt="Login V2" style="background-image: url('/app-assets/images/background01.png');" />
              </div>
            </div>
            {{-- /Left section --}}
            {{-- right section --}}
            <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
              <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                <h2 class="card-title fw-bold mb-1">Selamat Datang! 👋</h2>
                <p class="card-text mb-0 fw-bold">PPDB SMA/SMK Sulawesi Selatan 2024</p>
                <p class="card-text mb-2">Masukkan 10 digit NISN dan kata sandi kamu.</p>

                @if ($errors->get('errorMsg') != null)
                  <div class="alert alert-danger alert-dismissible">
                    <div class="alert-body d-flex align-items-center">
                      <x-bi-exclamation-triangle-fill class="me-50" />
                      <span>{{ $errors->first() }}</span>
                    </div>
                    <button class="btn-close" data-bs-dismiss="alert" type="button" aria-label="Close"></button>
                  </div>
                @endif

                {{-- form --}}
                <form class="mt-2" id="login-form" action="/do-login" method="post">
                  @csrf
                  <div class="mb-1">
                    <x-label for="nisn">NISN</x-label>
                    <x-input id="nisn" name="nisn" type="text" value="{{ old('nisn') }}" tabindex="1" placeholder="0123456789" maxlength="10" autofocus
                      onfocus="this.value = this.value;" />
                  </div>
                  <div class="mb-1">
                    <div class="d-flex justify-content-between">
                      <x-label for="password">Kata Sandi</x-label>
                      <a href=""><small>Lupa Kata Sandi?</small></a>
                    </div>
                    <div class="input-group input-group-merge form-password-toggle">
                      <x-input class="form-control-merge" id="password" name="password" type="password" aria-describedby="password" tabindex="2" placeholder="············" />
                      <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                    </div>
                  </div>
                  <x-button class="w-100" tabindex="3">Masuk</x-button>
                </form>
                {{-- /form --}}

                {{-- register link --}}
                <div class="d-none">
                  <div class="divider my-2">
                    <div class="divider-text">or</div>
                  </div>
                  <p class="text-center mt-2"><span>Belum punya akun?</span><a href=""><span>&nbsp;Buat akun disini</span></a></p>
                </div>
                {{-- /register link --}}

                <div class="d-flex justify-content-end align-items-center fixed-bottom me-2 mb-1">
                  <p class="mb-0"><a href="https://labkraf.id/" target="_blank">labkraf.id</a> <x-bi-heart-fill class="text-danger" /> v-2.0.0</p>
                </div>
              </div>
            </div>
            {{-- /right section --}}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('vendorScripts')
  {{-- vendor js --}}
  <script src="/app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
@endsection

@push('scripts')
  {{-- custom page js --}}
  <script src="/js/student/pages/login.js"></script>
@endpush
