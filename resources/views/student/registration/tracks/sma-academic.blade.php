@extends('student.registration.tracks.track-base', ['typeSchool' => 'SMA', 'track' => 'Prestasi Akademik'])

@section('school-choices')
  <div class="card-header">
    <h4 class="card-title">Sekolah Pilihan</h4>
  </div>
  <div class="card-body">
    {{-- sekolah pilihan 1 --}}
    <h5 class="text-warning mt-0">Pilihan 1</h5>
    <div class="row">
      <div class="col-lg-6 col-12">
        <x-student.select id="city1" label="Kabupaten/Kota Sekolah Pilihan" ph="Kabupaten/Kota"></x-student.select>
      </div>
      <div class="col-lg-6 col-12">
        <x-student.select id="school1" label="Sekolah Pilihan"></x-student.select>
      </div>
    </div>

    {{-- sekolah pilihan 2 --}}
    <h5 class="text-warning mt-1">Pilihan 2</h5>
    <div class="row">
      <div class="col-lg-6 col-12">
        <x-student.select id="city2" label="Kabupaten/Kota Sekolah Pilihan" ph="Kabupaten/Kota"></x-student.select>
      </div>
      <div class="col-lg-6 col-12">
        <x-student.select id="school2" label="Sekolah Pilihan"></x-student.select>
      </div>
    </div>

    {{-- sekolah pilihan 3 --}}
    <h5 class="text-warning mt-1">Pilihan 3</h5>
    <div class="row">
      <div class="col-lg-6 col-12">
        <x-student.select id="city3" label="Kabupaten/Kota Sekolah Pilihan" ph="Kabupaten/Kota"></x-student.select>
      </div>
      <div class="col-lg-6 col-12">
        <x-student.select id="school3" label="Sekolah Pilihan"></x-student.select>
      </div>
    </div>

    <input id="city1Name" name="city1Name" type="hidden">
    <input id="school1Name" name="school1Name" type="hidden">
    <input id="city2Name" name="city2Name" type="hidden">
    <input id="school2Name" name="school2Name" type="hidden">
    <input id="city3Name" name="city3Name" type="hidden">
    <input id="school3Name" name="school3Name" type="hidden">
    <input id="schoolVerif" name="schoolVerif" type="hidden">
    <input id="schoolVerifName" name="schoolVerifName" type="hidden">
  </div>

  {{-- Modal --}}
  <x-student.registration-modal modalLevel="SMA" modalTrack="Prestasi Akademik"></x-student.registration-modal>
@endsection
