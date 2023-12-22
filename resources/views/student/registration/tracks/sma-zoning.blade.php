@extends('student.registration.tracks.track-base', ['typeSchool' => 'SMA', 'track' => 'Zonasi'])

@section('school-choices')
    <div class="card-header">
        <h4 class="card-title">Sekolah Pilihan</h4>
    </div>
    <div class="card-body">
        <h5 class="text-warning mt-2">Pilihan 1</h5>
        <x-student.select id="school1" label="Sekolah Pilihan"></x-student.select>

        <h5 class="text-warning mt-2">Pilihan 2</h5>
        <x-student.select id="school2" label="Sekolah Pilihan"></x-student.select>

        <h5 class="text-warning mt-2">Pilihan 3</h5>
        <x-student.select id="school3" label="Sekolah Pilihan"></x-student.select>

        {{-- others --}}
        <input id="school1Name" name="school1Name" type="hidden">
        <input id="school2Name" name="school2Name" type="hidden">
        <input id="school3Name" name="school3Name" type="hidden">
        <input id="schoolVerif" name="schoolVerif" type="hidden">
        <input id="schoolVerifName" name="schoolVerifName" type="hidden">
    </div>

    <x-student.registration-modal modalLevel="SMA" modalTrack="Zonasi"></x-student.registration-modal>
@endsection
