$(function() {
  'use stricts';

  var bcTahap = $('#bcTahap'),
    alert = $('#phaseAlert'),
    tabList = $('#tabList'),
    tabContent = $('#tabContent'),
    months = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
    icons = new Map([
      ['AA',
        '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314"/></svg>'
      ],
      ['AB',
        '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-ticket-fill" viewBox="0 0 16 16"><path d="M1.5 3A1.5 1.5 0 0 0 0 4.5V6a.5.5 0 0 0 .5.5 1.5 1.5 0 1 1 0 3 .5.5 0 0 0-.5.5v1.5A1.5 1.5 0 0 0 1.5 13h13a1.5 1.5 0 0 0 1.5-1.5V10a.5.5 0 0 0-.5-.5 1.5 1.5 0 0 1 0-3A.5.5 0 0 0 16 6V4.5A1.5 1.5 0 0 0 14.5 3z"/></svg>'
      ],
      ['AC',
        '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16"><path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/></svg>'
      ],
      ['AD',
        '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmark-star-fill" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M2 15.5V2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.74.439L8 13.069l-5.26 2.87A.5.5 0 0 1 2 15.5M8.16 4.1a.178.178 0 0 0-.32 0l-.634 1.285a.178.178 0 0 1-.134.098l-1.42.206a.178.178 0 0 0-.098.303L6.58 6.993c.042.041.061.1.051.158L6.39 8.565a.178.178 0 0 0 .258.187l1.27-.668a.178.178 0 0 1 .165 0l1.27.668a.178.178 0 0 0 .257-.187L9.368 7.15a.178.178 0 0 1 .05-.158l1.028-1.001a.178.178 0 0 0-.098-.303l-1.42-.206a.178.178 0 0 1-.134-.098z"/></svg>'
      ],
      ['AE',
        '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trophy-fill" viewBox="0 0 16 16"><path d="M2.5.5A.5.5 0 0 1 3 0h10a.5.5 0 0 1 .5.5c0 .538-.012 1.05-.034 1.536a3 3 0 1 1-1.133 5.89c-.79 1.865-1.878 2.777-2.833 3.011v2.173l1.425.356c.194.048.377.135.537.255L13.3 15.1a.5.5 0 0 1-.3.9H3a.5.5 0 0 1-.3-.9l1.838-1.379c.16-.12.343-.207.537-.255L6.5 13.11v-2.173c-.955-.234-2.043-1.146-2.833-3.012a3 3 0 1 1-1.132-5.89A33.076 33.076 0 0 1 2.5.5m.099 2.54a2 2 0 0 0 .72 3.935c-.333-1.05-.588-2.346-.72-3.935zm10.083 3.935a2 2 0 0 0 .72-3.935c-.133 1.59-.388 2.885-.72 3.935"/></svg>'
      ],
      ['AF',
        '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16"><path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6"/></svg>'
      ],
      ['AG',
        '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16"><path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5"/></svg>'
      ],
      ['KA',
        '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314"/></svg>'
      ],
      ['KB',
        '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-ticket-fill" viewBox="0 0 16 16"><path d="M1.5 3A1.5 1.5 0 0 0 0 4.5V6a.5.5 0 0 0 .5.5 1.5 1.5 0 1 1 0 3 .5.5 0 0 0-.5.5v1.5A1.5 1.5 0 0 0 1.5 13h13a1.5 1.5 0 0 0 1.5-1.5V10a.5.5 0 0 0-.5-.5 1.5 1.5 0 0 1 0-3A.5.5 0 0 0 16 6V4.5A1.5 1.5 0 0 0 14.5 3z"/></svg>'
      ],
      ['KC',
        '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16"><path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/></svg>'
      ],
      ['KD',
        '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmark-star-fill" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M2 15.5V2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.74.439L8 13.069l-5.26 2.87A.5.5 0 0 1 2 15.5M8.16 4.1a.178.178 0 0 0-.32 0l-.634 1.285a.178.178 0 0 1-.134.098l-1.42.206a.178.178 0 0 0-.098.303L6.58 6.993c.042.041.061.1.051.158L6.39 8.565a.178.178 0 0 0 .258.187l1.27-.668a.178.178 0 0 1 .165 0l1.27.668a.178.178 0 0 0 .257-.187L9.368 7.15a.178.178 0 0 1 .05-.158l1.028-1.001a.178.178 0 0 0-.098-.303l-1.42-.206a.178.178 0 0 1-.134-.098z"/></svg>'
      ],
      ['KE',
        '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trophy-fill" viewBox="0 0 16 16"><path d="M2.5.5A.5.5 0 0 1 3 0h10a.5.5 0 0 1 .5.5c0 .538-.012 1.05-.034 1.536a3 3 0 1 1-1.133 5.89c-.79 1.865-1.878 2.777-2.833 3.011v2.173l1.425.356c.194.048.377.135.537.255L13.3 15.1a.5.5 0 0 1-.3.9H3a.5.5 0 0 1-.3-.9l1.838-1.379c.16-.12.343-.207.537-.255L6.5 13.11v-2.173c-.955-.234-2.043-1.146-2.833-3.012a3 3 0 1 1-1.132-5.89A33.076 33.076 0 0 1 2.5.5m.099 2.54a2 2 0 0 0 .72 3.935c-.333-1.05-.588-2.346-.72-3.935zm10.083 3.935a2 2 0 0 0 .72-3.935c-.133 1.59-.388 2.885-.72 3.935"/></svg>'
      ],
      ['KF',
        '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-map-fill" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M16 .5a.5.5 0 0 0-.598-.49L10.5.99 5.598.01a.5.5 0 0 0-.196 0l-5 1A.5.5 0 0 0 0 1.5v14a.5.5 0 0 0 .598.49l4.902-.98 4.902.98a.502.502 0 0 0 .196 0l5-1A.5.5 0 0 0 16 14.5zM5 14.09V1.11l.5-.1.5.1v12.98l-.402-.08a.498.498 0 0 0-.196 0zm5 .8V1.91l.402.08a.5.5 0 0 0 .196 0L11 1.91v12.98l-.5.1z"/></svg>'
      ],
      ['KG',
        '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill-gear" viewBox="0 0 16 16"><path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0m-9 8c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4m9.886-3.54c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382l.045-.148ZM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0"/></svg>'
      ],
    ]);

  $.ajax({
    url: '/registration/get-schedule-by-phase-code/' + code,
    method: 'get',
    dataType: 'json',
    success: function(data) {
      let isNotExpired = (isCurrentTimeInRange(data.time_start, data.time_end));
      let n = 0;
      let start = new Date(data.start);
      let end = new Date(data.end);

      bcTahap.text(data.phase);

      if (!isNotExpired) {
        alert.html(`<div class="alert alert-info p-1">
            <p class="mb-0 text-center">Pendaftaran hari ini telah ditutup.</p>
          </div>`);
      }

      if (data.sma.length) {
        tabList.append('<h4>SMA</h4>');
      }
      data.sma.forEach(sma => {
        let abb = 'sma' + sma.jalur.replace(/ +/g, "");

        var smaTab = generateTabListHtml(n == 0, abb, sma.code, sma.jalur);
        var tab = generateTabContentHtml(n == 0, abb, sma.jalur, sma.code, sma.info, start.getDate(), start.getMonth(), end.getDate(), end.getMonth(), end.getFullYear(), isNotExpired, code);

        tabList.append(smaTab);
        tabContent.append(tab);
        n++;
      });

      if (data.smk.length) {
        tabList.append('<h4 class="mt-2">SMK</h4>');
      }
      data.smk.forEach(smk => {
        let abb = 'smk' + smk.jalur.replace(/ +/g, "");

        var smkTab = generateTabListHtml(n == 0, abb, smk.code, smk.jalur);
        var tab = generateTabContentHtml(n == 0, abb, smk.jalur, smk.code, smk.info, start.getDate(), start.getMonth(), end.getDate(), end.getMonth(), end.getFullYear(), isNotExpired, code);

        tabList.append(smkTab);
        tabContent.append(tab);
        n++;
      });
    },
    error: function(xhr, status, error) {
      console.error('Gagal mengambil data:', status, error);
    }
  });

  function isCurrentTimeInRange(startTime, endTime) {
    var currentTime = new Date();
  
    var startHours = parseInt(startTime.split(":")[0]);
    var startMinutes = parseInt(startTime.split(":")[1]);
  
    var endHours = parseInt(endTime.split(":")[0]);
    var endMinutes = parseInt(endTime.split(":")[1]);
  
    var startDate = new Date();
    startDate.setHours(startHours, startMinutes);
  
    var endDate = new Date();
    endDate.setHours(endHours, endMinutes);
  
    return currentTime >= startDate && currentTime <= endDate;
  }  

  function generateTabListHtml(n, abb, code, track) {
    return `
    <li class="nav-item">
      <a class="nav-link ${n ? 'active' : ''}" id="${abb}" data-bs-toggle="pill" href="#reg${abb}" role="tab" aria-expanded="${n == 0 ? 'true' : 'false'}">
        ${icons.get(code)}
        <span class="fw-bold">${track}</span>
      </a>
    </li>`;
  }

  function generateTabContentHtml(n, abb, track, code, body, sdate, smonth, edate, emonth, eyear, isNotExpired, slug) {
    // slug = phase slug
    return `
    <div class="tab-pane ${n ? 'active' : ''}" id="reg${abb}" role="tabpanel" aria-labelledby="${abb}" aria-expanded="${n ? 'true' : ''}">
      <div class="card">
        <div class="card-body">
          <h3 class="mb-2">Apa itu Jalur ${track}?</h3>

          ${body}
        </div>
        <div class="card-footer border-top-0">
          <div class="d-flex align-items-center">
            <p class="text-warning mb-0 me-auto">Jadwal: ${sdate} ${months[smonth]} - ${edate} ${months[emonth]} ${eyear}</p>
            
            ${isNotExpired ? `<a href="/pendaftaran/jalur/${code}/${slug}" class="btn btn-success">Daftar jalur ini</a>` : `<button class="btn btn-outline-secondary disabled">Daftar jalur ini</button>`}
          </div>
        </div>
      </div>
    </div>`;
  }
});