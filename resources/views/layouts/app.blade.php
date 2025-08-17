<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Informasi Stunting - Desa Ujoh Bilang' }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/admin/style.css">
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg bg-white border-bottom" data-aos="fade-down">
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

    <main class="py-4">
        <div class="container">
            @yield('content')
        </div>
    </main>

    <footer class="bg-white text-center py-3 mt-5 shadow-sm">
        <div class="container">
            <small>&copy; {{ date('Y') }} Desa Ujoh Bilang. Semua hak dilindungi.</small>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/admin/script.js"></script>
    @stack('scripts')
</body>
</html>
