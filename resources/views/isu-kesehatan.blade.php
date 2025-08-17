@extends('layouts.app')

@section('title', 'Isu Kesehatan')

@section('content')
<div class="container py-5">

    <h1 class="text-center mb-4" data-aos="fade-down">Isu Kesehatan Terkini</h1>

    <div class="row align-items-center mb-5">
        <div class="col-md-6" data-aos="zoom-in">
            <img src="{{ asset('assets/stunt.png') }}" alt="Ilustrasi Stunting" class="img-fluid rounded shadow">
        </div>
        <div class="col-md-6" data-aos="fade-left" data-aos-delay="200">
            <h3>Apa Itu Stunting?</h3>
            <p>
                Stunting adalah kondisi gagal tumbuh pada anak balita akibat kekurangan gizi kronis terutama dalam 1000 hari pertama kehidupan. 
                Anak yang mengalami stunting memiliki tinggi badan lebih pendek dari standar usianya, serta berisiko mengalami hambatan perkembangan kognitif.
            </p>
            <a href="{{ url('/stunting') }}" class="btn btn-primary mt-2">Pelajari Selengkapnya</a>
        </div>
    </div>

    <div class="row mt-5">
        <h4 class="mb-4" data-aos="fade-up">Berita & Kampanye Terkait</h4>

        @foreach (\App\Models\Berita::get() as $index => $item)
        <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
            <div class="card h-100 shadow-sm">
                <img src="/storage/{{ $item->gambar }}" class="card-img-top" alt="Isu Kesehatan Anak">
                <div class="card-body">
                    <h5 class="card-title">{{ $item->judul }}</h5>
                    <p class="card-text">{!! Str::limit(strip_tags($item->isi), 100) !!}</p>
                    <a href="/berita/{{ $item->slug }}" class="btn btn-outline-primary">Baca</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

{{-- Aktifkan AOS --}}
@push('scripts')
<link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script>
  AOS.init({
    once: true,
    duration: 800,
    easing: 'ease-in-out'
  });
</script>
@endpush
@endsection
