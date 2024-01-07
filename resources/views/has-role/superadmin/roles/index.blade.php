@extends('layouts.has-role.auth', ['title' => 'Roles'])

@section('content')
    <div class="content-body">
        <div class="row match-height">
            @foreach ($collections as $item)
                <div class="col-md-4 col-12">
                    <div class="card">
                        <div class="card-body">
                            <p class="fs-5 fw-bold mb-0">{{ $item->user_count }} user adalah {{ str($item->name)->lower() }}</p>
                            <h3 class="text-primary my-0 fw-bolder mt-2">
                                <a href="{{ route('roles.edit', $item->identifier) }}">
                                    {{ $item->name }}
                                </a>
                            </h3>
                            <p class="fs-5 fw-bold my-0 mb-2">{{ $item->count }} permissions</p>
                            <a class="fs-5 text-decoration-underline text-success fw-bold mb-0" href="{{ route('roles.edit', $item->identifier) }}">Edit Role</a>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="col-md-4 col-12">
                <div class="card bg-dark">
                    <div class="card-body d-flex flex-column justify-content-center">
                        <x-link :href="route('roles.create')">
                            <x-tabler-plus />
                            Tambah Role
                        </x-link>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
