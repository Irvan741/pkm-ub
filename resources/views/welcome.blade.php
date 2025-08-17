<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Puskesmas Ujoh Bilang</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- AOS CSS -->
  <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

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

    .navbar-brand {
      display: flex;
      align-items: center;
      gap: 0.5rem;
    }

    .navbar-brand img {
      height: 40px;
      width: auto;
    }

    .carousel-item img {
      height: 500px;
      object-fit: cover;
    }

    .section-title {
      font-weight: 600;
      color: var(--green-primary);
    }

    .nav-card {
      background: white;
      border-radius: 1rem;
      border: none;
      padding: 2rem;
      height: 100%;
      transition: all 0.3s ease;
      box-shadow: 0 4px 14px rgba(0, 0, 0, 0.06);
    }

    .nav-card:hover {
      transform: translateY(-6px);
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
    }

    .nav-card h5 {
      color: var(--red-accent);
      font-weight: 600;
      margin-bottom: 0.75rem;
    }

    footer {
      background-color: var(--green-primary);
      color: white;
      padding: 1rem;
      border-top-left-radius: 1rem;
      border-top-right-radius: 1rem;
    }

    a.text-decoration-none:hover {
      text-decoration: none;
    }

    .akses-cepat-section {
      position: relative;
      background: url("/batik.png") repeat;
      background-size: cover;
    }

    .akses-cepat-section::before {
      content: "";
      position: absolute;
      inset: 0;
      background: rgba(179, 214, 198, 0.85); /* green-accent transparan */
      z-index: 0;
    }

    .akses-cepat-section .container {
      position: relative;
      z-index: 1; /* biar konten di atas overlay */
    }

  </style>
</head>
<body>
    <!-- Navbar -->
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


    <!-- Hero Carousel -->
    <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active" data-aos="fade-up">
          <img src="{{ asset('hero1.jpg') }}" class="d-block w-100" alt="Slide 1">
          <div class="carousel-caption d-none d-md-block">
            <h2 class="fw-bold">Selamat Datang di Website Resmi Puskesmas Ujoh Bilang</h2>
            <p>Menyediakan layanan kesehatan, informasi, dan edukasi untuk masyarakat.</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Akses Cepat -->
  {{-- <!-- Wave Atas -->
    <div class="wave-top">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#B3D6C6" fill-opacity="1" d="M0,192L40,202.7C80,213,160,235,240,218.7C320,203,400,149,480,160C560,171,640,245,720,245.3C800,245,880,171,960,160C1040,149,1120,203,1200,224C1280,245,1360,235,1400,229.3L1440,224L1440,0L0,0Z"></path>
      </svg>
    </div> --}}

    <!-- Section Akses Cepat -->
    <div class="akses-cepat-section">
      <div class="container py-5">
        <h2 class="text-center section-title mb-4" data-aos="fade-up">Akses Cepat</h2>
        <div class="row g-4 justify-content-center">

          <div class="col-md-4" data-aos="flip-left" data-aos-delay="100">
            <a href="{{ url('/stunting') }}" class="text-decoration-none">
              <div class="nav-card text-center">
                <h5>Informasi Stunting</h5>
                <p>Pahami pencegahan stunting untuk tumbuh kembang anak yang sehat.</p>
              </div>
            </a>
          </div>

          <div class="col-md-4" data-aos="flip-left" data-aos-delay="200">
            <a href="{{ url('/isu-kesehatan') }}" class="text-decoration-none">
              <div class="nav-card text-center">
                <h5>Isu Kesehatan Lainnya</h5>
                <p>Update isu kesehatan terbaru untuk warga Desa Ujoh Bilang.</p>
              </div>
            </a>
          </div>

          <div class="col-md-4" data-aos="flip-left" data-aos-delay="300">
            <a href="{{ url('/kritik-saran') }}" class="text-decoration-none">
              <div class="nav-card text-center">
                <h5>Kritik & Saran</h5>
                <p>Silahkan Masukkan Kritik dan Saran anda atas layanan Kami.</p>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>

    <!-- Wave Bawah -->
    {{-- <div class="wave-bottom">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#B3D6C6" fill-opacity="1" d="M0,64L48,74.7C96,85,192,107,288,138.7C384,171,480,213,576,202.7C672,192,768,128,864,112C960,96,1056,128,1152,160C1248,192,1344,224,1392,240L1440,256L1440,320L0,320Z"></path>
      </svg>
    </div> --}}




  <footer class="text-center" data-aos="fade-up">
    &copy; {{ date('Y') }} Puskesmas Ujoh Bilang • KKN 51
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- AOS JS -->
  <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
  <script>
    AOS.init({
      duration: 1000, // durasi animasi (ms)
      once: true,     // animasi hanya jalan sekali
    });
  </script>
</body>
</html>
