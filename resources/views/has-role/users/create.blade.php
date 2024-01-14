@extends('layouts.has-role.auth', ['title' => 'Tambah user'])

@section('vendorStyles')
    <link type="text/css" href="/app-assets/vendors/css/forms/select/select2.min.css" rel="stylesheet">
    <link type="text/css" href="/app-assets/css/plugins/forms/form-validation.css" rel="stylesheet">
@endsection

@section('vendorScripts')
    <script src="/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="/app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
@endsection

@section('content')
    <div class="content-body">
        @if (session()->get('stat'))
            <div class="alert alert-{{ session()->get('stat') }} p-1">
                <p class="text-center mb-0">{{ session()->get('msg') }}</p>
            </div>
        @endif
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Tambah User</h4>
            </div>
            <div class="card-body">

                <form id="form-users" action="{{ route('users.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-2">
                                <x-label for="nama">Nama</x-label>
                                <x-input id="nama" name="nama" placeholder="Masukkan nama" />
                            </div>
                            <div class="mb-2">
                                <x-label for="nama_pengguna">Username</x-label>
                                <x-input id="nama_pengguna" name="nama_pengguna" placeholder="Masukkan username" />
                            </div>
                            <div class="mb-2">
                                <x-label for="status_aktif">Status</x-label>
                                <x-select class="select2 form-select" id="status_aktif" name="status_aktif" data-placeholder="Pilih Status">
                                    <x-empty-option />
                                    <option value="a">Aktif</option>
                                    <option value="n">Tidak Aktif</option>
                                </x-select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-2">
                                <x-label for="role">Role</x-label>
                                <x-select class="select2 form-select" id="role" name="role" data-placeholder="Pilih Role">
                                    <x-empty-option />
                                </x-select>
                            </div>
                            <div class="mb-2" id="input-wilayah" style="display: none">
                                <x-label for="wilayah">Wilayah</x-label>
                                <x-select class="select2 form-select" id="wilayah" name="wilayah" data-placeholder="Pilih Wilayah">
                                    <x-empty-option />
                                </x-select>
                            </div>
                            <div class="mb-2" id="input-sekolah" style="display: none">
                                <x-label for="sekolah">Sekolah</x-label>
                                <x-select class="select2 form-select" id="sekolah" name="sekolah" data-placeholder="Pilih Sekolah">
                                    <x-empty-option />
                                </x-select>
                            </div>
                            <div class="mb-2" id="input-sekolah-asal" style="display: none">
                                <x-label for="sekolah_asal">Sekolah Asal</x-label>
                                <x-select class="select2 form-select" id="sekolah_asal" name="sekolah_asal" data-placeholder="Pilih Sekolah Asal">
                                    <x-empty-option />
                                </x-select>
                            </div>
                        </div>
                    </div>
                    <x-separator marginY="2" />
                    <div class="row">
                        <div class="col-sm-6">
                            <h4 class="card-title"> Password </h4>
                            <div class="mb-2">
                                <x-label for="password">Password</x-label>
                                <x-input-password>
                                    <x-input id="password" name="password" type="password" autocomplete="password" />
                                </x-input-password>
                            </div>
                            <div class="mb-2">
                                <x-label for="password_confirmation">Masukkan Ulang Password</x-label>
                                <x-input-password>
                                    <x-input id="password_confirmation" name="password_confirmation" type="password" autocomplete="password_confirmation" />
                                </x-input-password>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-start gap-2 mt-2">
                        <x-button color="success">Tambah User</x-button>
                        <x-link href="{{ route('users.index') }}" color="secondary">Batalkan</x-link>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(function() {
            'use strict';

            var role = $('#role'),
                select = $('.select2'),
                wilayah = $('#wilayah'),
                sekolah = $('#sekolah'),
                sekolah_asal = $('#sekolah_asal'),
                form = $('#form-users');

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

            // Custom Validation
            $.validator.addMethod('noSpace', (value, element) => value.indexOf(" ") < 0 && value != "")

            // Form Validation
            if (form.length) {
                form.validate({
                    rules: {
                        nama: {
                            required: true,
                            minlength: 6,
                        },
                        nama_pengguna: {
                            required: true,
                            minlength: 6,
                            noSpace: true
                        },
                        status_aktif: {
                            required: true
                        },
                        role: {
                            required: true
                        },
                        password: {
                            required: true,
                            minlength: 6,
                        },
                        password_confirmation: {
                            required: true,
                            minlength: 6,
                            equalTo: '#password'
                        },
                    },
                    messages: {
                        nama: {
                            required: 'Nama tidak boleh kosong.',
                            minlength: 'Nama harus lebih dari 6 karakter.',
                        },
                        nama_pengguna: {
                            required: 'Nama Pengguna tidak boleh kosong.',
                            minlength: 'Nama Pengguna harus lebih dari 6 karakter.',
                            noSpace: 'Nama Pengguna tidak mengandung spasi.'
                        },
                        status_aktif: {
                            required: 'Pilih salah satu status.'
                        },
                        role: {
                            required: 'Pilih salah satu role.'
                        },
                        password: {
                            required: 'Password tidak boleh kosong.',
                            minlength: 'Panjang Password minimal 6 Karater.',
                        },
                        password_confirmation: {
                            required: 'Password tidak boleh kosong.',
                            minlength: 'Panjang Password minimal 6 Karater.',
                            equalTo: 'Password tidak sama dengan Konfirmasi Password.',
                        },
                    },
                });
            }

            $.ajax({
                url: '/panel/users/json/rolesCollections',
                method: 'get',
                dataType: 'json',
                success: function(roles) {
                    role.empty().append('<option value=""></option>');

                    roles.forEach(item => {
                        role.append(`<option value="${item.id}">${item.name}</option>`)
                    })

                },
                error: function(xhr, status, error) {
                    console.error('Failed to get data roles.', status, error);
                }
            })

            $('#role').change(function() {
                let value = $(this).val()

                $('#input-wilayah, #input-sekolah, #input-sekolah-asal').hide();

                switch (value) {
                    case '3':
                        $('#input-wilayah').show();
                        wilayah.rules('add', {
                            required: true,
                            messages: {
                                required: 'Pilih salah satu wilayah.'
                            }
                        });
                        break;
                    case '4':
                        $('#input-sekolah').show();
                        sekolah.rules('add', {
                            required: true,
                            messages: {
                                required: 'Pilih salah satu sekolah.'
                            }
                        });
                        break;
                    case '5':
                        $('#input-sekolah-asal').show();
                        sekolah_asal.rules('add', {
                            required: true,
                            messages: {
                                required: 'Pilih salah satu sekolah asal.'
                            }
                        });
                        break;
                }
            })

            $.ajax({
                url: '/panel/users/json/regionsCollections',
                method: 'get',
                dataType: 'json',
                success: function(regions) {
                    wilayah.empty().append('<option value=""></option>');
                    regions.forEach(region => {
                        wilayah.append(`<option value="${region.id}">${region.name}</option>`)
                    })
                },
                error: function(xhr, status, error) {
                    console.error('Failed to get data wilayah.', status, error);
                }
            })

            $.ajax({
                url: '/panel/sekolah/json/schools-collections',
                method: 'get',
                dataType: 'json',
                success: function(schools) {
                    sekolah.empty().append('<option value=""></option>');
                    schools.forEach(school => {
                        sekolah.append(`<option value="${school.id}">${school.nama_sekolah}</option>`)
                    })
                },
                error: function(xhr, status, error) {
                    console.error('Failed to get data sekolah.', status, error);
                }
            })

            $.ajax({
                url: '/panel/users/json/originSchoolsCollections',
                method: 'get',
                dataType: 'json',
                success: function(origin_schools) {
                    sekolah_asal.empty().append('<option value=""></option>');
                    origin_schools.forEach(school => {
                        sekolah_asal.append(`<option value="${school.id}">${school.name}</option>`)
                    })
                },
                error: function(xhr, status, error) {
                    console.error('Failed to get data sekolah asal.', status, error);
                }
            })
        })
    </script>
@endpush
