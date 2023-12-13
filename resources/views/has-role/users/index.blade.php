@extends('layouts.has-role.auth', ['title' => 'Users'])

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
                <h4 class="card-title">Users</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-5 col-12 mb-1 mb-sm-0">
                        <x-select class="select2 form-select">
                            <option disabled selected>Role</option>
                            <option value="superadmin">Super Admin</option>
                            <option value="adm_provinsi">Admin Provinsi</option>
                            <option value="op_provinsi">Op. Cabang Dinas</option>
                            <option value="op_sekolah_tujuan">Op. Sekolah Tujuan</option>
                            <option value="op_sekolah_asal">Op. Sekolah Asal</option>
                            <option value="adm_sekolah_asal">Admin Sekolah Asal</option>
                            <option value="adm_cabang_dinas">Admin Cabang Dinas</option>
                        </x-select>
                    </div>
                    <div class="col-sm-5 col-12 mb-1 mb-sm-0">
                        <x-select class="select2 form-select">
                            <option disabled selected>Status</option>
                            <option value="aktif">Aktif</option>
                            <option value="tidak_aktif">Tidak Aktif</option>
                        </x-select>
                    </div>
                    <div class="col-sm-2 col-12 mb-1 mb-sm-0">
                        <x-button class="w-100" color="dark" disabled>Reset Filter</x-button>
                    </div>
                </div>
                <x-separator marginY="2" />
                <div class="row d-flex justify-content-between align-items-center">
                    <div class="col-sm-3">
                        <x-input id="search" name="search" placeholder="Cari user..." />
                    </div>
                    <div class="col-sm-3 text-end">
                        <a class="btn btn-success" href="{{ route('users.create') }}">
                            <x-tabler-plus style="width: 16px; height: 16px;" />
                            Tambah User
                        </a>
                        {{-- <x-button color="success">
                        </x-button> --}}
                    </div>
                </div>
                <x-separator marginY="2" />
                <div>
                    <table class="table">
                        <thead>
                            <tr class="table-light">
                                <th scope="col">NAMA</th>
                                <th scope="col">USERNAME</th>
                                <th scope="col">ROLE</th>
                                <th scope="col">ID</th>
                                <th scope="col">STATUS</th>
                                <th scope="col">DETAIL</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($collections as $item)
                                {{-- @dd($item['id']) --}}
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->username }}</td>
                                    <td>{{ $item->role }}</td>
                                    <td>{{ $item->unique_id }}</td>
                                    @if ($item->status == 1)
                                        <td>
                                            <x-button class="w-100" variant="outline" color="success">Aktif</x-button>
                                        </td>
                                    @else
                                        <td>
                                            <x-button class="w-100" variant="outline" color="danger">Tidak AKtif</x-button>
                                        </td>
                                    @endif
                                    <td>
                                        <a class="btn btn-primary" href="{{ route('users.show', $item->id) }}">Lihat Detail</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
