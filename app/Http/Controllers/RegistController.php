<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;
use App\Models\KartuKeluarga;
use Carbon\Carbon;

class RegistController extends Controller
{
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

        return redirect()->route('index')
            ->with('success', 'Pendaftaran pasien berhasil.');
    }
}
