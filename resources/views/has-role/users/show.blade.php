@extends('layouts.has-role.auth', ['title' => 'Detail User'])

@section('vendorStyles')
    <link type="text/css" href="/app-assets/vendors/css/forms/select/select2.min.css" rel="stylesheet">
    <link type="text/css" href="/app-assets/css/plugins/forms/form-validation.css" rel="stylesheet">
@endsection

@section('content')
    <div class="content-body">
        <div class="card">
            <form action="#" method="POST">
                <div class="card-header">
                    <h4 class="card-title">Detail User</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-2">
                                <x-label for="name">Nama</x-label>
                                <x-input id="name" name="name" />
                            </div>
                            <div class="mb-2">
                                <x-label for="username">Username</x-label>
                                <x-input id="username" name="username" />
                            </div>
                            <div class="mb-2">
                                <x-label for="status">Status</x-label>
                                <x-select class="select2 form-select" id="status" name="status" data-minimum-results-for-search="-1" data-placeholder="Pilih Status">
                                    <x-empty-option />
                                    <option value="1">Aktif</option>
                                    <option value="2">Tidak Aktif</option>
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
                            <x-label for="password">Konfirmasi Password</x-label>
                            <x-input-password>
                                <x-input id="password" name="password" type="password" autocomplete="password" />
                            </x-input-password>
                        </div>
                    </div>
                    <div class="alert alert-primary alert-dismissible fade show my-2" role="alert">
                        <div class="alert-body p-2">
                            <span>Konfirmasi password anda untuk menyimpan perubahan data diatas.</span>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-start gap-2">
                        <x-button color="success">Simpan Perubahan</x-button>
                        <a class="btn btn-outline-secondary " href="{{ route('users.index') }}">Batalkan</a>
                    </div>
                </div>
            </form>
        </div>

        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Hapus User</h5>
            </div>
            <div class="card-body">
                <div class="alert alert-danger alert-dismissible fade show my-2" role="alert">
                    <div class="alert-body p-2">
                        <span>Apakah anda yakin ingin menghapus User ini?</span>
                    </div>
                </div>

                <x-checkbox class="form-check-danger" identifier="confirmation" label="Saya yakin untuk menghapus User ini" variant="danger" />

                <x-button class="mt-2" data-bs-toggle="modal" data-bs-target="#delete-user" type="button" color="danger">Hapus Data User</x-button>
                <x-modal modal_id="delete-user" label_by="deleteUserModal">
                    <x-modal.header>
                        <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
                    </x-modal.header>
                    <x-modal.body>
                        <h5 class="text-center mt-2">Hapus User</h5>
                        <p>Apakah Anda yakin ingin menghapus user ini? Data yang sudah di hapus tidak bisa di kembalikan kembali</p>
                    </x-modal.body>
                    <x-modal.footer class="justify-content-center mb-3">
                        <x-button color="danger">Ya, Hapus</x-button>
                        <x-button data-bs-dismiss="modal" color="secondary">Batalkan</x-button>
                    </x-modal.footer>
                </x-modal>
            </div>
        </div>
    </div>
@endsection

@section('vendorScripts')
    <script src="/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="/app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
@endsection

@push('scripts')
    <script>
        var username = '{{ $username ?? '' }}'
    </script>
    <script>
        $(function() {
            'use strict';

            var select = $('.select2'),
                wilayah = $('#wilayah'),
                role = $('#role'),
                sekolah = $('#sekolah'),
                sekolah_asal = $('#sekolah_asal');

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
                url: `/panel/users/json/single-user/${username}`,
                method: 'get',
                dataType: 'json',
                success: function(user) {
                    $('#name').val(user.name);
                    $('#username').val(user.username);
                    $('#status').val(user.status).trigger('change');
                    loadRoles(user.role)
                    // if (user.role === '3') {
                    //     $('#input-wilayah').show()
                    //     loadRegions(user.cabdin_id)
                    // }
                    switch (user.role) {
                        case '3':
                            $('#input-wilayah').show();
                            loadRegions(user.cabdin_id);
                            break;
                        case '4':
                            $('#input-sekolah').show();
                            loadSchools(user.sekolah_id);
                            break;
                        case '5':
                            $('#input-sekolah-asal').show();
                            loadOriginSchool(user.sekolah_asal_id);
                            break;
                    }
                },
                error: function(xhr, status, error) {
                    console.error("Failed to get data single user.", status, error, xhr);
                }
            });

            function loadRoles(value = '') {
                // Data Roles Collections
                $.ajax({
                    url: '/panel/users/json/rolesCollections',
                    method: 'get',
                    dataType: 'json',
                    success: function(roles) {
                        role.empty().append('<option value=""></option>');
                        roles.forEach(item => {
                            role.append(`<option value="${item.id}" ${item.id.toString() === value ? 'selected' : ''}>${item.name}</option>`)
                        })
                    },
                    error: function(xhr, status, error) {
                        console.error('Failed to get data roles.', status, error);
                    }
                })
            }

            function loadRegions(value = '') {
                // Data Wilayah Collections
                $.ajax({
                    url: '/panel/users/json/regionsCollections',
                    method: 'get',
                    dataType: 'json',
                    success: function(regions) {
                        wilayah.empty().append('<option value=""></option>');
                        regions.forEach(region => {
                            let selected = region.id.toString() === value ? 'selected' : '';
                            wilayah.append(`<option value="${region.id}" ${selected}>${region.name}</option>`)
                        })
                    },
                    error: function(xhr, status, error) {
                        console.error('Failed to get data wilayah.', status, error);
                    }
                })
            }

            function loadSchools(value = '') {
                // Data Sekolah Tujuan Collections
                $.ajax({
                    url: '/panel/users/json/schoolsCollections',
                    method: 'get',
                    dataType: 'json',
                    success: function(schools) {
                        sekolah.empty().append('<option value=""></option>');
                        schools.forEach(school => {
                            let selected = school.id.toString() === value ? 'selected' : '';
                            sekolah.append(`<option value="${school.id}" ${selected}>${school.name}</option>`)
                        })
                    },
                    error: function(xhr, status, error) {
                        console.error('Failed to get data sekolah.', status, error);
                    }
                })
            }

            function loadOriginSchool(value = '') {
                // Data Sekolah Asal Collections
                $.ajax({
                    url: '/panel/users/json/originSchoolsCollections',
                    method: 'get',
                    dataType: 'json',
                    success: function(origin_schools) {
                        sekolah_asal.empty().append('<option value=""></option>');
                        origin_schools.forEach(school => {
                            let selected = school.id.toString() === value ? 'selected' : '';
                            sekolah_asal.append(`<option value="${school.id}" ${selected}>${school.name}</option>`)
                        })
                    },
                    error: function(xhr, status, error) {
                        console.error('Failed to get data sekolah asal.', status, error);
                    }
                })
            }

            // Conditional For selected role
            $('#role').change(function() {
                let value = $(this).val()

                $('#input-wilayah, #input-sekolah, #input-sekolah-asal').hide();

                switch (value) {
                    case '3':
                        $('#input-wilayah').show();
                        loadRegions();
                        break;
                    case '4':
                        $('#input-sekolah').show();
                        loadSchools();
                        break;
                    case '5':
                        $('#input-sekolah-asal').show();
                        loadOriginSchool();
                        break;
                }
            })
        })
    </script>
@endpush
