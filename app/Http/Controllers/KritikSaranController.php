<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Feedback;

class KritikSaranController extends Controller
{
    public function create()
    {
        return view('kritik-saran');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_lengkap' => 'required',
            'alamat' => 'required',
            'jenis_layanan' => 'required',
            'tanggal_pelayanan' => 'required|date',
            'penilaian' => 'required|integer|between:1,5',
            'perlu_diperbaiki' => 'required',
            'saran' => 'required',
            'bersedia_dihubungi' => 'required|in:1,0',
            'kontak' => 'nullable|string',
        ]);

        Feedback::create($validated);
        flash()->success('Terima Kasih !! Kritik & Saran telah terkirim!');
        return redirect('/');
    }
}