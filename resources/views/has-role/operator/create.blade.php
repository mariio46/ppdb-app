@extends('layouts.has-role.auth', ['title' => 'Tambah Operator'])

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
                <h4 class="card-title">Tambah Operator</h4>
            </div>
            <div class="card-body">

                <form action="#">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-2">
                                <x-label for="name">Nama</x-label>
                                <x-input id="name" name="name" placeholder="Masukkan nama" />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-2">
                                <x-label for="dokumen">Dokumen</x-label>
                                <x-input id="dokumen" name="dokumen" type="file" accept=".pdf" />
                            </div>
                        </div>
                    </div>

                    <x-separator marginY="2" />

                    <div class="row">
                        <div class="col-sm-6">
                            <h4 class="card-title"> Password </h4>
                            <x-label for="password">Password</x-label>
                            <x-input-password>
                                <x-input id="password" name="password" type="password" autocomplete="password" />
                            </x-input-password>
                            <x-label for="password_confirmation">Masukkan Ulang Password</x-label>
                            <x-input-password>
                                <x-input id="password_confirmation" name="password_confirmation" type="password" autocomplete="password_confirmation" />
                            </x-input-password>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-start gap-2 mt-2">
                        <x-button color="success">Simpan Perubahan</x-button>
                        <x-link href="{{ route('operators.index') }}" color="secondary">Batalkan</x-link>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
