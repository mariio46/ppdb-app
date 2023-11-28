@extends('layouts.has-role.auth', ['title' => 'Tambah user'])

@section('content')
    {{-- @dd($user) --}}
    <div class="content-body">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Tambah User</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6 col-12 mb-1 mb-sm-2">
                        <x-label>Nama</x-label>
                        <x-input id="name" name="name" placeholder="Masukkan nama" />
                    </div>
                    <div class="col-sm-6 col-12 mb-1 mb-sm-2">
                        <x-label>Role</x-label>
                        <x-input id="role" name="role" placeholder="Pilih role" />
                    </div>
                    <div class="col-sm-6 col-12 mb-1 mb-sm-2">
                        <x-label>Username</x-label>
                        <x-input id="username" name="username" placeholder="Masukkan username" />
                    </div>
                    <div class="col-sm-6 col-12 mb-1 mb-sm-2">
                        <x-label>ID</x-label>
                        <x-input id="wilayah" name="wilayah" placeholder="Wilayah 3" />
                    </div>
                    <div class="col-sm-6 col-12 mb-1 mb-sm-2">
                        <x-label>Status</x-label>
                        <x-input id="status" name="status" placeholder="Status" />
                    </div>
                </div>

                <div class="clearfix border-bottom my-2"></div>

                <div class="col-sm-6 col-12 mb-1 mb-sm-0">
                    <h4 class="card-title">
                        Password
                    </h4>
                    <div>
                        <x-label for="password">Password</x-label>
                        <x-input id="password" name="password" placeholder="Password anda" />
                    </div>
                    <div class="mt-2">
                        <x-label for="password">Masukkan Ulang Password</x-label>
                        <x-input id="password_confirmation" name="password_confirmation" placeholder="Password anda" />
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-start gap-2 mt-2">
                    <x-button color="success">Tambah User</x-button>
                    <a class="btn btn-outline-secondary " href="{{ route('users.index') }}">Batalkan</a>
                </div>
            </div>
        </div>
    </div>
@endsection
