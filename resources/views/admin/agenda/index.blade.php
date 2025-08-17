@extends('admin.layout')

@section('title', 'Kelola Agenda')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">Agenda Kegiatan</h2>
        <a href="{{ route('admin.agenda.create') }}" class="btn btn-primary btn-sm">+ Tambah Agenda</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th style="width:50px;">#</th>
                            <th>Judul</th>
                            <th>Lokasi</th>
                            <th>Mulai</th>
                            <th>Selesai</th>
                            <th style="width:160px;" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($agendas as $index => $agenda)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $agenda->title }}</td>
                                <td>{{ $agenda->location }}</td>
                                <td>{{ \Carbon\Carbon::parse($agenda->start_date)->format('d M Y H:i') }}</td>
                                <td>{{ \Carbon\Carbon::parse($agenda->end_date)->format('d M Y H:i') }}</td>
                                <td class="text-center">
                                    <a href="{{ route('admin.agenda.edit', $agenda->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('admin.agenda.destroy', $agenda->id) }}"
                                          method="POST" class="d-inline"
                                          onsubmit="return confirm('Yakin hapus agenda ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Belum ada agenda kegiatan</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
