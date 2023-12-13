@extends('layouts.has-role.auth', ['title' => 'Akun Siswa'])

@section('content')
    <div class="content-body">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Akun Siswa</h4>
            </div>
            <div class="card-body">
                <div class="d-flex gap-2 w-50">
                    <x-select class="select2 form-select w-75">
                        <option value="kota">Kabupaten / Kota</option>
                        <option value="kecamatan">kecamatan</option>
                        <option value="kelurahan">Desa / Kelurahan</option>
                    </x-select>
                    <div>
                        <x-button class="" color="secondary" disabled>Reset Filter</x-button>
                    </div>
                </div>
                <x-separator marginY="2" />
                <div class="d-flex justify-content-between align-items-center">
                    <x-input class="w-25" id="search" name="search" placeholder="Cari Siswa..." />
                    <div>
                        <a class="btn btn-success" href="{{ route('siswa.create') }}">
                            <x-tabler-plus style="width: 16px; height: 16px;" />
                            Tambah Siswa
                        </a>
                    </div>
                </div>
                <x-separator marginY="2" />
                <div>
                    <table class="table">
                        <thead>
                            <tr class="table-light">
                                <th scope="col">NAMA SISWA</th>
                                <th scope="col">NISN</th>
                                <th scope="col">ASAL SEKOLAH</th>
                                <th scope="col">DETAIL</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($collections as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->nisn }}</td>
                                    <td>{{ $item->asal_sekolah }}</td>
                                    <td>
                                        <a class="btn btn-primary" href="{{ route('siswa.show', $item->username) }}">Lihat Detail</a>
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
