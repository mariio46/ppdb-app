@extends('student.registration.tracks.track-base', ['typeSchool' => 'SMK', 'track' => 'Prestasi Non Akademik'])

@section('additional-data')
    <div class="card-body border-top">
        <h5>Data Pendukung</h5>

        <div class="alert alert-warning p-1">
            <p class="mb-0">Silakan lengkapi data di bawah ini sesuai dengan prestasi terbaik yang pernah kamu miliki.</p>
        </div>

        <div class="row">
            <div class="col-lg-6 col-12">
                {{-- achievement type --}}
                <x-student.select id="achievementType" label="Jenis Prestasi" search="n">
                    <option value="berjenjang">Berjenjang Individu</option>
                    <option value="tidak_berjenjang">Tidak Berjenjang Individu</option>
                    <option value="beregu">Beregu</option>
                </x-student.select>
            </div>
            <div class="col-lg-6 col-12">
                {{-- achievement level --}}
                <x-student.select id="achievementLevel" label="Tingkatan Prestasi" search="n">
                    <option value="internasional">Internasional</option>
                    <option value="nasional">Nasional</option>
                    <option value="provinsi">Provinsi</option>
                    <option value="kabupaten">Kabupaten/Kota</option>
                </x-student.select>
            </div>
            <div class="col-lg-6 col-12">
                {{-- achievement champ --}}
                <x-student.select id="achievementChamp" label="Juara yang didapatkan" ph="Juara ke" search="n">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </x-student.select>
            </div>
            <div class="col-lg-6 col-12">
                {{-- achievement's name --}}
                <div class="mb-1">
                    <x-label for="achievementName">Nama Prestasi/Kejuaraan</x-label>
                    <x-input id="achievementName" name="achievementName" placeholder="Nama Prestasi/Kejuaraan" />
                </div>
            </div>
            <div class="col-md-6 col-12">
                <p>Bobot: <span class="" id="bobotx">0</span> poin</p>
                <x-input id="achievementWeight" name="achievementWeight" type="hidden" />
                <div class="alert alert-secondary p-1">
                    <p class="mb-0">Nilai bobot paling sedikit adalah 15 dan paling banyak adalah 100.</p>
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
        {{-- department 1 --}}
        <h5 class="text-warning mt-0">Pilihan 1</h5>
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
        <input id="city2Name" name="city2Name" type="hidden">
        <input id="school2Name" name="school2Name" type="hidden">
        <input id="department2Name" name="department2Name" type="hidden">
        <input id="city3Name" name="city3Name" type="hidden">
        <input id="school3Name" name="school3Name" type="hidden">
        <input id="department3Name" name="department3Name" type="hidden">
        <input id="schoolVerif" name="schoolVerif" type="hidden">
        <input id="schoolVerifName" name="schoolVerifName" type="hidden">
    </div>

    <x-student.registration-modal modalLevel="SMK" modalTrack="Prestasi Non Akademik">
        <tr>
            <td class="col-auto px-0">Jenis Prestasi</td>
            <td class="col-auto">:</td>
            <td class="col-auto px-0"><span id="achTypeShow"></span></td>
        </tr>
        <tr>
            <td class="col-auto px-0">Prestasi</td>
            <td class="col-auto">:</td>
            <td class="col-auto px-0"><span id="achChampShow"></span> <span id="achLevelShow"></span></td>
        </tr>
        <tr>
            <td class="col-auto px-0">Nama Prestasi</td>
            <td class="col-auto">:</td>
            <td class="col-auto px-0"><span id="achNameShow"></span></td>
        </tr>
    </x-student.registration-modal>
@endsection
