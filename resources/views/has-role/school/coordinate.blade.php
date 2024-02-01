@extends('layouts.has-role.auth', ['title' => 'Koordinat Sekolah'])

@section('vendorStyles')
    <link type="text/css" href="/app-assets/css/pages/page-profile.css" rel="stylesheet">
    <link type="text/css" href="/app-assets/vendors/css/forms/select/select2.min.css" rel="stylesheet">
    <link type="text/css" href="/app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css" rel="stylesheet">
@endsection

@section('vendorScripts')
    <script src="/app-assets/js/scripts/pages/page-profile.js"></script>
    <script src="/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js"></script>
    <script src="/app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js"></script>
    <script src="/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
@endsection

@section('content')
    <div class="content-body">

        @include('has-role.school.partials.school-header')

        @include('has-role.school.partials.school-tab')

        <div class="card">
            <div class="card-header">
                <h4 class="card-title fw-bolder text-primary">Informasi Koordinat Sekolah</h4>
            </div>
            <div class="card-body">
                <div class="row mb-2">
                    <div class="mb-2 col-lg-4 col-12">
                        <x-label for="lintang">Lintang</x-label>
                        <x-input id="lintang" name="lintang" type="text" placeholder="lintang.." readonly></x-input>
                    </div>
                    <div class="mb-2 col-lg-4 col-12">
                        <x-label for="bujur">Bujur</x-label>
                        <x-input id="bujur" name="bujur" type="text" placeholder="bujur.." readonly></x-input>
                    </div>
                </div>
                <div class="rounded shadow-md" id="map" style="width: 100%; height: 400px;"></div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        var school_id = '{{ $id }}',
            unit = '{{ $unit }}';
    </script>
    <script>
        $(() => {
            'use strict';

            var lock_button = $('#button-kunci-sekolah'),
                school_edit_link = $('#link-edit-sekolah');

            $.ajax({
                url: `/panel/sekolah/json/single-school/${school_id}`,
                method: 'get',
                dataType: 'json',
                beforeSend: () => {
                    headerSchoolAction('onLoad');
                },
                success: (school) => {
                    console.log('Sekolah : ', school);
                    if (school.logo) $('#logo-sekolah').attr('src', school.logo);

                    headerSchoolAction('onSuccess', school);

                    if (school.lintang && school.bujur) {
                        $('#lintang').val(school.lintang);
                        $('#bujur').val(school.bujur);
                    }
                    initMap(school.lintang, school.bujur)

                },
                complete: () => {
                    headerSchoolAction('onComplete')
                },
                error: (xhr, status, error) => {
                    console.error('Failed to get kuota.', xhr.status, error);
                }
            });

            // -----------For Header-----------
            function headerSchoolAction(type, school = '') {
                switch (type) {
                    case 'onLoad':
                        // For Name, Npsn, And Status
                        $('#info-sekolah').addClass('placeholder-glow');
                        $('#nama-sekolah,#npsn-sekolah,#status-sekolah').text('Memuat Data').addClass('placeholder col-12');

                        // Button Skeleton
                        buttonSkeletonForEditAndLockSchool()
                        break;

                    case 'onSuccess':
                        // For Name, Npsn, And Status
                        $('#nama-sekolah').html(() => {
                            var verifiedCheck = `<x-tabler-discount-check-filled style="color: #0369a1" />`;
                            let showVerified = school.terverifikasi === 'verifikasi' ? verifiedCheck : '';
                            return `${school.nama_sekolah} ${showVerified}`
                        });
                        $('#npsn-sekolah').text(school.npsn);
                        $('#status-sekolah').html(() => {
                            if (school.terverifikasi === 'belum_simpan') {
                                return `Status : <span class="badge bg-light-danger">Belum Simpan</span>`
                            }
                            if (school.terverifikasi === 'simpan') {
                                return `Status : <span class="badge bg-light-warning">Sudah Simpan</span>`
                            }
                            if (school.terverifikasi === 'verifikasi') {
                                return `Status : <span class="badge bg-light-success">Terverifikasi</span>`
                            }
                            return `Status : <span class="badge bg-light-warning">Status Tidak Diketahui</span>`
                        })

                        // For School Verified Button
                        buttonForVerifiyingSchool(school)

                        // For Link Edit School
                        linkForEditingSchoolInfo(school)
                        break;

                    case 'onComplete':
                        // For Name, Npsn, And Status
                        $('#info-sekolah').removeClass('placeholder-glow');
                        $('#nama-sekolah,#npsn-sekolah,#status-sekolah').removeClass('placeholder');

                        // Button Skeleton
                        $('#btn-loader').html('');

                        break;
                }
            }

            function buttonSkeletonForEditAndLockSchool() {
                $("#btn-loader").html(() => {
                    return `
                <div id="btn-loader" class="placeholder-glow d-flex gap-2">
                    <button class="btn btn-secondary disabled placeholder" style="width: 237px" aria-disabled="true"></button>
                    <button class="btn btn-secondary disabled placeholder" style="width: 237px" aria-disabled="true"></button>
                </div>
                `
                });
            }

            function buttonForVerifiyingSchool(school) {
                if (school.terverifikasi === 'simpan') {
                    lock_button.show();
                    lock_button.html(function() {
                        return `
                <button type="button" class="btn btn-warning">
                    <x-tabler-checkup-list />
                    Verifikasi Sekolah
                </button>`
                    });
                } else if (school.terverifikasi === 'verifikasi') {
                    lock_button.show();
                    lock_button.html(function() {
                        return `
                <button type="button" class="btn btn-success" disabled>
                    <x-tabler-discount-check />
                    Sekolah Sudah Terverifikasi
                </button>`
                    });
                }
            }

            function linkForEditingSchoolInfo(school) {
                if (school.terverifikasi === 'belum_simpan') {
                    school_edit_link.show()
                    school_edit_link.html(function() {
                        return `
                <a href="/panel/sekolah/${school.id}/${school.satuan_pendidikan}/edit" class="btn btn-success">
                    <x-tabler-pencil />
                    Edit Info Sekolah
                </a>`
                    })
                }
            }
            // -----------For Header-----------
        })
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDS-nYa_Am79m7sMGUYpehL8XKE3XFv_RM&libraries=places&callback=initMap"></script>
    <script>
        let map, marker;

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
