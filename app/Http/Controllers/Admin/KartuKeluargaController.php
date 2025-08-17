<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KartuKeluarga;

class KartuKeluargaController extends Controller
{
    public function index()
    {
        $datas = KartuKeluarga::orderBy('created_at', 'desc')->get();
        return view('admin.kartu-keluarga.index', compact('datas'));
    }

    public function create()
    {
        return view('admin.kartu-keluarga.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_kk'           => 'required|digits:16|unique:kartu_keluargas,no_kk',
            'kepala_keluarga' => 'required|string|max:255',
            'alamat'          => 'required|string',
            'rt'              => 'nullable|string|max:3',
            'rw'              => 'nullable|string|max:3',
            'desa'            => 'nullable|string|max:255',
            'kecamatan'       => 'nullable|string|max:255',
            'kabupaten'       => 'nullable|string|max:255',
            'provinsi'        => 'nullable|string|max:255',
        ]);

        $rt_rw = null;
        if ($request->filled('rt') || $request->filled('rw')) {
            $rt = str_pad($request->rt ?? '0', 2, '0', STR_PAD_LEFT);
            $rw = $request->filled('rw') 
                ? str_pad($request->rw, 3, '0', STR_PAD_LEFT) 
                : '000';

            $rt_rw = $rt . '/' . $rw;
        }


        KartuKeluarga::create([
            'no_kk'           => $request->no_kk,
            'kepala_keluarga' => $request->kepala_keluarga,
            'alamat'          => $request->alamat,
            'rt_rw'           => $rt_rw,
            'kelurahan'            => $request->desa,
            'kecamatan'       => $request->kecamatan,
            'kota'       => $request->kabupaten,
            'provinsi'        => $request->provinsi,
        ]);

        return redirect()->route('admin.kartu-keluarga.index')
            ->with('success', 'Kartu Keluarga berhasil ditambahkan.');
    }


    public function edit($id)
    {
        $kartuKeluarga = KartuKeluarga::findOrFail($id);
        return view('admin.kartu-keluarga.edit', compact('kartuKeluarga'));
    }

    public function update(Request $request, $id)
    {
        $kartuKeluarga = KartuKeluarga::findOrFail($id);

        $request->validate([
            'no_kk'           => 'required|digits:16|unique:kartu_keluargas,no_kk,' . $kartuKeluarga->id,
            'kepala_keluarga' => 'required|string|max:255',
            'alamat'          => 'required|string',
            'rt'              => 'nullable|string|max:3',
            'rw'              => 'nullable|string|max:3',
            'desa'            => 'nullable|string|max:255',
            'kecamatan'       => 'nullable|string|max:255',
            'kabupaten'       => 'nullable|string|max:255',
            'provinsi'        => 'nullable|string|max:255',
        ]);

        $rt_rw = null;
        if ($request->filled('rt') || $request->filled('rw')) {
            $rt = str_pad($request->rt ?? '0', 2, '0', STR_PAD_LEFT);
            $rw = $request->filled('rw') 
                ? str_pad($request->rw, 3, '0', STR_PAD_LEFT) 
                : '000';

            $rt_rw = $rt . '/' . $rw;
        }

        $kartuKeluarga->update([
            'no_kk'           => $request->no_kk,
            'kepala_keluarga' => $request->kepala_keluarga,
            'alamat'          => $request->alamat,
            'rt_rw'           => $rt_rw,
            'kelurahan'       => $request->desa,
            'kecamatan'       => $request->kecamatan,
            'kota'            => $request->kabupaten,
            'provinsi'        => $request->provinsi,
        ]);

        return redirect()->route('admin.kartu-keluarga.index')
            ->with('success', 'Kartu Keluarga berhasil diperbarui.');
    }


    public function destroy($id)
    {
        $kk = KartuKeluarga::findOrFail($id);
        $kk->delete();

        return redirect()->route('admin.kartu-keluarga.index')
            ->with('success', 'Kartu Keluarga berhasil dihapus.');
    }
}
