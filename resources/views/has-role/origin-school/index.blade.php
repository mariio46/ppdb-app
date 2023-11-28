@extends('layouts.has-role.auth', ['title' => 'Sekolah asal'])

@section('content')
    <div class="content-body">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Sekolah Asal</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-5 col-12 mb-1 mb-sm-0">
                        <x-input id="name" name="name" placeholder="Your name" />
                    </div>
                    <div class="col-sm-5 col-12 mb-1 mb-sm-0">
                        <x-input id="name" name="name" placeholder="Your name" />
                    </div>
                    <div class="col-sm-2 col-12 mb-1 mb-sm-0">
                        <x-button class="w-100" color="dark" disabled>Reset Filter</x-button>
                    </div>
                </div>
                <div class="clearfix border-bottom my-2"></div>
                <div class="row d-flex justify-content-between align-items-center">
                    <div class="col-sm-3">
                        <x-input id="search" name="search" placeholder="Cari sekolah..." />
                    </div>
                    <div class="col-sm-3 text-end">
                        <a class="btn btn-success" href="{{ route('sekolah-asal.create') }}">
                            <x-tabler-plus style="width: 16px; height: 16px;" />
                            Tambah Sekolah
                        </a>
                    </div>
                </div>
                <div class="clearfix border-bottom my-2"></div>
                <div>
                    <table class="table">
                        <thead>
                            <tr class="table-light">
                                <th scope="col">NAMA</th>
                                <th scope="col">NPSN</th>
                                <th scope="col">SATUAN UNIT</th>
                                <th scope="col">ALAMAT</th>
                                <th scope="col">DETAIL</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($collections as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->npsn }}</td>
                                    <td>{{ $item->unit }}</td>
                                    <td>{{ $item->address }}</td>
                                    <td>
                                        <a class="btn btn-primary" href="{{ route('sekolah-asal.show', $item->id) }}">Lihat Detail</a>
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
