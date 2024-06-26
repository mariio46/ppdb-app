@extends('student.registration.tracks.track-base', ['typeSchool' => 'SMK', 'track' => 'Anak DUDI'])

@section('school-choices')
    <div class="card-header">
        <h4 class="card-title">Sekolah Pilihan</h4>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-6 col-12">
                <x-student.select id="city1" label="Kabupaten/Kota Sekolah Pilihan" ph="Kabupaten/Kota"></x-student.select>
            </div>
            <div class="col-lg-6 col-12">
                <x-student.select id="school1" label="Sekolah Pilihan"></x-student.select>
            </div>
        </div>

        {{-- department 1 --}}
        <h5 class="text-warning mt-2">Pilihan 1</h5>
        <x-student.select id="department1" label="Jurusan Pilihan"></x-student.select>

        {{-- department 2 --}}
        <h5 class="text-warning mt-2">Pilihan 2</h5>
        <x-student.select id="department2" label="Jurusan Pilihan"></x-student.select>

        {{-- department 3 --}}
        <h5 class="text-warning mt-2">Pilihan 3</h5>
        <x-student.select id="department3" label="Jurusan Pilihan"></x-student.select>

        {{-- others --}}
        <input id="city1Name" name="city1Name" type="hidden">
        <input id="school1Name" name="school1Name" type="hidden">
        <input id="department1Name" name="department1Name" type="hidden">
        <input id="department2Name" name="department2Name" type="hidden">
        <input id="department3Name" name="department3Name" type="hidden">
    </div>

    <x-student.registration-modal modalLevel="SMK" modalTrack="Anak DUDI" withSchoolVerif="false"></x-student.registration-modal>
@endsection
