<div class="row">
    <div class="col-12">
        <div class="card profile-header mb-2">
            <!-- profile cover photo -->
            <img class="card-img-top" src="{{ Storage::url('images/static/sampul-detail-sekolah.png') }}" alt="Sampul Detail Sekolah" />
            <!--/ profile cover photo -->
            <div class="position-relative">
                <!-- profile picture -->
                <div class="profile-img-container d-flex align-items-center">
                    <div class="profile-img">
                        <img class="rounded img-fluid" src="{{ Storage::url('images/static/profil-sekolah-sma.png') }}" alt="Profil Sekolah" />
                    </div>
                    <!-- profile title -->
                </div>
            </div>
            <!-- tabs pill -->
            <div class="profile-header-nav">
                <!-- navbar -->
                <nav class="navbar navbar-expand-md navbar-light justify-content-end justify-content-md-between w-100">
                    <!-- collapse  -->
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <div class="profile-tabs d-flex justify-content-end align-items-center gap-2 flex-wrap mt-1 mt-md-0">
                            <x-link href="{{ route('sekolah.edit', $npsn) }}" color="success">
                                <x-tabler-pencil />
                                Edit Info Sekolah
                            </x-link>
                            <x-button data-bs-toggle="modal" data-bs-target="#modal-kunci-data-sekolah" type="button" color="warning">
                                <x-tabler-lock-square-rounded />
                                Kunci Data Sekolah
                            </x-button>
                            <x-modal modal_id="modal-kunci-data-sekolah" label_by="modalKunciDataSekolah">
                                <x-modal.header>
                                    <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
                                </x-modal.header>
                                <x-modal.body>
                                    <h5 class="text-center mt-2">Kunci Data Sekolah</h5>
                                    <p>Apakah Anda yakin ingin mengunci data diri? Data yang sudah di kunci tidak bisa di edit kembali, untuk membuka kunci karena terjadi kesalahan data sekolah, dapat
                                        menghubungi cabang dinas</p>
                                </x-modal.body>
                                <x-modal.footer class="justify-content-center mb-3">
                                    <x-button color="warning">Ya, Kunci</x-button>
                                    <x-button data-bs-dismiss="modal" color="secondary">Batalkan</x-button>
                                </x-modal.footer>
                            </x-modal>
                        </div>
                    </div>
                    <!--/ collapse  -->
                </nav>
                <!--/ navbar -->
            </div>
        </div>
    </div>
</div>
