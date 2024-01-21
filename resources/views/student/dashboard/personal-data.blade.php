@extends('layouts.student.auth')

@section('vendorStyles')
    <link type="text/css" href="/app-assets/vendors/css/forms/select/select2.min.css" rel="stylesheet">
    <link type="text/css" href="/app-assets/css/plugins/forms/form-validation.css" rel="stylesheet">
@endsection

@section('styles')
    <link type="text/css" href="/css/student/pages/dashboard/personal-data.css" rel="stylesheet">
@endsection

@section('content')
    <x-breadcrumb title="Data Diri">
        <x-breadcrumb-item title="Data Diri" to="{{ route('student.personal') }}" />
        <x-breadcrumb-active title="Edit Data" />
    </x-breadcrumb>

    <x-error-reload />

    <section id="placeholder">
        <div class="card px-0">
            <div class="card-header border-bottom placeholder-glow">
                <h4 class="card-title">Edit Data Diri</h4>
            </div>

            <div class="card-body py-2 placeholder-glow d-flex">
                <div class="custom-aspect-ratio">
                    <div class="placeholder col-12 rounded mb-1 h-100"></div>
                </div>
                <div class="d-flex flex-column justify-content-end ms-lg-1" style="width: 65%;">
                    <div class="placeholder col-3 rounded mb-1" style="height: 30px;"></div>
                    <div class="placeholder col-8 rounded" style="height: 15px;"></div>
                </div>
            </div>

            <div class="card-body py-2 row border-top placeholder-glow">
                @for ($i = 0; $i < 5; $i++)
                    <div class="col-6">
                        <div class="placeholder col-12 rounded mb-1" style="height: 50px;"></div>
                    </div>
                @endfor
            </div>

            <div class="card-body py-2 row border-top placeholder-glow">
                @for ($i = 0; $i < 5; $i++)
                    <div class="col-6">
                        <div class="placeholder col-12 rounded mb-1" style="height: 50px;"></div>
                    </div>
                @endfor
            </div>

            <div class="card-body py-2 row border-top placeholder-glow">
                @for ($i = 0; $i < 3; $i++)
                    <div class="col-6">
                        <div class="placeholder col-12 rounded mb-1" style="height: 50px;"></div>
                    </div>
                @endfor
            </div>

            <div class="card-body py-2 border-top placeholder-glow">
                <div class="placeholder col-3 rounded mb-1 me-1" style="height: 50px;"></div>
                <div class="placeholder col-3 rounded mb-1" style="height: 50px;"></div>
            </div>
        </div>
    </section>

    <div class="content-body" id="content" style="display: none;">
        <div class="card">
            <div class="card-header border-bottom">
                <h4 class="card-title">Edit Data Diri</h4>
            </div>

            <div class="card-body py-2 my-25">

                <div class="d-md-flex align-items-end">
                    <div class="d-flex justify-content-center mb-1 ">
                        <div class="custom-aspect-ratio ">
                            <img class="rounded" id="profilePreview" src="/img/base-profile.png" alt="profile image" height="150">
                        </div>
                    </div>
                    <div class="ms-md-1">
                        <div>
                            <div class="d-flex justify-content-center justify-content-md-start">

                                <div class="">
                                    <x-button class="btn-sm " data-bs-toggle="modal" data-bs-target="#uploadProfilePictureModal" type="button" color="primary">Unggah Foto</x-button>
                                </div>

                                {{-- modal upload profile picture --}}
                                <div class="modal fade text-start" id="uploadProfilePictureModal" aria-labelledby="modalLabel" aria-hidden="true" tabindex="-1">
                                    <div class="modal-dialog modal-md">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="modalLabel">Upload Pas Foto</h4>
                                                <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body mb-2">
                                                <div class="d-flex justify-content-center mb-1">
                                                    <div class="custom-aspect-ratio">
                                                        <img class="rounded" id="profilePicturePrev" src="/img/base-profile.png" alt="profile image">
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-center">
                                                    <form id="formEditProfile" action="{{ route('student.personal.update-photo') }}" method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="alert alert-danger p-1 w-100" id="profilePictureErrorMsg" style="display: none;"></div>

                                                        <div class="d-flex justify-content-center">
                                                            <label class="btn btn-sm btn-outline-primary" for="profilePictureInput">Pilih Foto</label>
                                                            <input id="profilePictureInput" name="profilePictureInput" type="file" accept="image/png, image/jpg, image/jpeg" hidden required>

                                                            <x-button class="btn-sm ms-1" type="submit" color="primary">Simpan</x-button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- .modal upload profile picture --}}
                            </div>
                            <p class="my-1 ">
                                <span class="">*Unggah foto ukuran 3x4 dengan format JPG, JPEG atau PNG, Ukuran maksimal 500KB</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <form id="formEditData" action="{{ route('student.personal.update-data') }}" method="post">
                @csrf
                <div class="card-body py-2 my-25 border-top row">
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
                            <x-input class="" id="nik" name="nik" type="text" value="{{ old('nik') }}" placeholder="NIK" maxlength="16" />
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
                        <div class="mb-1 ">
                            <x-label for="birthPlace">Tempat Lahir</x-label>
                            <x-input class="" id="birthPlace" name="birthPlace" value="{{ old('birthPlace') }}" placeholder="Tempat Lahir" />
                        </div>
                        <div class="mb-1">
                            <x-label for="birthDay">Tanggal Lahir</x-label>
                            <div class="row">
                                <div class="col-3 pe-0 ">
                                    <select class="form-select select2 " id="birthDay" name="birthDay" data-placeholder="DD" data-minimum-results-for-search="-1">
                                        <option value=""></option>
                                        @for ($i = 1; $i <= 31; $i++)
                                            <option value="{{ ($i < 10) ? '0' . $i : $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-5 ">
                                    <select class="form-select select2 " id="birthMonth" name="birthMonth" data-placeholder="MM" data-minimum-results-for-search="-1">
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
                                <div class="col-4 ps-0 ">
                                    <select class="form-select select2 " id="birthYear" name="birthYear" data-placeholder="YYYY" data-minimum-results-for-search="-1">
                                        <option value=""></option>
                                        @for ($i = now()->year - 25; $i <= now()->year; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="mb-1 ">
                            <x-label for="phone">Nomor <i>Handphone</i></x-label>
                            <x-input class="phone-mask " id="phone" name="phone" value="{{ old('phone') }}" placeholder="08xx xxxx xxxx" />
                        </div>
                        <div class="mb-1 ">
                            <x-label for="email"><i>Email</i></x-label>
                            <x-input class="" id="email" name="email" value="{{ old('email') }}" placeholder="email" />
                        </div>
                    </div>
                </div>

                <div class="card-body py-2 my-25 border-top row">
                    <div class="col-xl-6 col-md-6 col-12">
                        <div class="mb-1 ">
                            <x-label for="province">Provinsi</x-label>
                            <select class="form-select select2 " id="province" name="province" data-placeholder="Provinsi">
                                <option value=""></option>
                            </select>
                        </div>
                        <div class="mb-1 ">
                            <x-label for="city">Kabupaten/Kota</x-label>
                            <select class="form-select select2 " id="city" name="city" data-placeholder="Kabupaten/Kota">
                                <option value=""></option>
                            </select>
                        </div>
                        <div class="mb-1 ">
                            <x-label for="district">Kecamatan</x-label>
                            <select class="form-select select2 " id="district" name="district" data-placeholder="Kecamatan">
                                <option value=""></option>
                            </select>
                        </div>
                        <div class="mb-1 ">
                            <x-label for="village">Desa/Kelurahan</x-label>
                            <select class="form-select select2 " id="village" name="village" data-placeholder="Desa/Kelurahan">
                                <option value=""></option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6 col-12">
                        <div class="mb-1 ">
                            <x-label for="hamlet">Dusun/Lingkungan</x-label>
                            <x-input class="" id="hamlet" name="hamlet" type="text" value="{{ old('hamlet') }}" placeholder="Dusun/Lingkungan" />
                        </div>
                        <div class="mb-1 ">
                            <x-label for="associations">RT/RW</x-label>
                            <x-input class="" id="associations" name="associations" type="text" value="{{ old('associations') }}" placeholder="RT/RW" />
                        </div>
                        <div class="mb-1 ">
                            <x-label for="address">Alamat Jalan</x-label>
                            <x-input class="" id="address" name="address" type="text" value="{{ old('address') }}" placeholder="Alamat Jalan" />
                        </div>
                    </div>
                </div>

                <div class="card-body py-2 my-25 border-top row">
                    <div class="col-md-6 col-12">
                        <div class="mb-1 ">
                            <x-label for="mothersName">Nama Ibu Kandung</x-label>
                            <x-input class="" id="mothersName" name="mothersName" type="text" value="{{ old('mothersName') }}" placeholder="Nama Ibu Kandung" />
                        </div>
                        <div class="mb-1 ">
                            <x-label for="mothersPhone">Nomor <i>Handphone</i> Ibu</x-label>
                            <x-input class="" class="phone-mask" id="mothersPhone" name="mothersPhone" value="{{ old('mothersPhone') }}" placeholder="08xx xxxx xxxx" />
                        </div>
                        <div class="mb-1 ">
                            <x-label for="fathersName">Nama Ayah</x-label>
                            <x-input class="" id="fathersName" name="fathersName" type="text" value="{{ old('fathersName') }}" placeholder="Nama Ayah" />
                        </div>
                        <div class="mb-1 ">
                            <x-label for="fathersPhone">Nomor <i>Handphone</i> Ayah</x-label>
                            <x-input class="" class="phone-mask" id="fathersPhone" name="fathersPhone" value="{{ old('fathersPhone') }}" placeholder="08xx xxxx xxxx" />
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="mb-1 ">
                            <x-label for="guardsName">Nama Wali <small class="text-muted">(Opsional)</small></x-label>
                            <x-input class="" id="guardsName" name="guardsName" type="text" value="{{ old('guardsName') }}" placeholder="Nama Wali" />
                        </div>
                        <div class="mb-1 ">
                            <x-label for="guardsPhone">Nomor <i>Handphone</i> Wali <small class="text-muted">(Opsional)</small></x-label>
                            <x-input class="" class="phone-mask" id="guardsPhone" name="guardsPhone" value="{{ old('guardsPhone') }}" placeholder="08xx xxxx xxxx" />
                        </div>
                    </div>
                </div>

                <div class="card-body py2 my-25 border-top">
                    <div class="row">
                        <div class="d-grid col-lg-3 col-md-6 col-sm-12 ">
                            <x-button class="mb-1 " type="submit" color="success">Simpan Perubahan</x-button>
                        </div>
                        <div class="d-grid col-lg-3 col-md-6 col-sm-12 ">
                            <a class="btn btn-outline-secondary mb-1 " href="/data-diri" role="button">Batalkan</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('vendorScripts')
    <script src="/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="/app-assets/vendors/js/forms/cleave/cleave.min.js"></script>
    <script src="/app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
    <script src="/app-assets/vendors/js/forms/validation/additional-methods.min.js"></script>
@endsection

@push('scripts')
    <script>
        var profilePicture = "{{ session()->get('stu_profile_img') }}";
    </script>
    {{-- <script src="/js/student/pages/dashboard/personal-data-v1.1.5.js"></script> --}}
    <script>
        $(function() {
            ('use strict');

            // --------------------------------------------------------------------VAR
            var select2 = $('.select2'),
                ppModal = $("#uploadProfilePictureModal"),
                ppInput = $('#profilePictureInput'),
                ppPreview = $('#profilePicturePrev'),
                nik = $('#nik'),
                associations = $('#associations'),
                phone = $('.phone-mask'),
                formEditData = $('#formEditData'),
                formEditProfile = $('#formEditProfile'),
                provinceElement = $('#province'),
                cityElement = $('#city'),
                districtElement = $('#district'),
                villageElement = $('#village');

            // --------------------------------------------------------------------INIT
            // select2
            if (select2.length) {
                select2.each(function() {
                    var $this = $(this);
                    $this.wrap('<div class="position-relative"></div>');
                    $this.select2({
                        dropdownParent: $this.parent()
                    });
                });
            }

            // cleave
            if (nik.length) {
                new Cleave(nik, {
                    numericOnly: true,
                    blocks: [16]
                });
            }

            if (associations.length) {
                new Cleave(associations, {
                    numericOnly: true,
                    delimiters: ['/'],
                    blocks: [3, 3]
                });
            }

            if (phone.length) {
                phone.toArray().forEach(function(field) {
                    new Cleave(field, {
                        numericOnly: true,
                        delimiters: [' ', ' '],
                        blocks: [4, 4, 5]
                    });
                });
            }

            // jquery validation
            if (formEditData.length) {
                formEditData.validate({
                    rules: {
                        'nik': {
                            required: true,
                            minlength: 16
                        },
                        'gender': {
                            required: true
                        },
                        'birthPlace': {
                            required: true
                        },
                        'birthDay': {
                            required: true
                        },
                        'birthMonth': {
                            required: true
                        },
                        'birthYear': {
                            required: true
                        },
                        'phone': {
                            required: true,
                            minlength: 12,
                            maxlength: 15
                        },
                        'email': {
                            required: true,
                            email: true
                        },
                        'province': {
                            required: true
                        },
                        'city': {
                            required: true
                        },
                        'district': {
                            required: true
                        },
                        'village': {
                            required: true
                        },
                        'hamlet': {
                            required: true
                        },
                        'associations': {
                            required: true
                        },
                        'address': {
                            required: true
                        },
                        'mothersName': {
                            required: true
                        },
                        'mothersPhone': {
                            required: true,
                            minlength: 12,
                            maxlength: 15
                        },
                        'fathersName': {
                            required: true
                        },
                        'fathersPhone': {
                            required: true,
                            minlength: 12,
                            maxlength: 15
                        },
                        'guardsPhone': {
                            minlength: 12,
                            maxlength: 15
                        }
                    },
                    messages: {
                        'nik': {
                            required: '*Bidang ini harus diisi.',
                            minlength: '*NIK terdiri atas 16 digit angka'
                        },
                        'gender': {
                            required: '*Bidang ini harus dipilih.'
                        },
                        'birthPlace': {
                            required: '*Bidang ini harus diisi.'
                        },
                        'birthDay': {
                            required: '*Bidang ini harus dipilih.'
                        },
                        'birthMonth': {
                            required: '*Bidang ini harus dipilih.'
                        },
                        'birthYear': {
                            required: '*Bidang ini harus dipilih.'
                        },
                        'phone': {
                            required: '*Bidang ini harus diisi.',
                            minlength: '*Mohon masukkan nomor telepon yang valid.',
                            maxlength: '*Mohon masukkan nomor telepon yang valid.',
                        },
                        'email': {
                            required: '*Bidang ini harus diisi.',
                            email: '*Mohon masukkan alamat email yang valid.'
                        },
                        'province': {
                            required: '*Bidang ini harus dipilih.'
                        },
                        'city': {
                            required: '*Bidang ini harus dipilih.'
                        },
                        'district': {
                            required: '*Bidang ini harus dipilih.'
                        },
                        'village': {
                            required: '*Bidang ini harus dipilih.'
                        },
                        'hamlet': {
                            required: '*Bidang ini harus diisi.'
                        },
                        'associations': {
                            required: '*Bidang ini harus diisi.'
                        },
                        'address': {
                            required: '*Bidang ini harus diisi.'
                        },
                        'mothersName': {
                            required: '*Bidang ini harus diisi.'
                        },
                        'mothersPhone': {
                            required: '*Bidang ini harus diisi.',
                            minlength: '*Mohon masukkan nomor telepon yang valid.',
                            maxlength: '*Mohon masukkan nomor telepon yang valid.',
                        },
                        'fathersName': {
                            required: '*Bidang ini harus diisi.'
                        },
                        'fathersPhone': {
                            required: '*Bidang ini harus diisi.',
                            minlength: '*Mohon masukkan nomor telepon yang valid.',
                            maxlength: '*Mohon masukkan nomor telepon yang valid.',
                        },
                        'guardsPhone': {
                            minlength: '*Mohon masukkan nomor telepon yang valid.',
                            maxlength: '*Mohon masukkan nomor telepon yang valid.',
                        }
                    }
                });
            }

            if (formEditProfile.length) {
                formEditProfile.validate({
                    ignore: [],
                    rules: {
                        profilePictureInput: {
                            required: true,
                            extension: "jpg|jpeg|png",
                            filesize: 500 * 1024,
                        }
                    },
                    messages: {
                        profilePictureInput: {
                            required: "*Gambar harus diisi.",
                            extension: "*Hanya menerima file gambar dengan format jpg, jpeg atau png.",
                            filesize: "*Ukuran gambar tidak boleh lebih dari 500 KB."
                        }
                    },
                    errorPlacement: function(error, element) {
                        console.log("error", error);
                        console.log("element", element);
                        $('#profilePictureErrorMsg').html('<p class="text-center mb-0"><small>' + error.text() + '</small></p>');
                        $('#profilePictureErrorMsg').show();
                    },
                });
            }

            $.validator.addMethod('filesize', function(value, element, param) {
                return this.optional(element) || (element.files[0].size <= param);
            }, 'File size must be less than {0}');

            // preview photos
            if (ppInput.length) {
                ppInput.change(function() {
                    previewProfilePict();
                });
            }

            // --------------------------------------------------------------------CALL
            getData();

            provinceElement.change(function() {
                districtElement.empty().append('<option value=""></value>');
                villageElement.empty().append('<option value=""></value>');

                generateSelectCity(this.value)
            });

            cityElement.change(function() {
                villageElement.empty().append('<option value=""></value>');
                generateSelectDistrict(this.value)
            });

            districtElement.change(function() {
                generateSelectVillage(this.value)
            });

            // when modal dismiss
            ppModal.on("hidden.bs.modal", function() {
                ppInput.val('');
                ppPreview.attr("src", profilePicture ? profilePicture : "/img/base-profile.png");
                $('#profilePictureErrorMsg').css("display", "none");
            });

            // --------------------------------------------------------------------FUNC
            // provinces
            function generateSelectProvince(selected = null) {
                provinceElement.empty().append('<option value></value>');

                $.ajax({
                    url: '/json/provinces',
                    method: 'get',
                    dataType: 'json',
                    success: function(provinces) {
                        provinces.forEach(province => {
                            let v = `${province.code}|${province.name}`;
                            let s = (v == selected) ? 'selected' : '';

                            provinceElement.append(`<option value="${v}" ${s}>${province.name}</option>`);
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error('gagal mendapatkan data.', status, error);
                    }
                });
            }

            // cities
            function generateSelectCity(provinceCode, selected = null) {
                cityElement.empty().append('<option value=""></value>');

                let code = provinceCode.split('|');

                $.ajax({
                    url: `/json/cities/${code[0]}`,
                    method: 'get',
                    dataType: 'json',
                    success: function(cities) {
                        cities.forEach(city => {
                            let v = `${city.code}|${city.name}`;
                            let s = (v == selected) ? 'selected' : '';

                            cityElement.append(`<option value="${v}" ${s}>${city.name}</option>`);
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error('gagal mendapatkan data.', status, error);
                    }
                });
            }

            // district
            function generateSelectDistrict(cityCode, selected = null) {
                districtElement.empty().append('<option value=""></value>');

                let code = cityCode.split('|');

                $.ajax({
                    url: `/json/districts/${code[0]}`,
                    method: 'get',
                    dataType: 'json',
                    async: false,
                    success: function(districts) {
                        districts.forEach(district => {
                            let v = `${district.code}|${district.name}`;
                            let s = (v == selected) ? 'selected' : '';

                            districtElement.append(`<option value="${v}" ${s}>${district.name}</option>`);
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error('gagal mendapatkan data.', status, error);
                    }
                });
            }

            // villages
            function generateSelectVillage(districtCode, selected = null) {
                villageElement.empty().append('<option value=""></value>');

                let code = districtCode.split('|');

                $.ajax({
                    url: `/json/villages/${code[0]}`,
                    method: 'get',
                    dataType: 'json',
                    async: false,
                    success: function(villages) {
                        villages.forEach(village => {
                            let v = `${village.code}|${village.name}`;
                            let s = (v == selected) ? 'selected' : '';

                            villageElement.append(`<option value="${v}" ${s}>${village.name}</option>`);
                        });
                    }
                });
            }

            // get student's data
            function getData() {
                $.ajax({
                    url: "/json/get-data-pribadi-siswa",
                    method: 'get',
                    dataType: 'json',
                    success: function(studentData) {
                        let d = studentData.data;
                        date = new Date(d.tanggal_lahir);

                        $('#profilePreview, #profilePicturePrev').attr('src', d.pasfoto || '/img/base-profile.png');

                        $('#nik').val(d.nik);
                        $('#gender').val(d.jenis_kelamin).change();
                        $('#birthPlace').val(d.tempat_lahir);
                        $('#birthDay').val(date.getDate()).change();
                        $('#birthMonth').val(date.getMonth() + 1).change(); // month start from 0 to 11
                        $('#birthYear').val(date.getFullYear()).change();
                        $('#phone').val(d.telepon);
                        $('#email').val(d.email);

                        generateSelectProvince(d.kode_provinsi ? `${d.kode_provinsi}|${d.provinsi}` : '');
                        generateSelectCity(`${d.kode_provinsi}|${d.provinsi}`, `${d.kode_kabupaten}|${d.kabupaten}`);
                        generateSelectDistrict(`${d.kode_kabupaten}|${d.kabupaten}`, `${d.kode_kecamatan}|${d.kecamatan}`);
                        generateSelectVillage(`${d.kode_kecamatan}|${d.kecamatan}`, `${d.kode_desa}|${d.desa}`);

                        $('#hamlet').val(d.dusun);
                        $('#associations').val(d.rtrw);
                        $('#address').val(d.alamat_jalan);

                        $('#mothersName').val(d.nama_ibu);
                        $('#mothersPhone').val(d.telepon_ibu);
                        $('#fathersName').val(d.nama_ayah);
                        $('#fathersPhone').val(d.telepon_ayah);
                        $('#guardsName').val(d.nama_wali);
                        $('#guardsPhone').val(d.telepon_wali);

                        $('#placeholder').hide();
                        $('#content').show();
                    },
                    error: function(xhr, status, error) {
                        $('#placeholder, #content').hide();
                        $('#error-section').show();
                    }
                });
            }

            function previewProfilePict() {
                let input = ppInput[0],
                    preview = ppPreview[0];

                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        preview.src = e.target.result;
                    };

                    reader.readAsDataURL(input.files[0]);
                }
            }
        });
    </script>
@endpush
