@extends('layouts.student.auth')

@section('vendorStyles')
  <link type="text/css" href="/app-assets/vendors/css/forms/select/select2.min.css" rel="stylesheet">
  <link type="text/css" href="/app-assets/css/plugins/forms/form-validation.css" rel="stylesheet">
@endsection

@section('content')
  <div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
      <div class="row breadcrumbs-top">
        <div class="col-12">
          <h2 class="content-header-title float-start mb-0">Beranda</h2>
          <div class="breadcrumb-wrapper">
            <ol class="breadcrumb breadcrumb-slash">
              <li class="breadcrumb-item">
                <a href="/beranda">Beranda</a>
              </li>
              <li class="breadcrumb-item active">
                Edit Data
              </li>
            </ol>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="content-body">
    <div class="card">
      <div class="card-header border-bottom">
        <h4 class="card-title">Edit Data Diri</h4>
      </div>

      <div class="card-body py-2 my-25">
        <div class="d-flex">
          <a class="me-25" href="#">
            <img class="uploadedAvatar rounded me-50 object-fit-cover ratio ratio-4x3" id="account-upload-img" src="/app-assets/images/profile.jpg" alt="profile image" height="150" />
          </a>
          <div class="d-flex align-items-end mt-75 ms-1">
            <div>
              <label class="btn btn-sm btn-primary mb-75 me-75" for="account-upload">Upload Foto</label>
              <input id="account-upload" type="file" hidden accept="image/*" />
              <button class="btn btn-sm btn-outline-secondary mb-75" id="account-reset" type="button">Hapus Foto</button>
              <p class="mb-0">Unggah foto ukuran 3x4 dengan format JPG, JPEG atau PNG, Ukuran maksimal 500KB</p>
            </div>
          </div>
        </div>
      </div>

      <form id="formEditData" action="/personal-data/update-data" method="post">
        @csrf
        <div class="card-body py-2 my-25 border-top row">

          @if (session()->get('updStatus'))
            <div>
              <div class="alert alert-{{ session()->get('updStatus') }} alert-dismissible fade show" role="alert">
                <div class="alert-body">
                  <p class="mb-0 text-center">{{ session()->get('updMsg') }}</p>
                </div>
                <button class="btn-close" data-bs-dismiss="alert" type="button" aria-label="Close"></button>
              </div>
            </div>
          @endif

          <div class="col-xl-6 col-md-6 col-12">
            <div class="mb-1">
              <x-label for="name">Nama Lengkap</x-label>
              <x-input id="name" name="name" type="text" value="{{ session()->get('stu_name') }}" readonly placeholder="Nama Lengkap" />
            </div>
            <div class="mb-1">
              <x-label for="nisn">NISN</x-label>
              <x-input id="nisn" name="nisn" type="text" value="{{ session()->get('stu_nisn') }}" readonly maxlength="10" placeholder="NISN" />
            </div>
            <div class="mb-1">
              <x-label for="fromSchool">Asal Sekolah</x-label>
              <x-input class="disabled" id="fromSchool" name="fromSchool" type="text" value="{{ session()->get('stu_school') }}" placeholder="Asal Sekolah" readonly />
            </div>
            <div class="mb-1">
              <x-label for="nik">NIK</x-label>
              <x-input id="nik" name="nik" type="text" value="{{ old('nik') }}" placeholder="NIK" maxlength="16" />
            </div>
            <div class="mb-1">
              <x-label for="gender">Jenis Kelamin</x-label>
              <select class="form-select select2" id="gender" name="gender" data-placeholder="Jenis Kelamin" data-minimum-results-for-search="-1">
                <option value=""></option>
                <option value="p">Perempuan</option>
                <option value="l">Laki-laki</option>
              </select>
            </div>
          </div>
          <div class="col-xl-6 col-md-6 col-12">
            <div class="mb-1">
              <x-label for="birthPlace">Tempat Lahir</x-label>
              <x-input id="birthPlace" name="birthPlace" value="{{ old('birthPlace') }}" placeholder="Tempat Lahir" />
            </div>
            <div class="mb-1">
              <x-label for="birthDay">Tanggal Lahir</x-label>
              <div class="row">
                <div class="col-3 pe-0">
                  <select class="form-select select2" id="birthDay" name="birthDay" data-placeholder="DD" data-minimum-results-for-search="-1">
                    <option value=""></option>
                    @for ($i = 1; $i <= 31; $i++)
                      <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                  </select>
                </div>
                <div class="col-5">
                  <select class="form-select select2" id="birthMonth" name="birthMonth" data-placeholder="MM" data-minimum-results-for-search="-1">
                    <option value=""></option>
                    <option value="1">Januari</option>
                    <option value="2">Februari</option>
                    <option value="3">Maret</option>
                    <option value="4">April</option>
                    <option value="5">Mei</option>
                    <option value="6">Juni</option>
                    <option value="7">Juli</option>
                    <option value="8">Agustus</option>
                    <option value="9">September</option>
                    <option value="10">Oktober</option>
                    <option value="11">November</option>
                    <option value="12">Desember</option>
                  </select>
                </div>
                <div class="col-4 ps-0">
                  <select class="form-select select2" id="birthYear" name="birthYear" data-placeholder="YYYY" data-minimum-results-for-search="-1">
                    <option value=""></option>
                    @for ($i = now()->year - 25; $i <= now()->year; $i++)
                      <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                  </select>
                </div>
              </div>
            </div>
            <div class="mb-1">
              <x-label for="phone">Nomor <i>Handphone</i></x-label>
              <x-input class="phone-mask" id="phone" name="phone" value="{{ old('phone') }}" placeholder="08xx xxxx xxxx" />
            </div>
            <div class="mb-1">
              <x-label for="email"><i>Email</i></x-label>
              <x-input id="email" name="email" value="{{ old('email') }}" placeholder="email" />
            </div>
          </div>
        </div>

        <div class="card-body py-2 my-25 border-top row">
          <div class="col-xl-6 col-md-6 col-12">
            <div class="mb-1">
              <x-label for="province">Provinsi</x-label>
              <select class="form-select select2" id="province" name="province" data-placeholder="Provinsi">
                <option value=""></option>
              </select>
            </div>
            <div class="mb-1">
              <x-label for="city">Kabupaten/Kota</x-label>
              <select class="form-select select2" id="city" name="city" data-placeholder="Kabupaten/Kota">
                <option value=""></option>
              </select>
            </div>
            <div class="mb-1">
              <x-label for="district">Kecamatan</x-label>
              <select class="form-select select2" id="district" name="district" data-placeholder="Kecamatan">
                <option value=""></option>
              </select>
            </div>
            <div class="mb-1">
              <x-label for="village">Desa/Kelurahan</x-label>
              <select class="form-select select2" id="village" name="village" data-placeholder="Desa/Kelurahan">
                <option value=""></option>
              </select>
            </div>
          </div>
          <div class="col-xl-6 col-md-6 col-12">
            <div class="mb-1">
              <x-label for="hamlet">Dusun/Lingkungan</x-label>
              <x-input id="hamlet" name="hamlet" type="text" value="{{ old('hamlet') }}" placeholder="Dusun/Lingkungan" />
            </div>
            <div class="mb-1">
              <x-label for="associations">RT/RW</x-label>
              <x-input id="associations" name="associations" type="text" value="{{ old('associations') }}" placeholder="RT/RW" />
            </div>
            <div class="mb-1">
              <x-label for="address">Alamat Jalan</x-label>
              <x-input id="address" name="address" type="text" value="{{ old('address') }}" placeholder="Alamat Jalan" />
            </div>
          </div>
        </div>

        <div class="card-body py-2 my-25 border-top row">
          <div class="col-md-6 col-12">
            <div class="mb-1">
              <x-label for="mothersName">Nama Ibu Kandung</x-label>
              <x-input id="mothersName" name="mothersName" type="text" value="{{ old('mothersName') }}" placeholder="Nama Ibu Kandung" />
            </div>
            <div class="mb-1">
              <x-label for="mothersPhone">Nomor <i>Handphone</i> Ibu</x-label>
              <x-input class="phone-mask" id="mothersPhone" name="mothersPhone" value="{{ old('mothersPhone') }}" placeholder="08xx xxxx xxxx" />
            </div>
            <div class="mb-1">
              <x-label for="fathersName">Nama Ayah</x-label>
              <x-input id="fathersName" name="fathersName" type="text" value="{{ old('fathersName') }}" placeholder="Nama Ayah" />
            </div>
            <div class="mb-1">
              <x-label for="fathersPhone">Nomor <i>Handphone</i> Ayah</x-label>
              <x-input class="phone-mask" id="fathersPhone" name="fathersPhone" value="{{ old('fathersPhone') }}" placeholder="08xx xxxx xxxx" />
            </div>
          </div>
          <div class="col-md-6 col-12">
            <div class="mb-1">
              <x-label for="guardsName">Nama Wali <small class="text-muted">(Opsional)</small></x-label>
              <x-input id="guardsName" name="guardsName" type="text" value="{{ old('guardsName') }}" placeholder="Nama Wali" />
            </div>
            <div class="mb-1">
              <x-label for="guardsPhone">Nomor <i>Handphone</i> Wali <small class="text-muted">(Opsional)</small></x-label>
              <x-input class="phone-mask" id="guardsPhone" name="guardsPhone" value="{{ old('guardsPhone') }}" placeholder="08xx xxxx xxxx" />
            </div>
          </div>
        </div>

        <div class="card-body py2 my-25 border-top">
          <x-button class="me-1" type="submit" color="success">Simpan Perubahan</x-button>
          <a class="btn btn-outline-secondary" href="/beranda">Batalkan</a>
        </div>
      </form>
    </div>
  </div>
@endsection

@section('vendorScripts')
  <script src="/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
  <script src="/app-assets/vendors/js/forms/cleave/cleave.min.js"></script>
  <script src="/app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
@endsection

@push('scripts')
  <script src="/js/student/pages/dashboard/personal-data-v1.0.0.js"></script>
@endpush
