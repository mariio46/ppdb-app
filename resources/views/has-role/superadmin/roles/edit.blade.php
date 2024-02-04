@extends('layouts.has-role.auth', ['title' => 'Edit Role'])

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
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    Edit Role
                </div>
            </div>
            <div class="card-body">
                <form id="form-role" action="{{ route('roles.update', $id) }}" method="POST">
                    @csrf
                    <div class="mb-2">
                        <x-label for="name" value="Nama Role" />
                        <x-input id="name" name="name" placeholder="Masukkan Nama Role" />
                    </div>
                    <div class="mb-2">
                        <x-label for="permission" value="Permission" />
                        <x-select class="select2 form-select" id="permission" name="permission[]" data-placeholder="Pilih Permission" multiple>
                            <x-empty-option />
                        </x-select>
                    </div>
                    <div class="d-flex align-items-center justify-content-start gap-2 mt-2">
                        <x-button color="success">Simpan Perubahan</x-button>
                        <x-link color="secondary" :href="route('roles.index')">Batalkan</x-link>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        var id = '{{ $id }}'
    </script>
    <script>
        $(function() {
            'use strict';

            var select = $('.select2'),
                permission = $('#permission'),
                form = $('#form-role');

            select.each(function() {
                var $this = $(this);
                $this.wrap('<div class="position-relative"></div>');
                $this.select2({
                    dropdownAutoWidth: true,
                    width: '100%',
                    dropdownParent: $this.parent()
                });
            });

            // Single Role
            $.ajax({
                url: `/panel/roles/json/roles/${id}`,
                method: 'get',
                dataType: 'json',
                success: function(role) {
                    $('#name').val(role.nama_role);
                    var permission_id = role.permissions.map((permission) => permission.id)
                    loadPermissions(permission_id)
                },
                error: function(xhr, status, error) {
                    console.error('Failed to get data permissions.', status, error);
                }

            })

            // Permissions Json Collections
            function loadPermissions(values) {
                $.ajax({
                    url: '/panel/permissions/json/permissions',
                    method: 'get',
                    dataType: 'json',
                    success: function(permissions) {
                        permission.empty().append('<option value=""></option>');
                        permissions.forEach((item) => {
                            let selected = '';
                            if (values.indexOf(item.id) !== -1) selected = 'selected';
                            permission.append(`<option value="${item.id}" ${selected}>${item.name}</option>`)
                        })
                    },
                    error: function(xhr, status, error) {
                        console.error('Failed to get data permissions.', status, error);
                    }
                });
            }

            // Custom Validation
            $.validator.addMethod('noSpace', (value, element) => value.indexOf(" ") < 0 && value != "")

            if (form.length) {
                form.validate({
                    rules: {
                        name: {
                            required: true,
                            minlength: 3,
                            noSpace: true,
                        },
                        permission: {
                            required: true,
                        },
                    },
                    messages: {
                        name: {
                            required: 'Nama role tidak boleh kosong.',
                            minlength: 'Nama role harus lebih dari 3 karakter.',
                            noSpace: 'Nama role tidak boleh mengandung spasi.',
                        },
                        permission: {
                            required: 'Pilih minimal 1 permission.',
                        },
                    }
                });
            }

        })
    </script>
@endpush
