<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profil - Puskesmas Ujoh Bilang</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- AOS CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">

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
      margin-bottom: 1rem;
      text-align: center;
    }
    .hero {
      background: linear-gradient(120deg, var(--green-primary), var(--green-accent));
      color: white;
      padding: 4rem 1rem;
      text-align: center;
      border-bottom-left-radius: 2rem;
      border-bottom-right-radius: 2rem;
    }
    footer {
      background-color: var(--green-primary);
      color: white;
      padding: 1rem;
      margin-top: 4rem;
      border-top-left-radius: 1rem;
      border-top-right-radius: 1rem;
      text-align: center;
    }
  </style>
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg bg-white border-bottom shadow-sm">
    <div class="container">
      <a class="navbar-brand fw-semibold text-success d-flex align-items-center" href="{{ url('/') }}">
        <img src="{{ asset('kabupaten.png') }}" alt="Logo Kabupaten" height="36" class="me-2">
        <img src="{{ asset('puskesmas.png') }}" alt="Logo Puskesmas" height="36" class="me-2">
        <span class="fs-6">Puskesmas Ujoh Bilang</span>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a href="{{ url('/profile') }}" class="nav-link active">Profil</a></li>
          <li class="nav-item"><a href="{{ url('/agenda') }}" class="nav-link">Agenda</a></li>
          <li class="nav-item"><a href="{{ url('/isu-kesehatan') }}" class="nav-link">Informasi & Berita</a></li>
          <li class="nav-item"><a href="{{ url('/survey') }}" class="nav-link">Survey Kepuasan</a></li>

          <li class="nav-item"><a href="{{ url('/kontak-kami') }}" class="nav-link">Kontak Kami</a></li>
        </ul>
        <div class="ms-lg-3 mt-2 mt-lg-0">
          <a href="{{ route('login') }}" class="btn btn-outline-success">Login</a>
        </div>
      </div>
    </div>
  </nav>

  <!-- Hero -->
  <div class="hero" data-aos="fade-up" data-aos-duration="1000">
    <h1 class="fw-bold">Profil Puskesmas Ujoh Bilang</h1>
    <p>Mengenal lebih dekat tentang visi, misi, dan layanan Puskesmas.</p>
  </div>

  <div class="container my-5">

    <!-- Sambutan -->
    <section class="mb-5" data-aos="fade-up" data-aos-duration="1000">
      <h2 class="section-title text-center">Sambutan Kepala Puskesmas</h2>
      <div class="card shadow-sm border-0 p-4 text-center">
        @if($kepala)
          <img src="{{ $kepala->image_path ?  '/'.$kepala->image_path : 'https://via.placeholder.com/150' }}" 
              alt="Kepala Puskesmas" 
              class="rounded-circle mx-auto mb-3" 
              width="150" height="150">

          <p class="mb-3">{!!$kepala->sambutan !!}</p>

          <p class="fw-semibold mt-3 mb-0">Hormat Kami,</p>
          <p class="mb-0">{{ $kepala->name }}</p>
          <p class="text-muted">Kepala Puskesmas Ujoh Bilang</p>
        @else
          <p>Data Kepala Puskesmas belum tersedia.</p>
        @endif
      </div>
    </section>

    <!-- Tupoksi -->
    <section class="mb-5" data-aos="fade-right" data-aos-duration="1000">
      <h2 class="section-title">Tugas Pokok & Fungsi (Tupoksi)</h2>
      <div class="card shadow-sm border-0 p-4">
        @if($profile)
          {!! $profile->tupoksi !!}
        @else
          <p>Data Tupoksi belum tersedia.</p>
        @endif
      </div>
    </section>

    <!-- Visi & Misi -->
    <section class="mb-5" data-aos="fade-left" data-aos-duration="1000">
      <h2 class="section-title">Visi & Misi</h2>
      <div class="row g-4">
        <div class="col-md-6" data-aos="zoom-in" data-aos-delay="200">
          <div class="card shadow-sm border-0 p-4 h-100">
            <h5 class="fw-bold">Visi</h5>
            <p>{!! $profile ? $profile->visi : 'Belum ada data visi.' !!}</p>
          </div>
        </div>
        <div class="col-md-6" data-aos="zoom-in" data-aos-delay="400">
          <div class="card shadow-sm border-0 p-4 h-100">
            <h5 class="fw-bold">Misi</h5>
            @if($profile)
              {!! $profile->misi !!}
            @else
              <p>Belum ada data misi.</p>
            @endif
          </div>
        </div>
      </div>
    </section>

    <!-- Personil -->
    <section class="mb-5">
      <h2 class="section-title text-center">Personil Puskesmas</h2>
      <div class="row g-4 justify-content-center">
        @forelse($personil as $p)
          <div class="col-md-3 col-sm-6" data-aos="flip-left" data-aos-duration="1000">
            <div class="card shadow-sm border-0 h-100 text-center p-3">
              <img src="{{ $p->image_path ? '/'.$p->image_path : 'https://via.placeholder.com/100' }}" 
                   class="rounded-circle mx-auto mb-3" 
                   alt="{{ $p->name }}" 
                   width="100" height="100">
              <h6 class="fw-bold mb-1">{{ $p->name }}</h6>
              <p class="text-muted mb-0">{{ $p->jabatan }}</p>
            </div>
          </div>
        @empty
          <p class="text-center">Belum ada data personil.</p>
        @endforelse
      </div>
    </section>
  </div>

  <footer>
    &copy; {{ date('Y') }} Puskesmas Ujoh Bilang
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- AOS JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
  <script>
    AOS.init();
  </script>
</body>
</html>
