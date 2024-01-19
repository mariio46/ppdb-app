@extends('layouts.has-role.auth', ['title' => 'Edit Pertanyaan'])

@section('vendorStyles')
    <link type="text/css" href="/app-assets/css/plugins/forms/form-validation.css" rel="stylesheet">
@endsection

@section('vendorScripts')
    <script src="/app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
@endsection

@section('content')
    <div class="content-body">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Pertanyaan</h4>
                <p class="card-subtitle">Edit Pertanyaan dan jawaban yang sering ditanyakan pada masa PPDB 2024</p>
            </div>
            <div class="card-body">

                <form id="form-question" action="{{ route('faqs.update', $id) }}" method="POST">
                    @csrf
                    <div class="mb-2">
                        <x-label for="question">Pertanyaan</x-label>
                        <x-textarea id="question" name="question" placeholder="Masukkan Pertanyaan"></x-textarea>
                    </div>

                    <div class="mb-2">
                        <x-label for="answer">Jawaban</x-label>
                        <x-textarea id="answer" name="answer" placeholder="Masukkan Jawaban"></x-textarea>
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

                <x-button class="mt-2" id="btn-delete-major" data-bs-toggle="modal" data-bs-target="#delete-question" type="button" color="danger" disabled>Hapus Data Sekolah</x-button>

                <x-modal modal_id="delete-question" label_by="deleteQuestion">
                    <x-modal.header>
                        <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
                    </x-modal.header>
                    <x-modal.body>
                        <h5 class="text-center mt-2">Hapus Permission</h5>
                        <p>
                            Apakah Anda yakin ingin menghapus pertanyaan ini? Data yang sudah di hapus tidak bisa di kembalikan lagi.
                        </p>
                    </x-modal.body>
                    <x-modal.footer class="justify-content-center mb-3">
                        <form action="{{ route('faqs.destroy', $id) }}" method="POST">
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
        var id = '{{ $id }}';
    </script>
    <script>
        $(function() {
            'use strict';

            var form = $('#form-question'),
                check = $('#confirmation'),
                btnDeleteQuestion = $('#btn-delete-major');

            // Fetch single faq & displaying on view
            $.ajax({
                url: `/panel/faqs/json/faq/${id}`,
                method: 'get',
                dataType: 'json',
                success: function(faq) {
                    $('#question').val(faq.question);
                    $('#answer').val(faq.answer);
                },
                error: function(xhr, status, error) {
                    console.error("Failed to get data single faq.", status, error);
                }
            })

            // Disabled Delete Button Modal
            check.change(function() {
                btnDeleteQuestion.prop('disabled', !this.checked);
            });

            // Form Validation
            if (form.length) {
                form.validate({
                    rules: {
                        question: {
                            required: true,
                            minlength: 3,
                        },
                        answer: {
                            required: true,
                            minlength: 3,
                        },
                    },
                    messages: {
                        question: {
                            required: 'Pertanyaan tidak boleh kosong.',
                            minlength: 'Pertanyaan harus lebih dari 3 karakter.',
                        },
                        answer: {
                            required: 'Jawaban tidak boleh kosong.',
                            minlength: 'Jawaban harus lebih dari 3 karakter.',
                        },
                    }
                });
            }
        })
    </script>
@endpush
