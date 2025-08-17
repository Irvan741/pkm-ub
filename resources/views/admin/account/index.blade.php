@extends('admin.layout')

@section('title', 'Daftar Berita')

@section('content')
<div class="container">
    <h3>Manajemen User & Role</h3>

    {{-- Form Tambah User --}}
    <form method="POST" action="{{ route('admin.user-role.store') }}" class="row g-2 my-4">
        @csrf
        <div class="col-md-3"><input name="name" class="form-control" placeholder="Nama" required></div>
        <div class="col-md-3"><input name="email" type="email" class="form-control" placeholder="Email" required></div>
        <div class="col-md-3"><input name="password" type="password" class="form-control" placeholder="Password" required></div>
        <div class="col-md-2">
            <select name="role" class="form-select" required>
                <option value="">Pilih Role</option>
                @foreach ($roles as $role)
                    <option value="{{ $role->name }}">{{ ucfirst($role->name) }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-1">
            <button class="btn btn-primary w-100">Tambah</button>
        </div>
    </form>

    {{-- Tabel User --}}
    <table class="table table-bordered table-striped align-middle">
        <thead class="table-light">
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $i => $user)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <form method="POST" action="{{ route('admin.user-role.update', $user) }}" class="d-flex gap-2">
                            @csrf @method('PUT')
                            <select name="role" class="form-select form-select-sm">
                                @foreach ($roles as $role)
                                    <option value="{{ $role->name }}" {{ $user->hasRole($role->name) ? 'selected' : '' }}>
                                        {{ ucfirst($role->name) }}
                                    </option>
                                @endforeach
                            </select>
                            <button class="btn btn-sm btn-success">Simpan</button>
                        </form>
                    </td>
                    <td>
                        <form method="POST" action="{{ route('admin.user-role.destroy', $user) }}">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>

@endsection
