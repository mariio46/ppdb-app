@extends('layouts.has-role.auth', ['title' => 'Edit Maps Verifikasi Manual'])

@section('styles')
    <link type="text/css" href="/app-assets/css/plugins/forms/form-validation.css" rel="stylesheet">
@endsection

@section('content')
    <x-breadcrumb title="Verifikasi Manual">
        <x-breadcrumb-item title="Verifikasi Manual" to="{{ route('verifikasi.manual') }}" />
        <x-breadcrumb-item title="Lihat Detail Siswa" to="{{ route('verifikasi.manual.detail', [$id]) }}" />
        <x-breadcrumb-active title="Edit Titik Rumah Siswa" />
    </x-breadcrumb>

    <div class="content-body row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title">Sesuaikan Titik Rumah Siswa</h1>
                </div>
                <div class="card-body">
                    <div class="rounded shadow-md" id="map" style="width: 100%; height: 400px;"></div>
                    <x-input class="w-50 mt-1" id="search-input" type="text" placeholder="cari tempat.." />

                    <form id="form" action="{{ route('verifikasi.manual.update-map', [$id]) }}" method="post">
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
                        <div class="mb-2">
                            <x-button type="submit" color="success">Simpan Koordinat</x-button>
                            <x-link type="button" href="{{ route('verifikasi.manual.detail', [$id]) }}" variant="outline" color="secondary">Kembali</x-link>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('vendorScripts')
    <script src="/app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
@endsection

@push('scripts')
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDS-nYa_Am79m7sMGUYpehL8XKE3XFv_RM&libraries=places"></script>
    <script>
        var id = '{{ $id }}',
            student_id = '{{ $student_id }}';
    </script>
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

        $.ajax({
                url: `/panel/json/verifikasi-manual/get-coordinate/${student_id}`,
                method: 'get',
                dataType: 'json',
                success: function(data) {
                    initMap(parseFloat(data.data.lintang), parseFloat(data.data.bujur));
                    $('#lintang').val(data.data.lintang);
                    $('#bujur').val(data.data.bujur);
                },
                error: function(xhr, status, error) {
                    console.error('Failed to get data.', status, error);
                }
            });

        function initMap(lintang = -5.1384917, bujur = 119.4893742) {
            map = new google.maps.Map(document.getElementById('map'), {
                center: {
                    lat: lintang,
                    lng: bujur
                }, // Koordinat pusat peta awal
                zoom: 13,
                streetViewControl: false
            });

            placeMarker(new google.maps.LatLng(lintang, bujur));

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
