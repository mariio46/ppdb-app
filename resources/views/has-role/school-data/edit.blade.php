@extends('layouts.has-role.auth', ['title' => 'Edit Sekolah'])

@section('vendorStyles')
    <link type="text/css" href="/app-assets/vendors/css/forms/select/select2.min.css" rel="stylesheet">
    <link type="text/css" href="/app-assets/css/plugins/forms/form-validation.css" rel="stylesheet">
@endsection

@section('vendorScripts')
    <script src="/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="/app-assets/vendors/js/forms/cleave/cleave.min.js"></script>
    <script src="/app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
    <script src="/app-assets/vendors/js/forms/validation/additional-methods.min.js"></script>
@endsection

@section('content')
    <div class="content-body">

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit Logo Sekolah</h3>
            </div>
            <div class="card-body">
                <div class="d-md-flex align-items-end">
                    <div class="d-flex justify-content-center mb-1">
                        <div class="custom-aspect-ratio">
                            <img class="rounded" id="profileLogoSekolahPreview" src="{{ Storage::url('images/static/default-upload.png') }}" alt="profile image" height="150">
                        </div>
                    </div>
                    <div class="ms-md-1">
                        <div>
                            <div class="d-flex justify-content-center justify-content-md-start">

                                <x-button class="btn-sm" data-bs-toggle="modal" data-bs-target="#upload-logo-sekolah" type="button" color="primary">Unggah Logo Baru</x-button>
                                <x-modal modal_id="upload-logo-sekolah" label_by="uploadLogoSekolah" align="modal-dialog-centered">
                                    <x-modal.header>
                                        <h5 class="modal-title">Upload Logo Baru?</h5>
                                        <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
                                    </x-modal.header>
                                    <x-modal.body>

                                        <div class="d-flex justify-content-center mb-1">
                                            <div class="custom-aspect-ratio">
                                                <img class="rounded" id="profileLogoSekolah" src="{{ Storage::url('images/static/default-upload.png') }}" alt="profile image" height="150">
                                            </div>
                                        </div>

                                        <form id="form-upload-logo" enctype="multipart/form-data" action="{{ route('school-data.logos-update', $sekolah_id) }}" method="POST">
                                            @csrf
                                            <x-input id="logo" name="logo" type="file" required />
                                            <x-modal.footer class="justify-content-center my-1">
                                                <x-button color="success">Ya, Upload</x-button>
                                                <x-button data-bs-dismiss="modal" color="secondary">Batalkan</x-button>
                                            </x-modal.footer>
                                        </form>
                                    </x-modal.body>
                                </x-modal>
                            </div>
                            <p class="my-1 ">
                                <span class="">*Unggah Logo dengan format JPG, JPEG atau PNG, Ukuran maksimal 500KB</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <div class="card-title">Edit Informasi Sekolah</div>
            </div>
            <div class="card-body">

                <form id="school-data-form" action="{{ route('school-data.update', $sekolah_id) }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-2">
                                <x-label for="nama_kepsek">Nama Kepala Sekolah</x-label>
                                <x-input id="nama_kepsek" name="nama_kepsek" placeholder="Masukkan nama kepala sekolah" />
                            </div>
                            <div class="mb-2">
                                <x-label for="nip_kepsek">NIP Kepala Sekolah</x-label>
                                <x-input id="nip_kepsek" name="nip_kepsek" placeholder="Masukkan NIP Kepala Sekolah" />
                            </div>
                            <div class="mb-2">
                                <x-label for="nama_kappdb">Nama Ketua PPDB</x-label>
                                <x-input id="nama_kappdb" name="nama_kappdb" placeholder="Masukkan nama ketua PPDB" />
                            </div>
                            <div class="mb-2">
                                <x-label for="nip_kappdb">NIP Ketua PPDB</x-label>
                                <x-input id="nip_kappdb" name="nip_kappdb" placeholder="Masukkan NIP ketua PPDB" />
                            </div>
                            <div class="mb-2">
                                <x-label for="alamat_jalan">Alamat Jalan</x-label>
                                <x-input id="alamat_jalan" name="alamat_jalan" placeholder="Masukkan Alamat Jalan Sekolah" />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-2">
                                <x-label for="kabupaten">Kabupaten</x-label>
                                <x-select class="select2 form-select" id="kabupaten" name="kabupaten" data-placeholder="Pilih Kabupaten">
                                    <x-empty-option />
                                </x-select>
                            </div>
                            <div class="mb-2" id="input-kecamatan" style="display: none">
                                <x-label for="kecamatan">Kecamatan</x-label>
                                <x-select class="select2 form-select" id="kecamatan" name="kecamatan" data-placeholder="Pilih Kecamatan">
                                    <x-empty-option />
                                </x-select>
                            </div>
                            <div class="mb-2">
                                <x-label for="desa">Kelurahan</x-label>
                                <x-input id="desa" name="desa" placeholder="Masukkan nama desa" />
                            </div>
                            <div class="mb-2">
                                <x-label for="rtrw">RT / RW</x-label>
                                <x-input id="rtrw" name="rtrw" placeholder="Masukkan RT/RW" />
                            </div>
                        </div>
                    </div>
                    <x-separator marginY="2" />
                    <div class="d-flex align-items-center justify-content-start gap-2 mt-2">
                        <x-button color="success">Simpan Perubahan</x-button>
                        <x-link href="{{ route('school-data.index') }}" color="secondary">Batalkan</x-link>
                    </div>
                </form>

            </div>
        </div>

    </div>
