@extends('layouts.app')

@section('title', $berita->judul)

@section('content')
<div class="container py-5">
    <div class="mb-4">
        <a href="{{ url('/isu-kesehatan') }}" class="btn btn-secondary">&larr; Kembali ke Isu Kesehatan</a>
    </div>

    <div class="row">
        <div class="col-lg-8 mx-auto">
            <h1 class="mb-3">{{ $berita->judul }}</h1>
            @if ($berita->gambar)
                <img src="{{ asset('storage/' . $berita->gambar) }}" class="img-fluid rounded shadow-sm mb-4" alt="{{ $berita->judul }}">
            @endif

            <div class="text-muted mb-3">
                <small>Dipublikasikan oleh <strong>{{ $berita->user->name ?? 'Admin' }}</strong> pada {{ $berita->created_at->format('d M Y') }}</small>
            </div>

            <div class="content" style="line-height: 1.7;">
                {!! $berita->isi !!}
            </div>
        </div>
    </div>
</div>
@endsection
