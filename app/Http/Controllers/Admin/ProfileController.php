<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kepala;
use App\Models\Profile;
use App\Models\Personil;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $kepala   = Kepala::first();
        $profile  = Profile::first();
        $personil = Personil::all();

        return view('admin.profile.index', compact('kepala', 'profile', 'personil'));
    }

    public function storeOrUpdateKepala(Request $request)
    {
        $request->validate([
            'name'       => 'required|string|max:255',
            'sambutan'   => 'required|string',
            'image_path' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $kepala = Kepala::first() ?? new Kepala();
        $kepala->name     = $request->name;
        $kepala->sambutan = $request->sambutan;

        if ($request->hasFile('image_path')) {
            // hapus gambar lama
            if ($kepala->image_path && file_exists(public_path($kepala->image_path))) {
                unlink(public_path($kepala->image_path));
            }

            $file      = $request->file('image_path');
            $filename  = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('kepala'), $filename);
            $kepala->image_path = 'kepala/' . $filename;
        }

        $kepala->save();

        return back()->with('success', 'Data Kepala Puskesmas berhasil disimpan');
    }

    public function storeOrUpdateProfile(Request $request)
    {
        $request->validate([
            'tupoksi' => 'required|string',
            'visi'    => 'required|string',
            'misi'    => 'required|string',
        ]);

        $profile = Profile::first() ?? new Profile();
        $profile->tupoksi = $request->tupoksi;
        $profile->visi    = $request->visi;
        $profile->misi    = $request->misi;
        $profile->save();

        return back()->with('success', 'Data Profil berhasil disimpan');
    }

    public function storePersonil(Request $request)
    {
        $request->validate([
            'name'       => 'required|string|max:255',
            'jabatan'    => 'required|string|max:255',
            'image_path' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $personil = new Personil();
        $personil->name    = $request->name;
        $personil->jabatan = $request->jabatan;

        if ($request->hasFile('image_path')) {
            $file      = $request->file('image_path');
            $filename  = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('personil'), $filename);
            $personil->image_path = 'personil/' . $filename;
        }

        $personil->save();

        return back()->with('success', 'Personil berhasil ditambahkan');
    }

    public function updatePersonil(Request $request, $id)
    {
        $personil = Personil::findOrFail($id);

        $request->validate([
            'name'       => 'required|string|max:255',
            'jabatan'    => 'required|string|max:255',
            'image_path' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $personil->name    = $request->name;
        $personil->jabatan = $request->jabatan;

        if ($request->hasFile('image_path')) {
            if ($personil->image_path && file_exists(public_path($personil->image_path))) {
                unlink(public_path($personil->image_path));
            }

            $file      = $request->file('image_path');
            $filename  = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('personil'), $filename);
            $personil->image_path = 'personil/' . $filename;
        }

        $personil->save();

        return back()->with('success', 'Data Personil berhasil diperbarui');
    }

    public function destroyPersonil($id)
    {
        $personil = Personil::findOrFail($id);

        if ($personil->image_path && file_exists(public_path($personil->image_path))) {
            unlink(public_path($personil->image_path));
        }

        $personil->delete();

        return back()->with('success', 'Personil berhasil dihapus');
    }
}
