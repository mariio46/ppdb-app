@extends('layouts.has-role.auth', ['title' => 'Edit Permission'])

@section('vendorStyles')
    <link type="text/css" href="/app-assets/vendors/css/forms/select/select2.min.css" rel="stylesheet">
    <link type="text/css" href="/app-assets/css/plugins/forms/form-validation.css" rel="stylesheet">
@endsection

@section('content')
    <div class="content-body">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    Edit Permission
                </div>
            </div>
            <div class="card-body">
                <form id="form-permission" action="{{ route('permissions.update', $id) }}" method="POST">
                    @csrf
                    <div class="mb-2">
                        <x-label for="name" value="Nama Permission" />
                        <x-input id="name" name="name" placeholder="Masukkan Nama Permission" />
                    </div>
                    <div class="mb-2">
                        <x-label for="keterangan" value="Keterangan" />
                        <x-input id="keterangan" name="keterangan" placeholder="Masukkan keterangan permission" />
                    </div>
                    <div class="d-flex align-items-center justify-content-start gap-2 mt-2">
                        <x-button color="success">Edit Permission</x-button>
                        <x-link color="secondary" :href="route('permissions.index')">Batalkan</x-link>
                    </div>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <div class="card-title">Hapus Permission</div>
            </div>
            <div class="card-body">
                <div class="alert alert-danger alert-dismissible fade show mb-2" role="alert">
                    <div class="alert-body p-2">
                        <span>
                            Apakah anda yakin ingin menghapus data ini?
                        </span>
                    </div>
                </div>

                <x-checkbox class="form-check-danger" identifier="confirmation" label="Saya yakin untuk menghapus data ini" variant="danger" />

                <x-button class="mt-2" id="btn-delete-permission" data-bs-toggle="modal" data-bs-target="#delete-permission-{{ $id }}" type="button" color="danger" disabled>Hapus
                    Role</x-button>
                <x-modal modal_id="delete-permission-{{ $id }}" label_by="deletePermissionModal">
                    <x-modal.header>
                        <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
                    </x-modal.header>
                    <x-modal.body>
                        <h5 class="text-center mt-2" id="modal-heading-1"></h5>
                        <p>
                            Apakah Anda yakin ingin menghapus data ini? Data yang sudah di hapus tidak bisa di kembalikan kembali
                        </p>
                    </x-modal.body>
                    <x-modal.footer class="justify-content-center mb-3">
                        <form action="{{ route('permissions.delete', $id) }}" method="post">
                            @csrf
                            <x-button color="danger">Ya, Hapus</x-button>
                        </form>
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
        var id = '{{ $id }}'
    </script>
    <script>
        $(function() {
            'use strict';

            var check = $('#confirmation'),
                btn_delete = $('#btn-delete-permission'),
                form = $('#form-permission');

            $.ajax({
                url: `/panel/permissions/json/permission/${id}`,
                method: 'get',
                dataType: 'json',
                success: function(permission) {
                    console.log('Permission Result : ', permission);
                    $('#name').val(permission.name);
                    $('#keterangan').val(permission.keterangan);
                    $('#modal-heading-1').text(`Hapus Permission ${permission.name}?`);
                },
                error: function(xhr, status, error) {
                    console.error("Failed to get data single operator.", status, error);
                }
            })

            if (form.length) {
                form.validate({
                    rules: {
                        name: {
                            required: true,
                            minlength: 3,
                        },
                        keterangan: {
                            required: true,
                            minlength: 10,
                        },
                    },
                    messages: {
                        name: {
                            required: 'Harus diisi.',
                            minlength: 'Nama permission harus lebih dari 3 karakter.',
                        },
                        keterangan: {
                            required: 'Harus diisi.',
                            minlength: 'Keterangan permission harus lebih dari 10 karakter.',
                        },
                    }
                });
            }

            check.change(function() {
                btn_delete.prop('disabled', !this.checked);
            });
        })
    </script>
@endpush
