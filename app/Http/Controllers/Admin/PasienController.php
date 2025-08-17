<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pasien;
use App\Models\KartuKeluarga;
use Carbon\Carbon;

class PasienController extends Controller
{
    public function index()
    {
        $pasien = Pasien::latest()->paginate(10);
        return view('admin.pasien.index', compact('pasien'));
    }

    public function show($id)
    {
        $pasien = Pasien::with('kartuKeluarga')->findOrFail($id);
        return view('admin.pasien.show', compact('pasien'));
    }

    public function create()
    {
        return view('admin.pasien.create');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'           => 'required|string|max:255',
            'nik'            => 'required',
            'no_kk'          => 'required',
            'tanggal_lahir'  => 'required|date',
            'jenis_kelamin'  => 'required',
            'alamat'         => 'required|string',
            'no_hp'          => 'required|string|max:15',
        ]);

        // Cek apakah no_kk ada di tabel KartuKeluarga
        $kkExists = KartuKeluarga::where('no_kk', $request->no_kk)->exists();

        if (!$kkExists) {
            flash()->error('Kartu Keluarga tidak terdaftar! kontak puskesmas untuk melanjutkan');
            return back()->withErrors([
                'no_kk' => 'Nomor KK belum terdaftar di sistem. Silakan hubungi admin.'
            ])->withInput();
        }

        // Hitung umur dan kategori usia
        $umur = Carbon::parse($request->tanggal_lahir)->age;

        if ($umur <= 5) {
            $kategori_usia = 'Balita';
        } elseif ($umur <= 12) {
            $kategori_usia = 'Anak-anak';
        } elseif ($umur <= 17) {
            $kategori_usia = 'Remaja';
        } elseif ($umur <= 59) {
            $kategori_usia = 'Dewasa';
        } else {
            $kategori_usia = 'Lansia';
        }

        // Simpan data pasien
        Pasien::create([
            'nama'           => $request->nama,
            'nik'            => $request->nik,
            'no_kk'          => $request->no_kk,
            'tanggal_lahir'  => $request->tanggal_lahir,
            'alamat'         => $request->alamat,
            'no_hp'          => $request->no_hp,
            'jenis_kelamin'  => $request->jenis_kelamin,
            'kategori_usia'  => $kategori_usia,
        ]);

        return redirect()->route('admin.pasien.index')
            ->with('success', 'Pendaftaran pasien berhasil.');
    }

    public function prosesDaftar(Request $request)
    {
        $validated = $request->validate([
            'nama'           => 'required|string|max:255',
            'nik'            => 'required|digits:16',
            'no_kk'          => 'required|digits:16',
            'tanggal_lahir'  => 'required|date',
            'alamat'         => 'required|string',
            'no_hp'          => 'required|string|max:15',
        ]);

        // Cek KK
        if (!KartuKeluarga::where('no_kk', $request->no_kk)->exists()) {
            return back()->withErrors([
                'no_kk' => 'Nomor KK belum terdaftar di sistem. Silakan hubungi admin.'
            ])->withInput();
        }

        // Hitung umur
        $umur = Carbon::parse($request->tanggal_lahir)->age;
        if ($umur <= 5) {
            $kategori_usia = 'Balita';
        } elseif ($umur <= 12) {
            $kategori_usia = 'Anak-anak';
        } elseif ($umur <= 17) {
            $kategori_usia = 'Remaja';
        } elseif ($umur <= 59) {
            $kategori_usia = 'Dewasa';
        } else {
            $kategori_usia = 'Lansia';
        }

        Pasien::create(array_merge($validated, [
            'kategori_usia' => $kategori_usia
        ]));

        return redirect()->route('admin.pasien.index')
            ->with('success', 'Pendaftaran pasien berhasil.');
    }

    public function edit($id)
    {
        $pasien = Pasien::findOrFail($id);
        return view('admin.pasien.edit', compact('pasien'));
    }

    public function update(Request $request, $id)
    {
        $pasien = Pasien::findOrFail($id);

        $validated = $request->validate([
            'nama'           => 'required|string|max:255',
            'nik'            => 'required|digits:16',
            'no_kk'          => 'required|digits:16',
            'tanggal_lahir'  => 'required|date',
            'alamat'         => 'required|string',
            'no_hp'          => 'required|string|max:15',
        ]);

        // Hitung umur ulang
        $umur = Carbon::parse($request->tanggal_lahir)->age;
        if ($umur <= 5) {
            $kategori_usia = 'Balita';
        } elseif ($umur <= 12) {
            $kategori_usia = 'Anak-anak';
        } elseif ($umur <= 17) {
            $kategori_usia = 'Remaja';
        } elseif ($umur <= 59) {
            $kategori_usia = 'Dewasa';
        } else {
            $kategori_usia = 'Lansia';
        }

        $pasien->update(array_merge($validated, [
            'kategori_usia' => $kategori_usia
        ]));

        return redirect()->route('admin.pasien.index')
            ->with('success', 'Data pasien berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $pasien = Pasien::findOrFail($id);
        $pasien->delete();

        return redirect()->route('admin.pasien.index')
            ->with('success', 'Data pasien berhasil dihapus.');
    }
}
