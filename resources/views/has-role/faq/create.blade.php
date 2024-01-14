@extends('layouts.has-role.auth', ['title' => 'Tambah Pertanyaan'])

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
                <h4 class="card-title">Tambah Pertanyaan</h4>
                <p class="card-subtitle">Masukkan Pertanyaan dan jawaban yang sering ditanyakan pada masa PPDB 2024</p>
            </div>
            <div class="card-body">

                <form id="form-question" action="#">
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
    </div>
@endsection

@push('scripts')
    <script>
        $(function() {
            'use strict';

            var form = $('#form-question');

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
