@extends('admin.layout')

@section('title', 'Admin Dashboard')

@section('content')
    <div class="container-fluid">
        <h1 class="h2 text-start">Dashboard</h1>
        <p class="text-start">Selamat datang di halaman admin.</p>

        <div class="row">
            <div class="col-md-4">
                <a href="/admin/berita" class="card text-bg-success mb-3 text-decoration-none">
                    <div class="card-body">
                        <h5 class="card-title">Total Berita/Artikel</h5>
                        <p class="card-text fs-4 fw-semibold">
                            {{ $totalBerita ?? 0 }}
                        </p>
                    </div>
                </a>
            </div>

            <div class="col-md-4">
                <a href="/admin/berita" class="card text-bg-success mb-3 text-decoration-none">
                    <div class="card-body">
                        <h5 class="card-title">Jumlah Kartu Keluarga</h5>
                        <p class="card-text fs-4 fw-semibold">
                            {{ $totalKK ?? 0 }}
                        </p>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="/admin/user-role" class="card text-bg-warning mb-3 text-decoration-none">
                    <div class="card-body">
                        <h5 class="card-title">Total Pengguna</h5>
                        <p class="card-text fs-4">{{ $totalAkun ?? 0 }}</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection
