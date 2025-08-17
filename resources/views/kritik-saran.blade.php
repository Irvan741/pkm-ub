@extends('layouts.app')

@section('title', 'Kritik & Saran')

@section('content')
<style>
    .form-section {
        background-color: #fff;
        border-radius: 1rem;
        padding: 2rem;
        box-shadow: 0 4px 16px rgba(0,0,0,0.05);
    }

    .form-label {
        font-weight: 500;
        color: #256D4A; /* green-primary */
    }

    .btn-primary {
        background-color: #256D4A;
        border: none;
    }

    .btn-primary:hover {
        background-color: #1d5237;
    }

    .btn-outline-secondary {
        border-color: #ccc;
        color: #333;
    }

    @media (max-width: 576px) {
        .form-section {
            padding: 1.25rem;
        }
    }
</style>

<div class="container my-4">
    <a href="{{ url('/') }}" class="btn btn-outline-secondary mb-3">
        &larr; Kembali ke Beranda
    </a>

    <div class="form-section">
        <h2 class="mb-4">Formulir Kritik & Saran</h2>
        <form action="{{ route('kritik-saran.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control rounded" required>
            </div>

            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea name="alamat" id="alamat" class="form-control rounded" rows="2" required></textarea>
            </div>

            <div class="mb-3">
                <label for="jenis_layanan" class="form-label">Jenis Layanan yang Diterima</label>
                <input type="text" name="jenis_layanan" id="jenis_layanan" class="form-control rounded" required>
            </div>

            <div class="mb-3">
                <label for="tanggal_pelayanan" class="form-label">Tanggal Pelayanan</label>
                <input type="date" name="tanggal_pelayanan" id="tanggal_pelayanan" class="form-control rounded" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Penilaian Anda terhadap pelayanan kami? (Skala 1–5)</label>
                <select name="penilaian" class="form-select rounded" required>
                    <option value="">Pilih Skor</option>
                    @for($i=1; $i<=5; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </div>

            <div class="mb-3">
                <label for="perlu_diperbaiki" class="form-label">Apa yang menurut Anda perlu diperbaiki?</label>
                <textarea name="perlu_diperbaiki" id="perlu_diperbaiki" class="form-control rounded" rows="2" required></textarea>
            </div>

            <div class="mb-3">
                <label for="saran" class="form-label">Saran atau harapan untuk Desa ke depannya</label>
                <textarea name="saran" id="saran" class="form-control rounded" rows="2" required></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Apakah Anda bersedia dihubungi kembali jika diperlukan?</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="bersedia_dihubungi" id="yes" value="1" required>
                    <label class="form-check-label" for="yes">Ya</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="bersedia_dihubungi" id="no" value="0" required>
                    <label class="form-check-label" for="no">Tidak</label>
                </div>
            </div>

            <div class="mb-3">
                <label for="kontak" class="form-label">Kontak (Opsional)</label>
                <input type="text" name="kontak" id="kontak" class="form-control rounded">
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-primary btn-lg">Kirim</button>
            </div>
        </form>
    </div>
</div>
@endsection
