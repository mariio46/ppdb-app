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