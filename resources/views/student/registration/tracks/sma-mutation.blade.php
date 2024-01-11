@extends('student.registration.tracks.track-base', ['typeSchool' => 'SMA', 'track' => 'Perpindahan Tugas Orang Tua'])

@section('school-choices')
    <div class="card-header">
        <h4 class="card-title">Sekolah Pilihan</h4>
    </div>
    <div class="card-body">
        <x-student.select id="city1" label="Kabupaten/Kota Sekolah Pilihan" ph="Kabupaten/Kota"></x-student.select>

        {{-- sekolah pilihan 1 --}}
        <h5 class="text-warning mt-0">Pilihan 1</h5>
        <x-student.select id="school1" label="Sekolah Pilihan"></x-student.select>

        {{-- sekolah pilihan 2 --}}
        <h5 class="text-warning mt-1">Pilihan 2</h5>
        <x-student.select id="school2" label="Sekolah Pilihan"></x-student.select>

        {{-- sekolah pilihan 3 --}}
        <h5 class="text-warning mt-1">Pilihan 3</h5>
        <x-student.select id="school3" label="Sekolah Pilihan"></x-student.select>
    </div>

    <input id="city1Name" name="city1Name" type="hidden">
    <input id="school1Name" name="school1Name" type="hidden">
    <input id="school2Name" name="school2Name" type="hidden">
    <input id="school3Name" name="school3Name" type="hidden">
    <input id="schoolVerif" name="schoolVerif" type="hidden">
    <input id="schoolVerifName" name="schoolVerifName" type="hidden">

    <x-student.registration-modal modalLevel="SMA" modalTrack="Perpindahan Tugas Orang Tua"></x-student.registration-modal>
@endsection
