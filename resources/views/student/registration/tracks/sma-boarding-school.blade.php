@extends('student.registration.tracks.track-base', ['typeSchool' => 'SMA', 'track' => 'Boarding School'])

@section('school-choices')
    <div class="card-header">
        <h5 class="card-title">Sekolah Pilihan</h5>
    </div>
    <div class="card-body">
        <x-student.select id="school1" label="Sekolah Pilihan" />
        <input id="school1Name" name="school1Name" type="hidden">
    </div>

    <x-student.registration-modal modalLevel="SMA" modalTrack="Boarding School" multiSchool="false" withSchoolVerif="false"></x-student.registration-modal>
@endsection
