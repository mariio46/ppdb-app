@extends('layouts.has-role.auth', ['title' => 'Users'])

@section('content')
    <div class="content-body">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Users</h4>
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
                <div class="clearfix border-bottom my-2"></div>
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
