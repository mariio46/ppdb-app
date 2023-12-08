@extends('layouts.student.auth')

@section('vendorStyles')
  <link type="text/css" href="/app-assets/vendors/css/forms/select/select2.min.css" rel="stylesheet">
  <link type="text/css" href="/app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css" rel="stylesheet">
@endsection

@section('styles')
  <style>
    @media only screen and (max-width: 767px) {
      table.dataTable {
        display: block;
        overflow-x: auto;
      }
    }
  </style>
@endsection

@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <h5>Filter</h5>
          <div class="row">
            <div class="col-md-5 col-10 mb-1 pe-1">
              <x-select class="form-select select2 w-100" id="eduType" data-placeholder="Satuan Pendidikan" data-minimum-results-for-search="-1">
                <option value=""></option>
                <option value="SMA">SMA</option>
                <option value="SMK">SMK</option>
              </x-select>
            </div>
            <div class="col-md-1 col-2 ps-0">
              <x-button class="w-100 btn-md" id="btnResetTypeFilter" type="button" style="padding: .7rem;" variant="outline" color="secondary">
                <span class="d-lg-block d-none">Reset</span>
                <span class="d-lg-none"><x-bi-x /></span>
              </x-button>
            </div>

            <div class="col-md-5 col-10 mb-1 pe-1">
              <x-select class="form-select select2 w-100" id="city" data-placeholder="Kabupaten/Kota">
                <option value=""></option>
              </x-select>
            </div>

            <div class="col-md-1 col-2 ps-0">
              <x-button class="w-100" id="btnResetCityFilter" type="button" style="padding: .7rem;" variant="outline" color="secondary">
                <span class="d-lg-block d-none">Reset</span>
                <span class="d-lg-none"><x-bi-x /></span>
              </x-button>
            </div>
          </div>
        </div>
        <div class="card-body border-top">
          <table class="table" id="tableData">
            <thead>
              <tr>
                <th>Nama Sekolah</th>
                <th>NPSN</th>
                <th>Satuan Pendidikan</th>
                <th>Alamat</th>
                <th>Detail</th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  {{-- modal --}}
  <div class="modal fade" id="detailModal" aria-labelledby="modalLabel" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header bg-white">
          <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <h5 class="text-center mb-3">Detail Sekolah</h5>

          <table class="table table-borderless">
            <tr>
              <td class="col-auto px-0" style="width: 40%;">Nama Sekolah</td>
              <td class="col-auto">:</td>
              <td class="col-auto px-0"><span id="schoolName"></span></td>
            </tr>
            <tr>
              <td class="col-auto px-0" style="width: 40%;">NPSN</td>
              <td class="col-auto">:</td>
              <td class="col-auto px-0"><span id="schoolId"></span></td>
            </tr>
            <tr>
              <td class="col-auto px-0" style="width: 40%;">Alamat</td>
              <td class="col-auto">:</td>
              <td class="col-auto px-0"><span id="schoolAddress"></span></td>
            </tr>
          </table>
        </div>

        <div id="modalDepartment"></div>
      </div>
    </div>
  </div>
@endsection

@section('vendorScripts')
  <script src="/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
  <script src="/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js"></script>
  <script src="/app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js"></script>
@endsection

@push('scripts')
  <script>
    $(function() {
      'use strict';

      var select = $(".select2"),
        fType = $('#eduType'),
        fCity = $('#city'),
        rType = $('#btnResetTypeFilter'),
        rCity = $('#btnResetCityFilter'),
        table = $('#tableData');

      // --------------------------------------------------
      // select2
      if (select.length) {
        select.each(function() {
          var $this = $(this);
          $this.wrap('<div class="position-relative"></div>');
          $this.select2({
            dropdownParent: $this.parent()
          });
        });
      }

      // --------------------------------------------------
      // dataTable
      if (table.length) {
        let filterType = fType.val();
        let filterCity = fCity.val();
        var datatable = table.DataTable({
          ajax: {
            url: '/schools/get-list?t=' + filterType + '&c=' + filterCity,
            dataSrc: 'data'
          },
          columns: [{
              data: 'name'
            },
            {
              data: 'id'
            },
            {
              data: 'type'
            },
            {
              data: 'address'
            },
            {
              data: null,
              render: function(data, type, row) {
                return '<button class="btn btn-primary btn-detail" data-bs-toggle="modal" data-bs-target="#detailModal" data-all=\'' + JSON.stringify(row) + '\'>Lihat Detail</button>';
              }
            }
          ],
          columnDefs: [{
            className: 'text-center',
            targets: [1, 2, 4]
          }, ],
          language: {
            paginate: {
              // remove previous & next text from pagination
              previous: '&nbsp;',
              next: '&nbsp;'
            }
          },
          createdRow: function(row, data, dataIndex) {
            $(row).addClass('row-' + dataIndex);
          },
        });
      }

      // --------------------------------------------------
      // load city
      function loadCity() {
        $.ajax({
          url: '/cities/73',
          method: 'get',
          dataType: 'json',
          success: function(cities) {
            fCity.empty().append('<option value=""></option>');

            cities.forEach(city => {
              fCity.append(`<option value="${city.code}">${city.name}</option>`);
            });
          },
          error: function(xhr, status, error) {
            console.error('Get data failed: ', status, error);
          }
        });
      }

      loadCity();

      // --------------------------------------------------
      // filtering
      function filtering() {
        const t = fType.val();
        const c = fCity.val();

        datatable.ajax.url('/schools/get-list?t=' + t + '&c=' + c).load();
      }
      $('#eduType, #city').change(function() {
        filtering();
      });
      rType.click(function() {
        fType.val('').trigger('change');
      });
      rCity.click(function() {
        fCity.val('').trigger('change');
      });

      // detail
      $('#tableData tbody').on('click', '.btn-detail', function() {
        var rowData = datatable.row($(this).closest('tr')).data();

        console.log(rowData);

        $('#schoolName').text(rowData.name);
        $('#schoolId').text(rowData.id);
        $('#schoolAddress').text(rowData.address);

        $('#modalDepartment').html('');

        if (rowData.type === 'SMK') {
          $('#modalDepartment').addClass('card-body border-top');

          var title = $('<h5 class="mb-2">Daftar Jurusan</h5>').appendTo('#modalDepartment');

          var rowElement = $('<div class="row"></div>').appendTo('#modalDepartment');

          rowData.department.forEach(dep => {
            rowElement.append($('<div class="col-md-6 col-12"><p>&bull; ' + dep + '</p></div>'));
          });
        }
      });
    });
  </script>
@endpush
