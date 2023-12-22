@extends('student.registration.tracks.track-base', ['typeSchool' => 'SMA', 'track' => 'Anak Guru'])

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

        {{-- additional --}}
        <input id="city1Name" name="city1Name" type="hidden">
        <input id="school1Name" name="school1Name" type="hidden">
    </div>

    <x-student.registration-modal modalLevel="SMA" modalTrack="Anak Guru" multiSchool="false" withSchoolVerif="false"></x-student.registration-modal>
@endsection
