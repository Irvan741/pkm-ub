@extends('admin.layout')

@section('title', 'Tambah Kartu Keluarga')

@section('content')
<div class="container">
    <h4 class="mb-4">Tambah Kartu Keluarga</h4>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Oops!</strong> Ada kesalahan pada inputan.<br><br>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.kartu-keluarga.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Nomor KK</label>
            <input type="text" name="no_kk" class="form-control" value="{{ old('no_kk') }}" required maxlength="16">
        </div>

        <div class="mb-3">
            <label class="form-label">Nama Kepala Keluarga</label>
            <input type="text" name="kepala_keluarga" class="form-control" value="{{ old('kepala_keluarga') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Alamat</label>
            <textarea name="alamat" class="form-control" rows="2" required>{{ old('alamat') }}</textarea>
        </div>

        <div class="row">
            <div class="col-md-2 mb-3">
                <label class="form-label">RT</label>
                <input type="text" name="rt" class="form-control" value="{{ old('rt') }}" required>
            </div>
            <div class="col-md-2 mb-3">
                <label class="form-label">RW</label>
                <input type="text" name="rw" class="form-control" value="{{ old('rw') }}" required>
            </div>
            <div class="col-md-4 mb-3">
                <label class="form-label">Desa</label>
                <input type="text" name="desa" class="form-control" value="{{ old('desa') }}" required>
            </div>
            <div class="col-md-4 mb-3">
                <label class="form-label">Kecamatan</label>
                <input type="text" name="kecamatan" class="form-control" value="{{ old('kecamatan') }}" required>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Kabupaten</label>
                <input type="text" name="kabupaten" class="form-control" value="{{ old('kabupaten') }}" required>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Provinsi</label>
                <input type="text" name="provinsi" class="form-control" value="{{ old('provinsi') }}" required>
            </div>
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ route('admin.kartu-keluarga.index') }}" class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-success">Simpan</button>
        </div>
    </form>
</div>
@endsection
