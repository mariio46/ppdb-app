@extends('layouts.has-role.auth', ['title' => 'Tambah user'])

@section('vendorStyles')
    <link type="text/css" href="/app-assets/vendors/css/forms/select/select2.min.css" rel="stylesheet">
@endsection

@push('scripts')
    <script src="/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="/app-assets/js/scripts/forms/form-select2.js"></script>
@endpush

@section('content')
    <div class="content-body">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Tambah User</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-2">
                            <x-label>Nama</x-label>
                            <x-input id="name" name="name" placeholder="Masukkan nama" />
                        </div>
                        <div class="mb-2">
                            <x-label>Username</x-label>
                            <x-input id="username" name="username" placeholder="Masukkan username" />
                        </div>
                        <div class="mb-2">
                            <x-label>Status</x-label>
                            <x-select class="select2 form-select">
                                <option disabled selected>Status</option>
                                <option value="aktif">Aktif</option>
                                <option value="tidak_aktif">Tidak Aktif</option>
                            </x-select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-2">
                            <x-label>Role</x-label>
                            <x-select class="select2 form-select">
                                <option disabled selected>Pilih Role</option>
                                <option value="superadmin">Super Admin</option>
                                <option value="adm_provinsi">Admin Provinsi</option>
                                <option value="op_provinsi">Op. Cabang Dinas</option>
                                <option value="op_sekolah_tujuan">Op. Sekolah Tujuan</option>
                                <option value="op_sekolah_asal">Op. Sekolah Asal</option>
                                <option value="adm_sekolah_asal">Admin Sekolah Asal</option>
                                <option value="adm_cabang_dinas">Admin Cabang Dinas</option>
                            </x-select>
                        </div>
                        <div class="mb-2">
                            <x-label>ID</x-label>
                            <x-select class="select2 form-select">
                                <option disabled selected>Pilih Wilayah</option>
                                <option value="wilayah_1">Wilayah 1</option>
                                <option value="wilayah_2">Wilayah 2</option>
                                <option value="wilayah_3">Wilayah 3</option>
                                <option value="wilayah_4">Wilayah 4</option>
                                <option value="wilayah_5">Wilayah 5</option>
                                <option value="wilayah_6">Wilayah 6</option>
                            </x-select>
                        </div>
                    </div>
                </div>

                <x-separator marginY="2" />

                <div class="col-sm-6">
                    <h4 class="card-title"> Password </h4>
                    <x-label for="password">Password</x-label>
                    <x-input-password>
                        <x-input id="password" name="password" type="password" />
                    </x-input-password>
                    <x-label for="password_confirmation">Masukkan Ulang Password</x-label>
                    <x-input-password>
                        <x-input id="password_confirmation" name="password_confirmation" type="password" />
                    </x-input-password>
                </div>
                <div class="d-flex align-items-center justify-content-start gap-2 mt-2">
                    <x-button color="success">Tambah User</x-button>
                    <a class="btn btn-outline-secondary " href="{{ route('users.index') }}">Batalkan</a>
                </div>
            </div>
        </div>
    </div>
@endsection
