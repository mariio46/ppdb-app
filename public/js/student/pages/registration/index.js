$(function() {
  'use stricts';

  var cardContainer = $('#cardContainer'),
    months = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
    colors = ['primary', 'success', 'warning', 'info', 'danger'];

  $.ajax({
    url: '/registration/get-schedules',
    method: 'get',
    dataType: 'json',
    success: function(schedules) {
      console.log(schedules);

      displayDataInCards(schedules);
    },
    error: function(xhr, status, error) {
      console.error('Gagal mengambil data:', status, error);
    }
  });

  function displayDataInCards(schedules) {
    let n = 1;

    schedules.forEach(schedule => {
      let start = new Date(schedule.start);
      let end = new Date(schedule.end);
      let btnHtml = '';
      let cdr = '';

      switch (checkDateRange(schedule.start, schedule.end)) {
        case 'pre':
          btnHtml = `<button class="btn btn-outline-secondary disabled" disabled>Tahap ${n} Belum Dibuka</button>`;
          cdr = 'pre';
          break;
        case 'now':
          btnHtml = `<a class="btn btn-primary" href="/pendaftaran/tahap/${schedule.code}">Lihat Tahap ${n}</a>`;
          cdr = 'now';
          break;
        case 'post':
          btnHtml = `<button class="btn btn-outline-secondary disabled">Tahap ${n} Sudah Ditutup</button>`;
          cdr = 'post';
          break;
        default:
          break;
      }

      var cardHtml = `
      <div class="col">
        <div class="card border border-1 ${cdr == 'now' ? 'border-primary' : ''} shadow-lg" style="border-width: ${cdr == 'now' ? '2px !important' : '1px'} ;">
          <div class="card-header d-flex align-items-center flex-column border-bottom">
            <div class="d-flex align-items-center">
              <div class="bg-light-${colors[n]} rounded p-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil-minus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" /><path d="M13.5 6.5l4 4" /><path d="M16 19h6" /></svg>
              </div>
              <div class="ms-1">
                <h3 class="mb-0">Pendaftaran Tahap ${n}</h3>
              </div>
            </div>
            <p class="text-warning mt-3">Jadwal: ${start.getDate()} ${months[start.getMonth()]} - ${end.getDate()} ${months[end.getMonth()]} ${end.getFullYear()}</p>
          </div>
          <div class="card-body">
            ${generateListItems('SMA', schedule.sma)}

            ${generateListItems('SMK', schedule.smk)}
          </div>
          <div class="card-footer border-top-0">
            <div class="row">
              <div class="d-grid">
                ${btnHtml}
              </div>
            </div>
          </div>
        </div>
      </div>`;

      cardContainer.append(cardHtml);

      n++;
    });
  }

  function generateListItems(school, items) {
    if (items.length) {
      return '<h4 class="mt-2">' + school + '</h4><ul>' + items.map(item => `<li class="pb-1">Jalur ${item.jalur}</li>`).join('') + '</ul>';
    } else {
      return '';
    }
  }

  function checkDateRange(startDate, endDate) {
    // Mendapatkan tanggal sekarang
    var currentDate = new Date();

    // Mengonversi tanggal mulai dan tanggal selesai ke objek Date
    var startDateObj = new Date(startDate);
    var endDateObj = new Date(endDate);

    // Memeriksa apakah tanggal sekarang berada dalam rentang waktu
    if (currentDate >= startDateObj && currentDate <= endDateObj) {
      return "now";
    } else if (currentDate < startDateObj) {
      return "pre";
    } else {
      return "post";
    }
  }
});