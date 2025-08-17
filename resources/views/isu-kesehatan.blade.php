@extends('layouts.app')

@section('title', 'Isu Kesehatan')

@section('content')
<div class="container py-5">
    <h1 class="text-center mb-4">Isu Kesehatan Terkini</h1>

    <div class="row align-items-center mb-5">
        <div class="col-md-6">
            <img src="{{ asset('assets/stunt.png') }}" alt="Ilustrasi Stunting" class="img-fluid rounded shadow">
        </div>
        <div class="col-md-6">
            <h3>Apa Itu Stunting?</h3>
            <p>
                Stunting adalah kondisi gagal tumbuh pada anak balita akibat kekurangan gizi kronis terutama dalam 1000 hari pertama kehidupan. 
                Anak yang mengalami stunting memiliki tinggi badan lebih pendek dari standar usianya, serta berisiko mengalami hambatan perkembangan kognitif.
            </p>
            <a href="{{ url('/stunting') }}" class="btn btn-primary mt-2">Pelajari Selengkapnya</a>
        </div>
    </div>

    <div class="row mt-5">
        <h4 class="mb-4">Berita & Kampanye Terkait</h4>

        @foreach (\App\Models\Berita::get() as $item)
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">
                <img src="/storage/{{ $item->gambar }}" class="card-img-top" alt="Isu Kesehatan Anak">
                <div class="card-body">
                    <h5 class="card-title">{{ $item->judul }}</h5>
                    <p class="card-text">{!! Str::limit(strip_tags($item->isi), 100) !!}</p>
</p>
                    <a href="/berita/{{ $item->slug }}" class="btn btn-outline-primary">Baca</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
