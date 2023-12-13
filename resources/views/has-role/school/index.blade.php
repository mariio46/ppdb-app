@extends('layouts.has-role.auth', ['title' => 'Sekolah'])

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
                <div class="card-title">Sekolah</div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-5 col-12 mb-1 mb-sm-0">
                        <x-select class="select2 form-select w-100" data-placeholder='Pilih satuan pendidikan'>
                            <x-empty-option />
                            <option value="sma">SMA</option>
                            <option value="smk">SMK</option>
                            <option value="sma-boarding">SMA Boarding</option>
                            <option value="sma-half-boarding">SMA Half Boarding</option>
                        </x-select>
                    </div>
                    <div class="col-sm-5 col-12 mb-1 mb-sm-0">
                        <x-select class="select2 form-select w-100" data-placeholder='Pilih Kabupaten / Kota'>
                            <x-empty-option />
                            <option value="kota">Kabupaten / Kota</option>
                            <option value="kecamatan">kecamatan</option>
                            <option value="kelurahan">Desa / Kelurahan</option>
                        </x-select>
                    </div>
                    <div class="col-sm-2 col-12 mb-1 mb-sm-0">
                        <x-button class="w-100" color="dark" disabled>Reset Filter</x-button>
                    </div>
                </div>
                <x-separator marginY="2" />
                <div class="d-flex justify-content-between align-items-center">
                    <x-input class="w-25" id="search" name="search" placeholder="Cari Sekolah..." />
                    <div>
                        <a class="btn btn-success" href="{{ route('siswa.create') }}">
                            <x-tabler-plus style="width: 16px; height: 16px;" />
                            Tambah Sekolah
                        </a>
                    </div>
                </div>
                <x-separator marginY="2" />
                <div>
                    <table class="table">
                        <thead>
                            <tr class="table-light">
                                <th scope="col">NAMA SEKOLAH</th>
                                <th scope="col">NPSN</th>
                                <th scope="col">SATUAN PENDIDKAN</th>
                                <th scope="col">ALAMAT</th>
                                <th scope="col">DETAIL</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($collections as $item)
                                <tr>
                                    <td>{{ $item->school_name }}</td>
                                    <td>{{ $item->npsn }}</td>
                                    <td>{{ $item->unit }}</td>
                                    <td>{{ $item->address }}</td>
                                    <td>
                                        <a class="btn btn-primary" href="{{ route('siswa.show', $item->npsn) }}">Lihat Detail</a>
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
