@extends('student.registration.tracks.track-base', ['typeSchool' => 'SMK', 'track' => 'Prestasi Akademik'])

@section('school-choices')
    <div class="card-header">
        <h4 class="card-title">Sekolah Pilihan</h4>
    </div>
    <div class="card-body">
        {{-- department 1 --}}
        <h5 class="text-warning mt-2">Pilihan 1</h5>
        <div class="row">
            <div class="col-lg-4 col-12">
                <x-student.select id="city1" label="Kabupaten/Kota Sekolah Pilihan" ph="Kabupaten/Kota"></x-student.select>
            </div>
            <div class="col-lg-4 col-12">
                <x-student.select id="school1" label="Sekolah Pilihan"></x-student.select>
            </div>
            <div class="col-lg-4 col-12">
                <x-student.select id="department1" label="Jurusan Pilihan"></x-student.select>
            </div>
        </div>

        {{-- department 2 --}}
        <h5 class="text-warning mt-2">Pilihan 2</h5>
        <div class="row">
            <div class="col-lg-4 col-12">
                <x-student.select id="city2" label="Kabupaten/Kota Sekolah Pilihan" ph="Kabupaten/Kota"></x-student.select>
            </div>
            <div class="col-lg-4 col-12">
                <x-student.select id="school2" label="Sekolah Pilihan"></x-student.select>
            </div>
            <div class="col-lg-4 col-12">
                <x-student.select id="department2" label="Jurusan Pilihan"></x-student.select>
            </div>
        </div>

        {{-- department 3 --}}
        <h5 class="text-warning mt-2">Pilihan 3</h5>
        <div class="row">
            <div class="col-lg-4 col-12">
                <x-student.select id="city3" label="Kabupaten/Kota Sekolah Pilihan" ph="Kabupaten/Kota"></x-student.select>
            </div>
            <div class="col-lg-4 col-12">
                <x-student.select id="school3" label="Sekolah Pilihan"></x-student.select>
            </div>
            <div class="col-lg-4 col-12">
                <x-student.select id="department3" label="Jurusan Pilihan"></x-student.select>
            </div>
        </div>

        {{-- others --}}
        <input id="city1Name" name="city1Name" type="hidden">
        <input id="school1Name" name="school1Name" type="hidden">
        <input id="department1Name" name="department1Name" type="hidden">
        <input id="city1Name" name="city1Name" type="hidden">
        <input id="school1Name" name="school1Name" type="hidden">
        <input id="department1Name" name="department1Name" type="hidden">
        <input id="city1Name" name="city1Name" type="hidden">
        <input id="school1Name" name="school1Name" type="hidden">
        <input id="department1Name" name="department1Name" type="hidden">
        <input id="schoolVerif" name="schoolVerif" type="hidden">
        <input id="schoolVerifName" name="schoolVerifName" type="hidden">
    </div>

    <x-student.registration-modal modalLevel="SMK" modalTrack="Prestasi Akademik"></x-student.registration-modal>
@endsection
