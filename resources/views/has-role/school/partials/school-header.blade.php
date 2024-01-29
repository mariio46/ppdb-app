<div id="user-profile">
    <div class="row">
        <div class="col-12">
            <div class="card profile-header mb-2">
                <!-- profile cover photo -->
                <img class="card-img-top" src="{{ Storage::url('images/static/sampul-profile-sekolah-2.png') }}" alt="Sampul Detail Sekolah" />
                <!--/ profile cover photo -->
                <div class="position-relative">
                    <!-- profile picture -->
                    {{-- <x-tabler-discount-check-filled style="position: absolute; top: -12px; right: -12px; stroke: #111827;" class="text-success" /> --}}
                    <div class="profile-img-container d-flex align-items-center top-0">
                        <div class="profile-img" id="cover-logo-sekolah">
                            <img class="rounded img-fluid" id="logo-sekolah" src="{{ Storage::url('images/static/default-upload.png') }}" alt="Profil Sekolah" />

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
                            <div class="profile-tabs d-flex justify-content-between align-items-center flex-wrap mt-1 mt-md-0 mb-md-0 mb-1">
                                <div class="mt-1" id="info-sekolah">
                                    <h3 class="fw-bolder text-primary d-flex align-items-start" id="nama-sekolah">
                                    </h3>
                                    <p class="fw-bold text-secondary" id="npsn-sekolah"></p>
                                </div>
                                {{-- <div id="btn-loader" class="placeholder-glow" style="display: none;"></div> --}}
                                <div class="d-flex align-items-center gap-2">
                                    <div class="placeholder-glow" id="btn-loader"></div>
                                    <div id="link-edit-sekolah" style="display: none;"></div>
                                    <div id="button-kunci-sekolah" style="display: none;"></div>
                                </div>
                            </div>
                        </div>
                        <!--/ collapse  -->
                    </nav>
                    <!--/ navbar -->
                </div>
            </div>
        </div>
    </div>
</div>
