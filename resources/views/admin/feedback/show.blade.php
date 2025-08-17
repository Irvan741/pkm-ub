@extends('admin.layout')

@section('content')
<div class="container mt-4">
    <h3 class="mb-4">Detail Feedback</h3>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $feedback->nama_lengkap }}</h5>
            <h6 class="card-subtitle mb-2 text-muted">
                Alamat: {{ $feedback->alamat }} <br>
                Jenis Layanan: {{ $feedback->jenis_layanan }} <br>
                Tanggal Pelayanan: {{ \Carbon\Carbon::parse($feedback->tanggal_pelayanan)->format('d M Y') }} <br>
                Dikirim pada: {{ $feedback->created_at->addHours(8)->format('d M Y H:i') }}

            </h6>

            <hr>

            <p><strong>Penilaian:</strong> {{ $feedback->penilaian }}</p>
            <p><strong>Bagian yang Perlu Diperbaiki:</strong> {{ $feedback->perlu_diperbaiki }}</p>
            <p><strong>Saran:</strong> {{ $feedback->saran }}</p>
            <p><strong>Bersedia Dihubungi:</strong> {{ $feedback->bersedia_dihubungi ? 'Ya' : 'Tidak' }}</p>
            @if ($feedback->bersedia_dihubungi)
                <p><strong>Kontak:</strong> {{ $feedback->kontak }}</p>
            @endif
        </div>
    </div>

    <a href="{{ route('admin.feedback.index') }}" class="btn btn-secondary mt-3">← Kembali</a>
</div>
@endsection
