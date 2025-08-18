<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        // Ambil row pertama, kalau belum ada, buat instance kosong
        $contact = Contact::first() ?? new Contact();
        return view('admin.contact.index', compact('contact'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:100',
            'facebook' => 'nullable|string|max:255',
            'instagram' => 'nullable|string|max:255',
        ]);

        $contact = Contact::first() ?? new Contact();

        $contact->phone = $request->phone;
        $contact->email = $request->email;
        $contact->facebook = $request->facebook;
        $contact->instagram = $request->instagram;
        $contact->save();

        return redirect()->route('admin.contact.index')->with('success', 'Contact updated successfully.');
    }
}
