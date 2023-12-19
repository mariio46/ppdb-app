@extends('layouts.has-role.auth', ['title' => 'Edit Sekolah'])

@section('content')
    <div class="content-body">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Edit Informasi Sekolah</div>
            </div>
            <div class="card-body">
                <div class="d-flex">
                    <a class="me-25 " href="#">
                        <img class="uploadedAvatar rounded me-50" id="account-upload-img" src="{{ Storage::url('images/static/profil-sekolah-sma.png') }}" alt="profil sekolah sma" height="150"
                            width="150" />
                    </a>
                    <!-- upload and reset button -->
                    <div class="d-flex align-items-center ms-1">
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
                    <div class="col-sm-6 ">
                        <div class="mb-2">
                            <x-label>Nama Sekolah</x-label>
                            <x-input id="school_name" name="school_name" value="SMAN 1 Parepare" />
                        </div>
                        <div class="mb-2">
                            <x-label>Nomor Pokok Sekolah Nasional &lpar;NPSN&rpar;</x-label>
                            <x-input id="npsn" name="npsn" value="22423912" />
                        </div>
                        <div class="mb-2">
                            <x-label>Nama Kepala Sekolah</x-label>
                            <x-input id="headmaster_name" name="headmaster_name" value="H. Ryan Rafli, S.Pd, M.Pd,PDI" />
                        </div>
                        <div class="mb-2">
                            <x-label>NIP Kepala Sekolah</x-label>
                            <x-input id="headmaster_id" name="headmaster_id" value="1234567890" />
                        </div>
                        <div class="mb-2">
                            <x-label>Nama Ketua PPDB</x-label>
                            <x-input id="leader_name" name="leader_name" value="Muhammad Al Muqtadir, S.PDI" />
                        </div>
                        <div class="mb-2">
                            <x-label>NIP Ketua PPDB</x-label>
                            <x-input id="leader_id" name="leader_id" value="1234567890" />
                        </div>
                    </div>
                    <div class="col-sm-6 ">
                        <div class="mb-2">
                            <x-label>Alamat</x-label>
                            <x-input id="address" name="address" value="Jalan Kemerdekaan Mo.3" />
                        </div>
                        <div class="mb-2">
                            <x-label>Kabupaten/Kota</x-label>
                            <x-input id="city" name="city" value="Parepare" />
                        </div>
                        <div class="mb-2">
                            <x-label>Kecamatan</x-label>
                            <x-input id="subdistrict" name="subdistrict" value="Ujung" />
                        </div>
                        <div class="mb-2">
                            <x-label>Desa/Kelurahan</x-label>
                            <x-input id="ward" name="ward" value="Galung Maloang" />
                        </div>
                        <div class="mb-2">
                            <x-label>RT/RW</x-label>
                            <x-input id="rt_rw" name="rt_rw" value="001/002" />
                        </div>
                        <div class="mb-2">
                            <x-label>Koordinat Sekolah</x-label>
                            <x-input id="school_coordinate" name="school_coordinate" value="-2.649099922180" />
                        </div>
                    </div>
                </div>

                <x-separator marginY="2" />

                <section id="lokasi-sekolah">
                    <h4 class="text-primary mb-1">Lokasi Sekolah</h4>
                    <div class="w-100">
                        <img class="w-100" src="{{ Storage::url('images/static/lokasi-sekolah.png') }}" alt="Lokasi Sekolah">
                    </div>
                </section>

                <x-separator marginY="2" />

                <div class="d-flex align-items-center justify-content-start gap-2">
                    <x-button color="success">Simpan Perubahan</x-button>
                    <x-link href="#" variant="outline" color="secondary">Batalkan</x-link>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Hapus Data Sekolah</h5>
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
                        <p>
                            Apakah Anda yakin ingin menghapus data sekolah ini? Data yang sudah di hapus tidak bisa di kembalikan kembali
                        </p>
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
