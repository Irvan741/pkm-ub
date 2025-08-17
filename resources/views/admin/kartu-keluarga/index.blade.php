@extends('admin.layout')

@section('title', 'Data Kartu Keluarga')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="mb-0">Data Kartu Keluarga</h4>
        <a href="{{ route('admin.kartu-keluarga.create') }}" class="btn btn-primary btn-sm">
            + Tambah Kartu Keluarga
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($datas->count())
        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>No. KK</th>
                        <th>Kepala Keluarga</th>
                        <th>Alamat</th>
                        <th>RT/RW</th>
                        <th>Desa</th>
                        <th>Kecamatan</th>
                        <th>Kabupaten</th>
                        <th>Provinsi</th>
                        <th width="120">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($datas as $index => $data)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $data->no_kk }}</td>
                            <td>{{ $data->kepala_keluarga }}</td>
                            <td>{{ $data->alamat }}</td>
                            <td>{{ $data->rt_rw }}</td>
                            <td>{{ $data->kelurahan }}</td>
                            <td>{{ $data->kecamatan }}</td>
                            <td>{{ $data->kota }}</td>
                            <td>{{ $data->provinsi }}</td>
                            <td>
                                <a href="{{ route('admin.kartu-keluarga.edit', $data->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('admin.kartu-keluarga.destroy', $data->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Yakin hapus data ini?')" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="alert alert-info">Belum ada data Kartu Keluarga.</div>
    @endif
</div>
@endsection
