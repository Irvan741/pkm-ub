@extends('admin.layout')

@section('title', 'Daftar Berita')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">Daftar Berita</h2>
        <a href="{{ route('admin.berita.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg"></i> Tambah Berita
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-striped table-bordered align-middle">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Status</th>
                    <th>Diposting Pada</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($beritas as $index => $berita)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $berita->judul }}</td>
                        <td>{{ $berita->user->name }}</td>
                        <td>{{ $berita->status == "publish" ? 'Published' : 'Draft'  }}</td>
                        <td>{{ $berita->created_at->format('d M Y') }}</td>
                        <td>
                            <a href="{{ route('admin.berita.edit', $berita->id) }}" class="btn btn-sm btn-warning">
                                <i class="bi bi-pencil-square"></i> Edit
                            </a>
                            <form action="{{ route('admin.berita.destroy', $berita->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus berita ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">
                                    <i class="bi bi-trash"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Belum ada berita.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
