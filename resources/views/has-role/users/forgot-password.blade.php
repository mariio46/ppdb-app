@extends('layouts.has-role.auth', ['title' => 'Lupa Password'])

@section('content')
    <div class="content-body">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Password baru untuk {{ $user->name }}</h4>
            </div>
            <div class="card-body">
                <div class="row my-2">
                    <div class="col-sm-6">
                        <x-label for="password">Password Baru</x-label>
                        <x-input-password>
                            <x-input id="password" name="password" type="password" />
                        </x-input-password>
                    </div>
                    <div class="col-sm-6">
                        <x-label for="password_confirmation">Konfirmasi Password Baru</x-label>
                        <x-input-password>
                            <x-input id="password_confirmation" name="password_confirmation" type="password" />
                        </x-input-password>
                    </div>
                </div>

                <div class="d-flex align-items-center justify-content-start gap-2">
                    <x-button color="success">Simpan Perubahan</x-button>
                    <a class="btn btn-outline-secondary " href="{{ route('users.show', $user->id) }}">Batalkan</a>
                </div>
            </div>
        </div>
    </div>
@endsection
