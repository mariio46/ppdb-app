@extends('student.registration.tracks.track-base', ['typeSchool' => 'SMA', 'track' => 'Afirmasi'])

@section('additional-data')
    <div class="card-body border-top">
        <h5>Data Berkas</h5>

        <div class="alert alert-warning p-1">
            <p class="mb-0">Silahkan lengkap data dibawah ini sesuai dengan afirmasi yang kamu miliki</p>
        </div>
        <div class="row">
            <div class="col-lg-6 col-12">
                <x-student.select id="affirmationType" label="Jenis Afirmasi" search="n">
                    <option value="disabilitas">Disabilitas</option>
                    <option value="pkh">PKH (Program Keluarga Harapan)</option>
                </x-student.select>
            </div>
            <div class="col-lg-6 col-12">
                <div class="mb-1" id="affirmationNumberSection" style="display: none;">
                    <x-label for="affirmationNumber">Nomor PKH</x-label>
                    <x-input id="affirmationNumber" name="affirmationNumber" placeholder="Nomor PKH" />
                </div>
            </div>
        </div>

    </div>
@endsection

@section('school-choices')
    <div class="card-header">
        <h4 class="card-title">Sekolah Pilihan</h4>
    </div>
    <div class="card-body">
        <h5 class="text-warning mt-1">Pilihan 1</h5>
        <div class="row">
            <div class="col-lg-6 col-12">
                <x-student.select id="city1" label="Kabupaten/Kota Sekolah Pilihan" ph="Kabupaten/Kota"></x-student.select>
            </div>
            <div class="col-lg-6 col-12">
                <x-student.select id="school1" label="Sekolah Pilihan"></x-student.select>
            </div>
        </div>

        <h5 class="text-warning mt-2">Pilihan 2</h5>
        <div class="row">
            <div class="col-lg-6 col-12">
                <x-student.select id="city2" label="Kabupaten/Kota Sekolah Pilihan" ph="Kabupaten/Kota"></x-student.select>
            </div>
            <div class="col-lg-6 col-12">
                <x-student.select id="school2" label="Sekolah Pilihan"></x-student.select>
            </div>
        </div>

        <h5 class="text-warning mt-2">Pilihan 3</h5>
        <div class="row">
            <div class="col-lg-6 col-12">
                <x-student.select id="city3" label="Kabupaten/Kota Sekolah Pilihan" ph="Kabupaten/Kota"></x-student.select>
            </div>
            <div class="col-lg-6 col-12">
                <x-student.select id="school3" label="Sekolah Pilihan"></x-student.select>
            </div>
        </div>

        <input id="city1Name" name="city1Name" type="hidden">
        <input id="city2Name" name="city2Name" type="hidden">
        <input id="city3Name" name="city3Name" type="hidden">
        <input id="school1Name" name="school1Name" type="hidden">
        <input id="school2Name" name="school2Name" type="hidden">
        <input id="school3Name" name="school3Name" type="hidden">
        <input id="schoolVerif" name="schoolVerif" type="hidden">
        <input id="schoolVerifName" name="schoolVerifName" type="hidden">
    </div>

    <x-student.registration-modal modalLevel="SMA" modalTrack="Afirmasi">
        <tr>
            <td class="col-auto px-0">Jenis Afirmasi</td>
            <td class="col-auto">:</td>
            <td class="col-auto px-0 fw-bold"><span id="affTypeShow"><i>null</i></span></td>
        </tr>
        <tr id="affTypeNumShowSection">
            <td class="col-auto px-0">Nomor PKH</td>
            <td class="col-auto">:</td>
            <td class="col-auto px-0 fw-bold"><span id="affTypeNumShow"><i>null</i></span></td>
        </tr>
    </x-student.registration-modal>
@endsection
