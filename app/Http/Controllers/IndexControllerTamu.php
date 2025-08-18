<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\Agenda;
use App\Models\Contact; // tambahin model Contact

class IndexControllerTamu extends Controller
{
    public function profile()
    {
        $kepala   = \App\Models\Kepala::first();
        $profile  = \App\Models\Profile::first();
        $personil = \App\Models\Personil::all();

        return view('profile', compact('kepala', 'profile', 'personil'));
    }
    

    public function agenda()
    {
        $agendas = Agenda::all();
        return view('agenda', compact('agendas'));
    }


    public function detailPost($slug)
    {
        $berita = Berita::where('slug', $slug)->first();
        return view('detail-post', compact('berita'));
    }

    public function kontak()
    {
        $contact = Contact::first(); // karena cuma 1 row
        return view('kontak-kami', compact('contact'));
    }
}
