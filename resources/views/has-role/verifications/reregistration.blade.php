@extends('layouts.has-role.auth', ['title' => 'Verifikasi Daftar Ulang'])

@section('content')
    <div class="content-body">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Akun Siswa</h4>
            </div>
            <div class="card-body">
                <div class="d-flex gap-2 w-50">
                    <x-select class="select2 form-select w-75" data-placeholder='Pilih Status'>
                        <x-empty-option />
                        <option value="kota">Belum daftar ulang</option>
                        <option value="kota">Sudah daftar ulang</option>
                    </x-select>
                    <div>
                        <x-button class="" color="secondary" disabled>Reset Filter</x-button>
                    </div>
                </div>
                <x-separator marginY="2" />
                {{-- <div class="d-flex justify-content-between align-items-center"> --}}
                <div>
                    <x-input class="w-25" id="search" name="search" placeholder="Cari Siswa..." />
                </div>
                <x-separator marginY="2" />
                <div>
                    <table class="table">
                        <thead>
                            <tr class="table-light">
                                <th scope="col">NAMA SISWA</th>
                                <th scope="col">NISN</th>
                                <th scope="col">JALUR</th>
                                <th scope="col">STATUS</th>
                                <th scope="col">DETAIL</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($collections as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->nisn }}</td>
                                    <td>{{ $item->path }}</td>
                                    @if ($item->status == 'Sudah daftar ulang')
                                        <td>
                                            <x-button class="w-100" variant="outline" color="success">{{ $item->status }}</x-button>
                                        </td>
                                    @else
                                        <td>
                                            <x-button class="w-100" variant="outline" color="warning">{{ $item->status }}</x-button>
                                        </td>
                                    @endif
                                    <td>
                                        <a class="btn btn-primary" href="{{ route('verifikasi.daftar-ulang.show', $item->nisn) }}">Lihat Detail</a>
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
