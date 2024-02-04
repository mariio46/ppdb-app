@extends('layouts.has-role.auth', ['title' => 'Edit Jurusan'])

@section('vendorStyles')
    <link type="text/css" href="/app-assets/css/plugins/forms/form-validation.css" rel="stylesheet">
@endsection

@section('vendorScripts')
    <script src="/app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
@endsection

@section('content')
    <div class="content-body">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Jurusan</h4>
            </div>
            <div class="card-body">

                <form id="form-edit-major" action="{{ route('majors.update', $id) }}" method="POST">
                    @csrf
                    <div>
                        <x-label for="jurusan" value="Nama Jurusan" />
                        <x-input id="jurusan" name="jurusan" type="text" placeholder="Masukkan Nama Jurusan" autofocus />
                    </div>

                    <div class="d-flex align-items-center justify-content-start gap-2 mt-2">
                        <x-button color="success">Simpan Perubahan</x-button>
                        <x-link href="{{ route('faqs.index') }}" color="secondary">Batalkan</x-link>
                    </div>
                </form>

            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Hapus Pertanyaan</h5>

                <x-alert variant="danger">Apakah anda yakin ingin menghapus pertanyaan ini?</x-alert>

                <x-checkbox class="form-check-danger" identifier="confirmation" label="Saya yakin untuk menghapus pertanyaan ini" variant="danger" />

                <x-button class="mt-2" id="btn-delete-major" data-bs-toggle="modal" data-bs-target="#delete-major" type="button" color="danger" disabled>Hapus Jurusan</x-button>

                <x-modal modal_id="delete-major" label_by="deleteMajor">
                    <x-modal.header>
                        <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
                    </x-modal.header>
                    <x-modal.body>
                        <h5 class="text-center mt-2">Hapus Jurusan</h5>
                        <p>
                            Apakah Anda yakin ingin menghapus jurusan ini? Data yang sudah di hapus tidak bisa di kembalikan lagi.
                        </p>
                    </x-modal.body>
                    <x-modal.footer class="justify-content-center mb-3">
                        <form action="{{ route('majors.destroy', $id) }}" method="POST">
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

@push('scripts')
    <script>
        var major_id = '{{ $id }}';
    </script>
    <script>
        $(function() {
            'use strict';

            var form = $('#form-edit-major'),
                check = $('#confirmation'),
                btnDeleteMajor = $('#btn-delete-major');

            // Disabled Delete Button Modal
            check.change(function() {
                btnDeleteMajor.prop('disabled', !this.checked);
            });

            // Fetch Single Data Major
            $.ajax({
                url: `/panel/jurusan/json/major/${major_id}`,
                method: 'get',
                dataType: 'json',
                success: function(major) {
                    console.log('Major : ', major);
                    $('#jurusan').val(major.jurusan);
                },
                error: function(xhr, status, error) {
                    console.error("Failed to get data single major.", status, error);
                }
            })

            // Form Validation
            if (form.length) {
                form.validate({
                    rules: {
                        jurusan: {
                            required: true,
                            minlength: 3,
                        },
                    },
                    messages: {
                        jurusan: {
                            required: 'Nama Jurusan tidak boleh kosong!',
                            minlength: 'Nama Jurusan harus lebih dari 3 karakter',
                        },
                    },
                })
            }
        })
    </script>
@endpush
