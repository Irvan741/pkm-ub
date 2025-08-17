@extends('admin.layout')

@section('title', 'Tambah Berita')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Tambah Berita/Artikel</h2>
        <a href="{{ route('admin.berita.index') }}" class="btn btn-secondary">Kembali</a>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data" class="card shadow-sm p-4 rounded-4 border-0">
        @csrf
        <div class="mb-3">
            <label for="judul" class="form-label">Judul Berita</label>
            <input type="text" class="form-control" name="judul" id="judul" required value="{{ old('judul') }}">
        </div>

        <div class="mb-3">
            <label for="isi" class="form-label">Konten</label>
            <textarea class="form-control summernote" name="isi" id="isi" rows="8">{{ old('isi') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar</label>
            <input type="file" class="form-control" name="gambar" id="gambar" required>
        </div>

        <input type="hidden" name="status" value="draft">

        <div class="mb-3 form-check form-switch">
            <input class="form-check-input" type="checkbox" id="status" name="status" value="publish" {{ old('status') === 'publish' ? 'checked' : '' }}>
            <label class="form-check-label" for="status">Terbitkan sekarang</label>
        </div>

        



        <button type="submit" class="btn btn-primary px-4">Simpan</button>
    </form>
</div>
@endsection

@push('scripts')
<!-- jQuery (wajib sebelum Bootstrap JS dan Summernote) -->
<!-- ✅ Aman dan praktis (tanpa integrity): -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Summernote -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote.min.js"></script>

<script>
   $('.summernote').summernote({
        height: 300,
        toolbar: [
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['fontsize', 'color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['insert', ['link']], // Hilangkan 'picture' dan 'video'
            ['view', ['fullscreen', 'codeview']]
        ],
        disableDragAndDrop: true, // Opsional: hilangkan drag gambar
    });
</script>
@endpush