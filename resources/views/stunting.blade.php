@extends('layouts.app')

@section('content')
<div class="container py-4">

    {{-- Logo Desa --}}
    <div class="text-center mb-4">
        <img src="{{ asset('/logo.png') }}" alt="Logo Desa Ujoh Bilang" class="img-fluid" style="max-height: 120px;">
        <h2 class="mt-2">Informasi Stunting</h2>
        <p class="text-muted">Desa Ujoh Bilang</p>
    </div>

    {{-- Gambar Ilustrasi --}}
    <div class="text-center mb-4">
        <img src="/assets/stunt.png" alt="Ilustrasi Stunting" class="img-fluid rounded shadow">
    </div>

    {{-- Konten Informasi --}}
    <div class="card shadow-sm border-0">
        <div class="card-body">
            <h5 class="card-title">Apa itu Stunting?</h5>
            <p class="card-text">
                Stunting adalah kondisi gagal tumbuh pada anak balita akibat kekurangan gizi kronis, terutama dalam 1000 hari pertama kehidupan (HPK). Anak yang mengalami stunting memiliki tinggi badan yang lebih rendah dibandingkan anak seusianya dan dapat berdampak pada perkembangan otak serta produktivitas di masa depan.
            </p>

            <h5 class="card-title mt-4">Penyebab Stunting</h5>
            <ul>
                <li>Kekurangan asupan gizi pada ibu hamil dan anak</li>
                <li>Kurangnya akses terhadap sanitasi dan air bersih</li>
                <li>Pola asuh yang kurang tepat</li>
                <li>Kurangnya pengetahuan tentang gizi</li>
            </ul>

            <h5 class="card-title mt-4">Pencegahan Stunting</h5>
            <ul>
                <li>Pemenuhan gizi ibu hamil dan anak</li>
                <li>Imunisasi dan pemeriksaan kesehatan rutin</li>
                <li>Sanitasi lingkungan yang bersih</li>
                <li>Pemberian ASI eksklusif dan MPASI bergizi</li>
            </ul>

            <div class="alert alert-info mt-4" role="alert">
                Mari bersama cegah stunting demi masa depan anak-anak Desa Ujoh Bilang yang lebih sehat dan cerdas!
            </div>
        </div>
    </div>

</div>
@endsection
