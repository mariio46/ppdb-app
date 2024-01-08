$(function() {
  'use strict';

  var searchBtn = $('#searchBtn'),
    section = $('#accordionSection');

  function getData(search) {
    $.ajax({
      url: '/faq/get-data',
      method: 'GET',
      data: {
        search: search
      },
      dataType: 'json',
      success: function(data) {
        displayData(data);
      },
      error: function(xhr, status, error) {
        console.error('Failed get data.', status, error);
      }
    });
  }

  function generateHtml(n, q, a) {
    return `
    <div class="card accordion-item">
    <h2 class="accordion-header" id="faq${n}">
      <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#faq-${n}" role="button" aria-expanded="false" aria-controls="faq-${n}">
        ${q}
      </button>
    </h2>

    <div class="collapse accordion-collapse" id="faq-${n}" aria-labelledby="faq${n}" data-bs-parent="#accordionSection">
      <div class="accordion-body">
        ${a}
      </div>
    </div>
  </div>`;
  }

  function displayData(data) {
    let n = 1;
    section.html('');
    if (data.length) {
      data.forEach(d => {
        section.append(generateHtml(n++, d.question, d.answer));
      });
    } else {
      section.html('<p class="text-center">Tidak ada data ditemukan.</p>')
    }
  }

  getData('');

  searchBtn.click(function() {
    let search = $('#search').val();
    getData(search);
  });

  $('#search').keypress(function(event) {
    if (event.which === 13) {
      event.preventDefault();

      searchBtn.click();
    }
  });
});