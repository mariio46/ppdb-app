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
                <x-separator marginY="2" />
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-2">
                            <x-label>Nama Sekolah</x-label>
                            <x-input value="SMPN 6 Parepare" />
                        </div>
                        <div class="mb-2">
                            <x-label>Nomor Pokok Sekolah Nasional</x-label>
                            <x-input value="22423912" />
                        </div>
                        <div class="mb-2">
                            <x-label>Nama Kepala Sekolah</x-label>
                            <x-input value="H. Ryan Rafli, S.Pd, M.Pd,PDI" />
                        </div>
                        <div class="mb-2">
                            <x-label>NIP Kepala Sekolah</x-label>
                            <x-input value="1234567890" />
                        </div>
                        <div class="mb-2">
                            <x-label>Nama Ketua PPDB</x-label>
                            <x-input value="Muhammad Al Muqtadir, S.PDI" />
                        </div>
                        <div class="mb-2">
                            <x-label>NIP Ketua PPDB</x-label>
                            <x-input value="1234567890" />
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-2">
                            <x-label>Alamat Jalan</x-label>
                            <x-input value="Jalan Kemerdekaan Mo.3" />
                        </div>
                        <div class="mb-2">
                            <x-label>Kabupaten/Kota</x-label>
                            <x-input value="Parepare" />
                        </div>
                        <div class="mb-2">
                            <x-label>Kecamatan</x-label>
                            <x-input value="Ujung" />
                        </div>
                        <div class="mb-2">
                            <x-label>Desa/Kelurahan</x-label>
                            <x-input value="Galung Maloang" />
                        </div>
                        <div class="mb-2">
                            <x-label>RT/RW</x-label>
                            <x-input value="001/002" />
                        </div>
                        <div class="mb-2">
                            <x-label>Koordinat Sekolah</x-label>
                            <x-input value="-2.649099922180" />
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-start gap-2">
                    <x-button color="success">Simpan Perubahan</x-button>
                    <a class="btn btn-outline-secondary " href="{{ route('sekolah-asal.index') }}">Batalkan</a>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Hapus Data Sekolah</h5>
            </div>
            <div class="card-body">
                <div class="alert alert-danger alert-dismissible fade show my-2" role="alert">
                    <div class="alert-body p-2">
                        <span>Apakah anda yakin ingin menghapus data sekolah ini?</span>
                    </div>
                </div>

                <x-checkbox class="form-check-danger" identifier="confirmation" label="Saya yakin untuk menghapus data sekolah ini" variant="danger" />

                <x-button class="mt-2" data-bs-toggle="modal" data-bs-target="#delete-school" type="button" color="danger">Hapus Data Sekolah</x-button>
                <x-modal modal_id="delete-school" label_by="deleteSchoolModal">
                    <x-modal.header>
                        <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
                    </x-modal.header>
                    <x-modal.body>
                        <h5 class="text-center mt-2">Hapus Sekolah</h5>
                        <p>Apakah Anda yakin ingin menghapus data sekolah ini? Data yang sudah di hapus tidak bisa di kembalikan kembali</p>
                    </x-modal.body>
                    <x-modal.footer class="justify-content-center mb-3">
                        <x-button color="danger">Ya, Hapus</x-button>
                        <x-button data-bs-dismiss="modal" color="secondary">Batalkan</x-button>
                    </x-modal.footer>
                </x-modal>
            </div>
        </div>
    </div>
@endsection
