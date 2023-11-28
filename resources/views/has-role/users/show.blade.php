@extends('layouts.has-role.auth', ['title' => $user->name])

@section('content')
    {{-- @dd($user) --}}
    <div class="content-body">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Detail User {{ $user->name }}</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6 col-12 mb-1 mb-sm-2">
                        <x-label>Nama</x-label>
                        <x-input value="{{ $user->name }}" />
                    </div>
                    <div class="col-sm-6 col-12 mb-1 mb-sm-2">
                        <x-label>User</x-label>
                        <x-input value="{{ $user->role }}" />
                    </div>
                    <div class="col-sm-6 col-12 mb-1 mb-sm-2">
                        <x-label>Username</x-label>
                        <x-input value="{{ $user->username }}" />
                    </div>
                    <div class="col-sm-6 col-12 mb-1 mb-sm-2">
                        <x-label>Wilayah Cabang Dinas</x-label>
                        <x-input value="Wilayah 3" />
                    </div>
                    <div class="col-sm-6 col-12 mb-1 mb-sm-2">
                        <x-label>Status</x-label>
                        <x-input value="{{ $user->status == 1 ? 'Aktif' : 'Tidak Aktif' }}" />
                    </div>
                </div>
                <div class="clearfix border-bottom my-2"></div>

                <div class="col-sm-6 col-12 mb-1 mb-sm-0">
                    <x-label for="password">Konfirmasi Password</x-label>
                    <x-input class="mb-2" id="password" name="password" placeholder="Password anda" />
                    <a class="text-warning fw-bold" href="{{ route('users.lupa-password', $user->id) }}">Lupa Password?</a>
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