@endsection

@push('scripts')
    <script>
        var sekolah_id = '{{ $sekolah_id }}'
    </script>
    <script>
        $(function() {
            'use strict';

            var select = $('.select2'),
                kabupaten = $('#kabupaten'),
                formData = $('#school-data-form'),
                formLogo = $('#form-upload-logo'),
                logo = $('#logo'),
                profileLogoSekolahPreview = $('#profileLogoSekolah'),
                rtrw = $('#rtrw'),
                kecamatan = $('#kecamatan');

            select.each(function() {
                var $this = $(this);
                $this.wrap('<div class="position-relative"></div>');
                $this.select2({
                    // the following code is used to disable x-scrollbar when click in select input and
                    // take 100% width in responsive also
                    dropdownAutoWidth: true,
                    width: '100%',
                    dropdownParent: $this.parent()
                });
            });

            $.ajax({
                url: `/panel/data-sekolah/json/school/${sekolah_id}`,
                method: 'get',
                dataType: 'json',
                success: function(school) {
                    console.log('Data Sekolah : ', school);
                    $('#nama_kepsek').val(school.nama_kepsek);
                    $('#nip_kepsek').val(school.nip_kepsek);
                    $('#nama_kappdb').val(school.nama_kappdb);
                    $('#nip_kappdb').val(school.nip_kappdb);
                    $('#alamat_jalan').val(school.alamat_jalan);
                    $('#desa').val(school.desa);
                    $('#rtrw').val(school.rtrw);
                    if (school.logo !== null) {
                        $('#profileLogoSekolahPreview').attr('src', school.logo);
                        profileLogoSekolahPreview.attr('src', school.logo)
                    };

                    loadCities(school.kode_kabupaten, school.kabupaten);
                    loadDistrict(school.kode_kabupaten, school.kode_kecamatan);
                },
                error: function(xhr, status, error) {
                    console.error("Failed to get data single school.", status, error, xhr);
                }
            });

            // List Kota/Kabupaten
            function loadCities(code, name) {
                $.ajax({
                    url: '/panel/get-city',
                    method: 'get',
                    dataType: 'json',
                    success: function(cities) {

                        kabupaten.empty().append('<option value=""></option>');

                        cities.forEach(item => {
                            let merge = `${code}|${name}`;
                            let value = `${item.code}|${item.name}`;
                            let selected_item = value === merge ? 'selected' : '';
                            kabupaten.append(`<option value="${value}" ${selected_item}>${item.name}</option>`)
                        })
                    },
                    error: function(xhr, status, error) {
                        console.error("Failed to get data kabupaten.", status, error, xhr);
                    }
                });
            }

            // Kecamatan
            function loadDistrict(identifier, params = '') {
                $.ajax({
                    url: `/panel/data-sekolah/json/districts/${identifier}`,
                    method: 'get',
                    dataType: 'json',
                    success: function(districts) {
                        // console.log('Kecamatan : ', districts);
                        $('#input-kecamatan').show();
                        kecamatan.empty().append('<option value=""></option>');

                        districts.forEach(item => {
                            let selected = item.value === params ? 'selected' : '';
                            let value = `${item.value}|${item.label}`;
                            kecamatan.append(`<option value="${value}" ${selected}>${item.label}</option>`)
                        })
                    },
                    error: function(xhr, status, error) {
                        console.error("Failed to get data kabupaten.", status, error, xhr);
                    }
                });
            }

            $('#kabupaten').change(function() {
                let value = $(this).val().split('|');
                let result = value[0];
                console.log(result);
                loadDistrict(result)
            })

            // Cleave
            if (rtrw.length) {
                new Cleave(rtrw, {
                    numberOnly: true,
                    delimiters: ['/'],
                    blocks: [3, 3]
                })
            }

            // Form Validation School Data
            if (formData.length) {
                formData.validate({
                    rules: {
                        // Column 1
                        nama_kepsek: {
                            required: true,
                        },
                        nip_kepsek: {
                            required: true,
                            digits: true,
                            minlength: 18,
                            maxlength: 18,
                        },
                        nama_kappdb: {
                            required: true,
                        },
                        nip_kappdb: {
                            required: true,
                            digits: true,
                            minlength: 18,
                            maxlength: 18,
                        },
                        alamat_jalan: {
                            required: true,
                        },
                        // Column 2
                        kabupaten: {
                            required: true,
                        },
                        kecamatan: {
                            required: true,
                        },
                        desa: {
                            required: true,
                        },
                        rtrw: {
                            required: true,
                        },
                    },
                    messages: {
                        // Column 1
                        nama_kepsek: {
                            required: 'Nama Kepala Sekolah tidak boleh kosong!',
                        },
                        nip_kepsek: {
                            required: 'Nip Kepala Sekolah tidak boleh kosong!',
                            digits: 'Nip Kepala Sekolah tidak boleh mengandung huruf!',
                            minlength: 'Nip Kepala Sekolah tidak boleh kurang dari 18 digit!',
                            maxlength: 'Nip Kepala Sekolah tidak boleh lebih dari 18 digit!',
                        },
                        nama_kappdb: {
                            required: 'Nama Ketua PPDB tidak boleh kosong!',
                        },
                        nip_kappdb: {
                            required: 'Nip Ketua PPDB tidak boleh kosong!',
                            digits: 'Nip Ketua PPDB tidak boleh mengandung huruf!',
                            minlength: 'Nip Kepala Sekolah tidak boleh kurang dari 18 digit!',
                            maxlength: 'Nip Kepala Sekolah tidak boleh lebih dari 18 digit!',
                        },
                        alamat_jalan: {
                            required: 'Alamat tidak boleh kosong!',
                        },
                        // Column 2
                        kabupaten: {
                            required: 'Pilih salah satu kabupaten!',
                        },
                        kecamatan: {
                            required: 'Pilih salah satu kecamatan!',
                        },
                        desa: {
                            required: 'Desa tidak boleh kosong!',
                        },
                        rtrw: {
                            required: 'RT/RW tidak boleh kosong!',
                        },
                    },
                })
            }

            // Form Validation Logo Sekolah
            if (formLogo.length) {
                formLogo.validate({
                    ignore: [],
                    rules: {
                        logo: {
                            required: true,
                            extension: "jpg|jpeg|png",
                            maxsize: 500 * 1024,
                        }
                    },
                    messages: {
                        logo: {
                            required: 'Tolong unggah Logo Sekolah!',
                            extension: "Hanya menerima dokumen dengan format .jpg, .png, .jpeg.",
                            maxsize: "Ukuran dokumen tidak boleh lebih dari 500 KB.",
                        }
                    },
                })
            }

            // Event listener for the change event of the logo input
            logo.change(function(event) {
                // Check if a file is selected
                if (event.target.files && event.target.files[0]) {
                    var reader = new FileReader();

                    // Set the preview image source when the file is loaded
                    reader.onload = function(e) {
                        profileLogoSekolahPreview.attr('src', e.target.result);
                    };

                    // Read the selected file as a data URL
                    reader.readAsDataURL(event.target.files[0]);
                }
            });
        })
    </script>
@endpush
