@extends('admin.layout')

@section('title', 'Kelola Profil Puskesmas')

@section('content')
@php
    use Illuminate\Support\Facades\Storage;
@endphp

<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">Kelola Profil Puskesmas</h2>
        <a href="{{ route('admin.index') }}" class="btn btn-secondary btn-sm">Kembali</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- ====== KEPALA PUSKESMAS ====== --}}
    <div class="card shadow-sm border-0 rounded-4 mb-4">
        <div class="card-body">
            <h5 class="card-title mb-3">Sambutan & Kepala Puskesmas</h5>
            <form action="{{ route('admin.profile.kepala.storeOrUpdate') }}" method="POST" enctype="multipart/form-data" class="row g-3">
                @csrf
                <div class="col-md-3 text-center">
                    <div class="border rounded-4 p-2">
                        <img
                            src="{{ $kepala ?  '/'.$kepala->image_path :'' }}"
                            alt="Foto Kepala Puskesmas"
                            class="img-fluid rounded-4"
                            style="max-height: 240px; object-fit: cover;"
                        >

                    </div>
                    <label class="form-label mt-3">Ubah Foto (opsional)</label>
                    <input type="file" name="image_path" class="form-control @error('image_path') is-invalid @enderror" accept="image/*">
                    @error('image_path') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-9">
                    <div class="mb-3">
                        <label class="form-label">Nama Kepala Puskesmas</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                               value="{{ old('name', $kepala->name ?? '') }}" required>
                        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div>
                        <label class="form-label">Sambutan</label>
                        <textarea name="sambutan" rows="6" class="form-control summernote @error('sambutan') is-invalid @enderror" required>{{ old('sambutan', $kepala->sambutan ?? '') }}</textarea>
                        @error('sambutan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="text-end mt-3">
                        <button type="submit" class="btn btn-success">Simpan Sambutan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- ====== PROFIL (TUPOKSI / VISI / MISI) ====== --}}
    <div class="card shadow-sm border-0 rounded-4 mb-4">
        <div class="card-body">
            <h5 class="card-title mb-3">Profil Puskesmas (Tupoksi, Visi & Misi)</h5>
            <form action="{{ route('admin.profile.profile.storeOrUpdate') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Tugas Pokok & Fungsi (Tupoksi)</label>
                    <textarea name="tupoksi" rows="5" class="form-control summernote @error('tupoksi') is-invalid @enderror" required>{{ old('tupoksi', $profile->tupoksi ?? '') }}</textarea>
                    @error('tupoksi') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Visi</label>
                    <textarea name="visi" rows="3" class="form-control summernote @error('visi') is-invalid @enderror" required>{{ old('visi', $profile->visi ?? '') }}</textarea>
                    @error('visi') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Misi</label>
                    <textarea name="misi" rows="5" class="form-control summernote @error('misi') is-invalid @enderror" required>{{ old('misi', $profile->misi ?? '') }}</textarea>
                    @error('misi') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-success">Simpan Profil</button>
                </div>
            </form>
        </div>
    </div>

    {{-- ====== PERSONIL (LIST + TAMBAH + EDIT/HAPUS) ====== --}}
    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="card-title mb-0">Personil Puskesmas</h5>
                <button class="btn btn-primary btn-sm" data-bs-toggle="collapse" data-bs-target="#formTambahPersonil">
                    + Tambah Personil
                </button>
            </div>

            {{-- Form Tambah --}}
            <div id="formTambahPersonil" class="collapse mb-4">
                <form action="{{ route('admin.profile.personil.store') }}" method="POST" enctype="multipart/form-data" class="row g-3">
                    @csrf
                    <div class="col-md-4">
                        <label class="form-label">Foto (opsional)</label>
                        <input type="file" name="image_path" accept="image/*" class="form-control @error('image_path') is-invalid @enderror">
                        @error('image_path') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Nama</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" required>
                        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Jabatan</label>
                        <input type="text" name="jabatan" class="form-control @error('jabatan') is-invalid @enderror" required>
                        @error('jabatan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-12 text-end">
                        <button class="btn btn-success">Simpan Personil</button>
                    </div>
                </form>
            </div>

            {{-- Tabel Personil --}}
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th style="width: 60px;">Foto</th>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th style="width: 160px;" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($personil as $p)
                            <tr>
                                <td class="text-center">
                                    <img
                                        src="{{ $p->image_path ? '/'.$p->image_path : 'https://via.placeholder.com/56?text=PIC' }}"
                                        alt="Foto {{ $p->name }}"
                                        class="rounded"
                                        style="width:56px; height:56px; object-fit:cover;"
                                    >
                                </td>
                                <td>{{ $p->name }}</td>
                                <td>{{ $p->jabatan }}</td>
                                <td class="text-center">
                                    <button
                                        class="btn btn-warning btn-sm"
                                        data-bs-toggle="modal"
                                        data-bs-target="#modalEditPersonil{{ $p->id }}">
                                        Edit
                                    </button>
                                    <form action="{{ route('admin.profile.personil.destroy', $p->id) }}"
                                          method="POST" class="d-inline"
                                          onsubmit="return confirm('Hapus personil ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>

                            {{-- Modal Edit Personil --}}
                            <div class="modal fade" id="modalEditPersonil{{ $p->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content border-0 rounded-4">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit Personil</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <form action="{{ route('admin.profile.personil.update', $p->id) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                <div class="mb-3 text-center">
                                                    <img
                                                        src="{{ $p->image_path ? Storage::url($p->image_path) : 'https://via.placeholder.com/160x160?text=PIC' }}"
                                                        class="rounded-4"
                                                        style="width:160px; height:160px; object-fit:cover;"
                                                        alt="Foto {{ $p->name }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Ubah Foto (opsional)</label>
                                                    <input type="file" name="image_path" accept="image/*" class="form-control">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Nama</label>
                                                    <input type="text" name="name" class="form-control" value="{{ $p->name }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Jabatan</label>
                                                    <input type="text" name="jabatan" class="form-control" value="{{ $p->jabatan }}" required>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-primary">Simpan Perubahan</button>
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">Belum ada data personil</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
@endsection

@push('scripts')
    {{-- Summernote JS --}}
    
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Summernote CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.css" rel="stylesheet">
    <!-- Summernote JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            $('.summernote').summernote({
                height: 200,
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['link']],
                    ['view', ['codeview']]
                ]
            });
        });
    </script>
@endpush
