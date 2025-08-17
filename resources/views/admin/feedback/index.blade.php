@extends('admin.layout')

@section('content')
<div class="container mt-4">
    <h3 class="mb-4">Daftar Feedback Pengguna</h3>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($feedbacks->count())
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Jenis Layanan</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($feedbacks as $i => $feedback)
                        <tr>
                            <td>{{ $feedbacks->firstItem() + $i }}</td>
                            <td>{{ $feedback->nama_lengkap }}</td>
                            <td>{{ $feedback->jenis_layanan }}</td>
                            <td>{{ $feedback->tanggal_pelayanan }}</td>
                            <td>
                                <a href="{{ route('admin.feedback.show', $feedback->id) }}" class="btn btn-sm btn-info">Lihat</a>
                                <form action="{{ route('admin.feedback.destroy', $feedback->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus feedback ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{ $feedbacks->links() }}
    @else
        <div class="alert alert-info">Belum ada feedback yang masuk.</div>
    @endif
</div>
@endsection
