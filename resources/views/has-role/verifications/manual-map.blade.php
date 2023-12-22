@extends('layouts.has-role.auth', ['title' => 'Edit Maps Verifikasi Manual'])

@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">Verifikasi Manual</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('verifikasi.manual') }}">
                                    Verifikasi Manual
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('verifikasi.manual.detail', [$id]) }}">
                                    Lihat Detail Siswa
                                </a>
                            </li>
                            <li class="breadcrumb-item active">
                                Edit Titik Rumah Siswa
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content-body row">
        <div class="col-12">
            <div class="card">
                <div class="card-body"></div>
            </div>
        </div>
    </div>
@endsection
