@extends('layouts.has-role.auth', ['title' => "Edit {$school->name}"])

@section('content')
    <div class="content-body">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    Edit Informasi {{ $school->name }}
                </div>
            </div>
            <div class="card-body py-2 my-25">
                <div class="d-flex">
                    <a class="me-25 border-secondary rounded-2 p-1" href="#">
                        <img class="uploadedAvatar rounded me-50" id="account-upload-img" src="{{ Storage::url('images/static/profil-sekolah.png') }}" alt="profil sekolah" height="100" width="100" />
                    </a>
                    <!-- upload and reset button -->
                    <div class="d-flex align-items-end mt-75 ms-1">
                        <div>
                            <label class="btn btn-primary mb-75 me-75" for="account-upload">Upload Logo Baru</label>
                            <input id="account-upload" type="file" hidden accept="image/*" />
                            <x-button class="mb-75" id="account-reset" type="button" variant="outline" color="secondary">
                                Reset Logo
                            </x-button>
                            <p class="mb-0">Format JPG, GIF or PNG, Max size of 800K</p>
                        </div>
                    </div>
                    <!--/ upload and reset button -->
                </div>
            </div>
        </div>
    </div>
@endsection
