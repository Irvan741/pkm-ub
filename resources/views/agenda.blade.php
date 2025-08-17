<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Jadwal Kegiatan - Puskesmas Ujoh Bilang</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- FullCalendar CSS -->
  <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/main.min.css" rel="stylesheet">

  <style>
    :root {
      --green-primary: #256D4A;
      --green-accent: #B3D6C6;
      --red-accent: #A53030;
      --cream: #F8F5F1;
      --dark: #1C1C1C;
    }

    body {
      background-color: var(--cream);
      font-family: 'Segoe UI', sans-serif;
      color: var(--dark);
    }

    .section-title {
      font-weight: 600;
      color: var(--green-primary);
    }

    #calendar {
      background: #fff;
      border-radius: 1rem;
      padding: 1rem;
      box-shadow: 0 4px 14px rgba(0,0,0,0.1);
    }
  </style>
</head>
<body>

  <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-white border-bottom">
      <div class="container">
        <!-- Brand -->
        <a class="navbar-brand fw-semibold text-success d-flex align-items-center" href="{{ url('/') }}">
          <img src="{{ asset('kabupaten.png') }}" alt="Logo Kabupaten" height="40" class="me-1">
          <img src="{{ asset('puskesmas.png') }}" alt="Logo Puskesmas" height="40" class="me-1">
          <span class="ms-2 fs-6">Puskesmas Ujoh Bilang</span>
        </a>


        <!-- Toggle button (mobile) -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar Links -->
        <div class="collapse navbar-collapse" id="navbarContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/profile') }}">Profile</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/agenda') }}">Agenda</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/isu-kesehatan') }}">Informasi & Berita</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/survey-kepuasan') }}">Survey</a>
            </li>
          </ul>
          <div class="ms-lg-3">
            <a href="{{ route('login') }}" class="btn btn-outline-success">Login</a>
          </div>
        </div>
      </div>
    </nav>

  <!-- Main Content -->
  <div class="container my-5">
    <h2 class="text-center section-title mb-4">Jadwal Kegiatan</h2>
    <div id="calendar"></div>
  </div>

  <!-- Modal Detail Kegiatan -->
  <div class="modal fade" id="eventModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header bg-success text-white">
          <h5 class="modal-title" id="eventTitle"></h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <p><strong>Tanggal:</strong> <span id="eventDate"></span></p>
          <p><strong>Lokasi:</strong> <span id="eventLocation"></span></p>
          <p><strong>Deskripsi:</strong></p>
          <p id="eventDescription"></p>
        </div>
      </div>
    </div>
  </div>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      let calendarEl = document.getElementById('calendar');

      // ambil data dari controller
      let agendas = @json($agendas);

      // mapping biar sesuai FullCalendar
      let events = agendas.map(item => ({
        title: item.title,
        start: item.start_date,
        end: item.end_date,
        extendedProps: {
          description: item.description,
          location: item.location
        }
      }));

      let calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        locale: 'id',
        events: events,
        eventClick: function(info) {
          document.getElementById('eventTitle').innerText = info.event.title;

          let start = new Date(info.event.start).toLocaleString('id-ID');
          let end = info.event.end ? new Date(info.event.end).toLocaleString('id-ID') : '';
          document.getElementById('eventDate').innerText = end ? `${start} - ${end}` : start;

          document.getElementById('eventLocation').innerText = info.event.extendedProps.location;
          document.getElementById('eventDescription').innerText = info.event.extendedProps.description;
          new bootstrap.Modal(document.getElementById('eventModal')).show();
        }
      });

      calendar.render();
    });
  </script>
</body>
</html>
