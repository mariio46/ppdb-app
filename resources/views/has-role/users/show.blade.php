@extends('layouts.has-role.auth', ['title' => $user->name])

@section('vendorStyles')
    <link type="text/css" href="/app-assets/vendors/css/forms/select/select2.min.css" rel="stylesheet">
@endsection

@push('scripts')
    <script src="/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="/app-assets/js/scripts/forms/form-select2.js"></script>
@endpush

@section('content')
    {{-- @dd($user) --}}
    <div class="content-body">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Detail User {{ $user->name }}</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-2">
                            <x-label>Nama</x-label>
                            <x-input value="{{ $user->name }}" />
                        </div>
                        <div class="mb-2">
                            <x-label>Username</x-label>
                            <x-input value="{{ $user->username }}" />
                        </div>
                        <div class="mb-2">
                            <x-label>Status</x-label>
                            <x-select class="select2 form-select">
                                <option disabled selected>Status</option>
                                <option value="aktif" selected>Aktif</option>
                                <option value="tidak_aktif">Tidak Aktif</option>
                            </x-select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-2">
                            <x-label>User</x-label>
                            <x-select class="select2 form-select">
                                <option disabled selected>Role</option>
                                <option value="superadmin">Super Admin</option>
                                <option value="adm_provinsi">Admin Provinsi</option>
                                <option value="op_provinsi" selected>Op. Cabang Dinas</option>
                                <option value="op_sekolah_tujuan">Op. Sekolah Tujuan</option>
                                <option value="op_sekolah_asal">Op. Sekolah Asal</option>
                                <option value="adm_sekolah_asal">Admin Sekolah Asal</option>
                                <option value="adm_cabang_dinas">Admin Cabang Dinas</option>
                            </x-select>
                        </div>
                        <div class="mb-2">
                            <x-label>Wilayah Cabang Dinas</x-label>
                            <x-select class="select2 form-select">
                                <option disabled selected>Pilih Wilayah</option>
                                <option value="wilayah_1">Wilayah 1</option>
                                <option value="wilayah_2">Wilayah 2</option>
                                <option value="wilayah_3" selected>Wilayah 3</option>
                                <option value="wilayah_4">Wilayah 4</option>
                                <option value="wilayah_5">Wilayah 5</option>
                                <option value="wilayah_6">Wilayah 6</option>
                            </x-select>
                        </div>
                    </div>
                </div>

                <x-separator marginY="2" />

                <div class="row">
                    <div class="col-sm-6">
                        <x-label for="password">Konfirmasi Password</x-label>
                        <x-input class="mb-2" id="password" name="password" placeholder="Password anda" />
                        <a class="text-warning fw-bold" href="{{ route('users.lupa-password', $user->id) }}">Lupa Password?</a>
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
