<div id="user-profile">
    <div class="row">
        <div class="col-12">
            <div class="card profile-header mb-2">
                <!-- profile cover photo -->
                <img class="card-img-top" src="{{ Storage::url('images/static/sampul-detail-sekolah.png') }}" alt="Sampul Detail Sekolah" />
                <!--/ profile cover photo -->
                <div class="position-relative">
                    <!-- profile picture -->
                    <div class="profile-img-container d-flex align-items-center">
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
                            <div class="profile-tabs d-flex justify-content-end align-items-center gap-2 flex-wrap mt-1 mt-md-0">
                                {{-- <div id="btn-loader" class="placeholder-glow" style="display: none;"></div> --}}
                                <div class="placeholder-glow" id="btn-loader"></div>
                                <div id="link-edit-sekolah" style="display: none;"></div>
                                <div id="button-kunci-sekolah" style="display: none;"></div>
                                <form action="{{ route('school-quota.lock', 'd9752a96-0a5d-41e0-9b64-84b82d22e614') }}" method="post">
                                    @csrf
                                    <button>lock</button>
                                </form>
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
