@extends('layouts.has-role.auth', ['title' => 'Edit Koordinat Sekolah'])

@section('vendorStyles')
    <link type="text/css" href="/app-assets/css/pages/page-profile.css" rel="stylesheet">
    <link type="text/css" href="/app-assets/vendors/css/forms/select/select2.min.css" rel="stylesheet">
    <link type="text/css" href="/app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link type="text/css" href="/app-assets/css/plugins/forms/form-validation.css" rel="stylesheet">
@endsection

@section('vendorScripts')
    <script src="/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js"></script>
    <script src="/app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js"></script>
    <script src="/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="/app-assets/js/scripts/pages/page-profile.js"></script>
    <script src="/app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
@endsection

@section('content')
    <div class="content-body">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title fw-bolder text-primary">Perbarui Koordinat Sekolah</h4>
            </div>
            <div class="card-body">
                <div class="rounded shadow-md" id="map" style="width: 100%; height: 400px;"></div>
                <x-input class="w-50 mt-1" id="search-input" type="text" placeholder="cari tempat.." />

                <form id="form" action="{{ route('school-coordinate.update', $sekolah_id) }}" method="post">
                    @csrf
                    <div class="row mt-2">
                        <div class="mb-2 col-lg-4 col-12">
                            <x-label for="lintang">Lintang</x-label>
                            <x-input id="lintang" name="lintang" type="text" placeholder="lintang.." readonly></x-input>
                        </div>
                        <div class="mb-2 col-lg-4 col-12">
                            <x-label for="bujur">Bujur</x-label>
                            <x-input id="bujur" name="bujur" type="text" placeholder="bujur.." readonly></x-input>
                        </div>
                    </div>
                    <div class="mb-2 d-flex align-items-center justify-content-start gap-2">
                        <x-button type="submit" color="success">Simpan Koordinat</x-button>
                        <x-link :href="route('school-coordinate.index')" color="secondary">Kembali</x-link>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        var school_id = '{{ $sekolah_id }}',
            unit = '{{ $satuan_pendidikan }}';
    </script>
    <script>
        $(function() {
            'use strict';

            var lock_button = $('#button-kunci-sekolah'),
                school_name = $('#nama-sekolah'),
                school_edit_link = $('#link-edit-sekolah');

            $.ajax({
                url: `/panel/data-sekolah/json/school/${school_id}`,
                method: 'get',
                dataType: 'json',
                beforeSend: function() {
                    buttonLoader();
                    headerSchoolAction('onLoad');
                },
                success: function(school) {
                    console.log('Sekolah : ', school);
                    if (school.logo) $('#logo-sekolah').attr('src', school.logo);
                    if (school.lintang) $('#lintang').val(school.lintang);
                    if (school.bujur) $('#bujur').val(school.bujur);

                    headerSchoolAction('onSuccess', school.nama_sekolah, school.npsn);
                    loadEditLink(school.terverifikasi);
                    loadLockSchoolButton(school.terverifikasi, school.id, school.satuan_pendidikan);

                    initMap(school.lintang, school.bujur)
                },
                complete: function() {
                    $('#btn-loader').html(``);
                    headerSchoolAction('onComplete')
                },
                error: function(xhr, status, error) {
                    console.error('Failed to get data.', status, error);
                }
            });

            function loadEditLink(school_status) {
                if (school_status === 'belum_simpan') {
                    school_edit_link.show()
                    school_edit_link.html(function() {
                        return `
                <a href="/panel/data-sekolah/edit" class="btn btn-success">
                    <x-tabler-pencil />
                    Edit Info Sekolah
                </a>`
                    })
                }
            }

            function loadLockSchoolButton(school_status, school_id, unit) {
                if (school_status === 'belum_simpan') {
                    lock_button.show();
                    lock_button.html(function() {
                        return `
                        <form id="form-kunci-sekolah" action="/panel/data-sekolah/${school_id}/${unit}/lock" method="post">
                            @csrf
                            <button type="submit" id="modal-kunci-sekolah" class="btn btn-warning">
                                <x-tabler-lock-square-rounded />
                                Kunci Sekolah
                            </button>
                        </form>
                            `
                    });
                } else if (school_status === 'simpan' || school_status === 'verifikasi') {
                    lock_button.show();
                    lock_button.html(function() {
                        return `
                <button type="button" class="btn btn-danger" disabled>
                    <x-tabler-lock-square-rounded />
                    Sekolah Sudah Terkunci
                </button>`
                    });
                }
            }

            function buttonLoader() {
                $("#btn-loader").html(function() {
                    return `
                    <div id="btn-loader" class="placeholder-glow d-flex gap-2">
                        <button class="btn btn-secondary disabled placeholder" style="width: 237px" aria-disabled="true"></button>
                        <button class="btn btn-secondary disabled placeholder" style="width: 237px" aria-disabled="true"></button>
                    </div>
                        `
                });
            }

            function headerSchoolAction(type, school_name = '', school_npsn = '') {
                switch (type) {
                    case 'onLoad':
                        $('#info-sekolah,#cover-logo-sekolah').addClass('placeholder-glow');
                        $('#nama-sekolah,#npsn-sekolah,#logo-sekolah').text('Memuat Data').addClass('placeholder col-12');
                        break;
                    case 'onSuccess':
                        $('#nama-sekolah').text(school_name);
                        $('#npsn-sekolah').text(school_npsn);
                        break;
                    case 'onComplete':
                        $('#info-sekolah,#cover-logo-sekolah').removeClass('placeholder-glow');
                        $('#nama-sekolah,#npsn-sekolah,#logo-sekolah').removeClass('placeholder');
                        break;
                }
            }


        })
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDS-nYa_Am79m7sMGUYpehL8XKE3XFv_RM&libraries=places&callback=initMap"></script>
    <script>
        $(function() {
            'use strict';

            var form = $('#form');

            if (form.length) {
                form.validate({
                    rules: {
                        lintang: {
                            required: true
                        },
                        bujur: {
                            required: true
                        }
                    },
                    messages: {
                        lintang: {
                            required: 'Harus terisi.'
                        },
                        bujur: {
                            required: "Harus terisi."
                        }
                    }
                });
            }
        });

        let map, marker;
        var latNew = -3.5138654553765787;
        var langNew = 120.36971926689148;

        function initMap(lintang, bujur) {
            map = new google.maps.Map(document.getElementById('map'), {
                center: {
                    lat: Number(lintang),
                    lng: Number(bujur)
                }, // Koordinat pusat peta awal
                zoom: 18,
                streetViewControl: false
            });

            // Tambahkan event listener untuk memilih titik koordinat
            map.addListener('click', function(event) {
                placeMarker(event.latLng);
            });

            // Inisialisasi Autocomplete untuk fitur pencarian
            let input = document.getElementById('search-input');
            let searchBox = new google.maps.places.SearchBox(input);
            map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

            map.addListener('bounds_changed', function() {
                searchBox.setBounds(map.getBounds());
            });

            searchBox.addListener('places_changed', function() {
                let places = searchBox.getPlaces();
                if (places.length === 0) {
                    return;
                }

                // Geser peta ke tempat yang dipilih
                map.panTo(places[0].geometry.location);

                // Taruh marker di tempat yang dipilih
                placeMarker(places[0].geometry.location);
            });
        }

        function placeMarker(location) {
            if (marker) {
                marker.setMap(null);
            }

            marker = new google.maps.Marker({
                position: location,
                map: map
            });

            // Ambil nilai lintang dan bujur
            let latitude = location.lat();
            let longitude = location.lng();

            // Set nilai lintang dan bujur di input
            document.getElementById('lintang').value = latitude;
            document.getElementById('bujur').value = longitude;
        }
    </script>
@endpush
