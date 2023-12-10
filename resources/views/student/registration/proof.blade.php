@extends('layouts.student.auth')

@section('content')
  <div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
      <div class="row breadcrumbs-top">
        <div class="col-12">
          <h2 class="content-header-title float-start mb-0">Pendaftaran</h2>
          <div class="breadcrumb-wrapper">
            <ol class="breadcrumb breadcrumb-slash">
              <li class="breadcrumb-item">
                <a href="/pendaftaran">Pendaftaran</a>
              </li>
              <li class="breadcrumb-item">
                <a href="/pendaftaran/tahap/{{ $phaseCode }}">Pendaftaran Tahap {{ $phase }}</a>
              </li>
              <li class="breadcrumb-item active">
                Cetak Bukti Pendaftaran
              </li>
            </ol>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="content-body">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <h3 class="text-center card-title mt-2">BUKTI PENDAFTARAN PPDB ONLINE SULAWESI SELATAN TAHUN 2024</h3>
          </div>
          <div class="card-body border-top">
            <h4 class="mb-2">Pendaftaran <span id="schoolType"></span> Jalur <span id="chosenTrack"></span></h4>

            <h5>Data Diri</h5>
            <div class="row">
              <div class="col-md-6 col-12">
                <table class="table table-borderless">
                  <tr>
                    <td class="col-auto px-0" style="width: 35%;">Nama Lengkap</td>
                    <td class="col-auto">:</td>
                    <td class="col-auto px-0" style="width: 60%;">{{ session()->get('stu_name') }}</td>
                  </tr>
                  <tr>
                    <td class="col-auto px-0">NISN</td>
                    <td class="col-auto">:</td>
                    <td class="col-auto px-0">{{ session()->get('stu_nisn') }}</td>
                  </tr>
                </table>
              </div>
              <div class="col-md-6 col-12">
                <table class="table table-borderless">
                  <tr>
                    <td class="col-auto px-0" style="width: 35%;">Jenis Kelamin</td>
                    <td class="col-auto">:</td>
                    <td class="col-auto px-0" style="width: 60%;">?</td>
                  </tr>
                  <tr>
                    <td class="col-auto px-0">Asal Sekolah</td>
                    <td class="col-auto">:</td>
                    <td class="col-auto px-0">{{ session()->get('stu_school') }}</td>
                  </tr>
                </table>
              </div>
            </div>
          </div>

          <div class="card-body border-top">
            <h4 class="mb-2">Sekolah Pilihan</h4>

            <div class="row">
              <div class="col-lg-6 col-12" id="chosenSchoolSect"></div>
            </div>

            <h5 class="text-primary">Sekolah Verifikasi Berkas</h5>
            <div class="row">
              <div class="col-lg-6 col-12">
                <div class="d-flex align-items-center mb-2">
                  <div style="width: 35%;">Sekolah Pilihan</div>
                  <div class="px-1">:</div>
                  <div style="width: 60%;"><span id="schoolVerif">-</span></div>
                </div>
              </div>
            </div>

            {{-- info --}}
            <div class="alert alert-info p-1">
              <p class="mb-0">
                Silakan ke sekolah tempat verifikasi berkas yang kamu pilih selambat-lambatnya tanggal <span class="text-danger fw-bold" id="endVerif"></span> dengan membawa semua berkas yang
                diperlukan seperti:
              </p>
            </div>
          </div>

          <div class="card-body border-top">
            <x-button color="success" withIcon="true"><x-bi-printer /><span class="ms-1">Cetak Bukti Pendaftaran</span></x-button>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
  <script>
    var phase = '{{ $phase }}';
  </script>
  <script>
    $(function() {
      'use strict';

      var schoolType = $('#schoolType'),
        chosenTrack = $('#chosenTrack'),
        chosenSchoolSect = $('#chosenSchoolSect'),
        schoolVerif = $('#schoolVerif'),
        endVerif = $('#endVerif'),
        tracks = {
          'AA': 'Afirmasi',
          'AB': 'Perpindahan Tugas Orang Tua',
          'AC': 'Anak Guru',
          'AD': 'Prestasi Akademik',
          'AE': 'Prestasi Non Akademik',
          'AF': 'Zonasi',
          'AG': 'Boarding School',
          'KA': 'Afirmasi',
          'KB': 'Perpindahan Tugas Orang Tua',
          'KC': 'Anak Guru',
          'KD': 'Prestasi Akademik',
          'KE': 'Prestasi Non Akademik',
          'KF': 'Domisili Terdekat',
          'KG': 'Anak DUDI',
        },
        months = [
          "Januari",
          "Februari",
          "Maret",
          "April",
          "Mei",
          "Juni",
          "Juli",
          "Agustus",
          "September",
          "Oktober",
          "November",
          "Desember"
        ];

      $.ajax({
        url: '/registration/get-data/' + phase,
        method: 'get',
        dataType: 'json',
        success: function(data) {
          let t = data.track;
          let j = t.charAt(0);
          let d = new Date(data.end_verif);

          schoolType.text(j === 'A' ? 'SMA' : 'SMK');
          chosenTrack.text(tracks[t]);

          chosenSchoolSect.html('');
          if (j == 'A') { // if the type of school is high school (SMA)
            if (t == 'AC' || t == 'AG') { // if the track is teacher's child or boarding school
              chosenSchoolSect.append(chosenSchoolHtml(data.school1));
            } else {
              chosenSchoolSect.append(chosenSchoolHtml(data.school1, '1'));
              chosenSchoolSect.append(chosenSchoolHtml(data.school2, '2'));
              chosenSchoolSect.append(chosenSchoolHtml(data.school3, '3'));
            }
          } else if (j == 'K') { // if the type of school is vocational school (SMK)
            chosenSchoolSect.append(chosenSchoolHtml(data.school1, '1', 'y', data.department1));
            chosenSchoolSect.append(chosenSchoolHtml(data.school2, '2', 'y', data.department2));
            chosenSchoolSect.append(chosenSchoolHtml(data.school3, '3', 'y', data.department3));
          }

          schoolVerif.text(data.school_verif);
          endVerif.text(d.getDate() + ' ' + months[d.getMonth()] + ' ' + d.getFullYear());
        },
        error: function(xhr, status, error) {
          console.error('Failed to get data.', status, error);
        }
      });

      function chosenSchoolHtml(schoolName, n = '', withDept = 'n', deptName = '') {
        let dept = (withDept == 'y') ?
          `<div class="d-flex align-items-center mb-2">
            <div style="width: 35%;">Jurusan</div>
            <div class="mx-1">:</div>
            <div style="width: 60%;">${deptName}</div>
          </div>` : '';

        return `
        <h5 class="text-warning">Pilihan ${n}</h5>

        <div class="d-flex align-items-center mb-1">
          <div style="width: 35%;">Sekolah Pilihan</div>
          <div class="mx-1">:</div>
          <div style="width: 60%;">${schoolName}</div>
        </div>
        
        ${dept}`;
      }
    });
  </script>
@endpush
