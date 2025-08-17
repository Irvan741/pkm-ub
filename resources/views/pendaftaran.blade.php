<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Pendaftaran Pasien - Puskesmas Ujoh Bilang</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
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

    .hero {
      background: linear-gradient(120deg, var(--green-primary), var(--green-accent));
      color: white;
      padding: 4rem 1rem 2rem 1rem;
      text-align: center;
      border-bottom-left-radius: 2rem;
      border-bottom-right-radius: 2rem;
    }

    .hero img {
      max-width: 120px;
      margin-bottom: 1rem;
    }

    .section-title {
      font-weight: 600;
      color: var(--green-primary);
    }

    .form-card {
      background: white;
      border-radius: 1rem;
      padding: 2rem;
      box-shadow: 0 4px 14px rgba(0, 0, 0, 0.06);
    }

    footer {
      background-color: var(--green-primary);
      color: white;
      padding: 1rem;
      margin-top: 4rem;
      border-top-left-radius: 1rem;
      border-top-right-radius: 1rem;
    }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg bg-white border-bottom">
    <div class="container">
      <a class="navbar-brand fw-semibold text-success" href="#">Puskesmas Ujoh Bilang</a>
      <div class="ms-auto">
        <a href="#" class="btn btn-outline-success">Login</a>
      </div>
    </div>
  </nav>

  <div class="hero">
    <img src="logo.png" alt="Logo Puskesmas" />
    <h1 class="display-5 fw-bold">Pendaftaran Pasien Baru</h1>
    <p class="lead">Isi formulir di bawah ini untuk mendaftar pelayanan kesehatan</p>
  </div>

  <div class="container my-5">
    <div class="row justify-content-center">
      <div class="col-lg-6">
        <div class="form-card">
          <form action="proses_daftar.php" method="POST">
            <div class="mb-3">
              <label class="form-label">Nama Lengkap</label>
              <input type="text" name="nama" class="form-control" required>
            </div>

            <div class="mb-3">
              <label class="form-label">NIK</label>
              <input type="text" name="nik" class="form-control" required>
            </div>

            <div class="mb-3">
              <label class="form-label">Tanggal Lahir</label>
              <input type="date" name="tanggal_lahir" class="form-control" required>
            </div>

            <div class="mb-3">
              <label class="form-label">Alamat</label>
              <textarea name="alamat" class="form-control" rows="3" required></textarea>
            </div>

            <div class="mb-3">
              <label class="form-label">No. HP</label>
              <input type="text" name="no_hp" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-success w-100">Daftar</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <footer class="text-center">
    &copy; 2025 Puskesmas Ujoh Bilang • KKN 51
  </footer>
</body>
</html>
