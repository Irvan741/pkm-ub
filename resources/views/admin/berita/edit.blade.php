
@extends('admin.layout')

@section('title', 'Edit Berita')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Edit Berita</h2>
    <form action="{{ route('admin.berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" name="judul" class="form-control" id="judul" value="{{ old('judul', $berita->judul) }}" required>
        </div>

        <div class="mb-3">
            <label for="isi" class="form-label">Konten</label>
            <textarea name="isi" id="isi" class="form-control summernote" rows="6" required>{{ old('isi', $berita->isi) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Gambar</label><br>
            @if ($berita->image_path)
                <img src="{{ asset('storage/' . $berita->image_path) }}" alt="Gambar Berita" class="img-thumbnail mb-2" width="200">
            @endif
            <input class="form-control" type="file" name="image" id="image">
        </div>

        <input type="hidden" name="status" value="draft">

        <div class="mb-3 form-check form-switch">
            <input class="form-check-input" type="checkbox" id="status" name="status" value="publish" {{ old('status') === 'publish' ? 'checked' : '' }}>
            <label class="form-check-label" for="status">Terbitkan sekarang</label>
        </div>

        <button type="submit" class="btn btn-primary">Perbarui</button>
        <a href="{{ route('admin.berita.index') }}" class="btn btn-secondary">Batal</a>
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