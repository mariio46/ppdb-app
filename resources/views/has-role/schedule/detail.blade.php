@extends('layouts.has-role.auth', ['title' => 'Detail Jadwal'])

@section('content')
<div class="content-header row">
  <div class="content-header-left col-md-9 col-12 mb-2">
      <div class="row breadcrumbs-top">
          <div class="col-12">
              <h2 class="content-header-title float-start mb-0">Tahap & Jadwal</h2>
              <div class="breadcrumb-wrapper">
                  <ol class="breadcrumb">
                      <li class="breadcrumb-item">
                          <a href="{{ route('schedules.index') }}">
                              Tahap & Jadwal
                          </a>
                      </li>
                      <li class="breadcrumb-item active">
                          Lihat Detail
                      </li>
                  </ol>
              </div>
          </div>
      </div>
  </div>
</div>

@if (session()->get('msg'))
    <div class="alert alert-{{ session()->get('stat') }} p-1">
      <p class="mb-0 text-center">{{ session()->get('msg') }}</p>
    </div>
@endif

<div class="content-body row">
  <div class="col-12">
    <div class="card">
      <div class="card-body px-0">
        <div class="d-flex align-items-center mb-3 px-2">
          <h5 class="card-title mb-0">Pendaftaran Tahap <span id="phase">1</span></h5>

          <x-link href="{{ route('schedules.edit.index', [$id]) }}" color="success" withIcon="true" class="ms-auto"><x-tabler-pencil-minus /> Edit Tahap</x-link>
        </div>

        {{-- registration --}}
        <div class="mb-3">
          <div class="d-flex align-items-center mb-1 px-2">
            <h5 class=" text-primary mb-0">Jadwal Pendaftaran</h5>

            <x-link href="{{ route('schedules.edit.regis', [$id]) }}" color="success" variant="outline" class="ms-auto btn-sm">Edit Waktu Pendaftaran</x-link>
          </div>
          <div class="table-responsive">
            <table class="table table-striped border-bottom">
              <thead>
                <tr>
                  <th>Tanggal</th>
                  <th class="text-end">Pukul</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><span class="bullet bullet-sm bullet-success me-1"></span> Senin, 01 Januari 2024</td>
                  <td class="text-end">07.00 WITA - 17.00 WITA</td>
                </tr>
                <tr>
                  <td><span class="bullet bullet-sm bullet-success me-1"></span> Selasa, 02 Januari 2024</td>
                  <td class="text-end">07.00 WITA - 17.00 WITA</td>
                </tr>
                <tr>
                  <td><span class="bullet bullet-sm bullet-success me-1"></span> Rabu, 03 Januari 2024</td>
                  <td class="text-end">07.00 WITA - 17.00 WITA</td>
                </tr>
                <tr>
                  <td><span class="bullet bullet-sm bullet-success me-1"></span> Kamis, 04 Januari 2024</td>
                  <td class="text-end">07.00 WITA - 12.00 WITA</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        {{-- verification --}}
        <div class="mb-3">
          <div class="d-flex align-items-center mb-1 px-2">
            <h5 class=" text-primary mb-0">Jadwal Verifikasi Manual</h5>

            <x-link href="{{ route('schedules.edit.verif', [$id]) }}" color="success" variant="outline" class="ms-auto btn-sm">Edit Waktu Verifikasi</x-link>
          </div>

          <div class="table-responsive">
            <table class="table table-striped border-bottom">
                <thead>
                  <tr>
                    <th>Tanggal</th>
                    <th class="text-end">Pukul</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><span class="bullet bullet-sm bullet-primary me-1"></span> Senin, 01 Januari 2024</td>
                    <td class="text-end">07.00 WITA - 17.00 WITA</td>
                  </tr>
                  <tr>
                    <td><span class="bullet bullet-sm bullet-primary me-1"></span> Selasa, 02 Januari 2024</td>
                    <td class="text-end">07.00 WITA - 17.00 WITA</td>
                  </tr>
                  <tr>
                    <td><span class="bullet bullet-sm bullet-primary me-1"></span> Rabu, 03 Januari 2024</td>
                    <td class="text-end">07.00 WITA - 17.00 WITA</td>
                  </tr>
                  <tr>
                    <td><span class="bullet bullet-sm bullet-primary me-1"></span> Kamis, 04 Januari 2024</td>
                    <td class="text-end">07.00 WITA - 17.00 WITA</td>
                  </tr>
                </tbody>
              </table>
          </div>
        </div>

        {{-- announcement --}}
        <div class="mb-3">
          <div class="d-flex align-items-center mb-1 px-2">
            <h5 class=" text-primary mb-0">Jadwal Pengumuman</h5>

            <x-link href="" color="success" variant="outline" class="ms-auto btn-sm">Edit Waktu Pengumuman</x-link>
          </div>

          <div class="table-responsive">
            <table class="table table-striped border-bottom">
                <thead>
                  <tr>
                    <th>Tanggal</th>
                    <th class="text-end">Pukul</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><span class="bullet bullet-sm bullet-warning me-1"></span> Jumat, 05 Januari 2024</td>
                    <td class="text-end">09.00 WITA</td>
                  </tr>
                </tbody>
            </table>
          </div>
        </div>

        {{-- reregistration --}}
        <div class="mb-3">
          <div class="d-flex align-items-center mb-1 px-2">
            <h5 class=" text-primary mb-0">Jadwal Pendaftaran Ulang</h5>

            <x-link href="" color="success" variant="outline" class="ms-auto btn-sm">Edit Waktu Daftar Ulang</x-link>
          </div>

          <div class="table-responsive">
            <table class="table table-striped border-bottom">
                <thead>
                  <tr>
                    <th>Tanggal</th>
                    <th class="text-end">Pukul</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><span class="bullet bullet-sm bullet-info me-1"></span> Jumat, 05 Januari 2024</td>
                    <td class="text-end">09.00 WITA - 17.00 WITA</td>
                  </tr>
                  <tr>
                    <td><span class="bullet bullet-sm bullet-info me-1"></span> Sabtu, 06 Januari 2024</td>
                    <td class="text-end">07.00 WITA - 17.00 WITA</td>
                  </tr>
                </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="content-body row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Hapus Tahap dan Jadwal</h5>

        <div class="alert alert-warning p-1 mb-2">
          <p class="mb-0">Apakah anda yakin ingin menghapus data ini?</p>
        </div>

        <div class="mb-2">
          <x-checkbox identifier="isCheck" label="Saya yakin untuk menghapus data ini" variant="danger" />
        </div>

        <x-button color="danger" id="btnCheck" data-bs-toggle="modal" data-bs-target="#modalRemove" disabled>Hapus Data</x-button>
        {{-- modal --}}
        <div class="modal fade text-start" id="modalRemove" aria-labelledby="modalLabel" aria-hidden="true" tabindex="-1">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header bg-white">
                <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <h3 class="text-center my-2">Hapus Tahap dan Jadwal</h3>

                <p class="px-5">Apakah Anda yakin ingin menghapus data ini? Data yang sudah di hapus tidak bisa di kembalikan kembali.</p>

                <div class="d-flex justify-content-center mb-2">
                  <form action="{{ route('schedules.remove') }}" method="post">
                    @csrf
                    <input type="hidden" name="removeId" value="{{ $id }}">
                    <x-button class="m-1" color="danger" type="submit">Ya, Hapus</x-button>
                  </form>
                  <x-button class="m-1" color="secondary" variant="outline" type="button" data-bs-dismiss="modal">Batalkan</x-button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('scripts')
    <script>
      $(function() {
        'use strict';

        var cb = $('#isCheck'),
          btnModal = $('#btnCheck');

        cb.change(function() {
          if ($(this).is(':checked')) {
            btnModal.prop('disabled', false);
          } else {
            btnModal.prop('disabled', true);
          }
        });
      });
    </script>
@endpush