<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Agenda;

class AgendaController extends Controller
{
    /**
     * Display a listing of the agenda.
     */
    public function index()
    {
        $agendas = Agenda::orderBy('start_date', 'desc')->paginate(10);

        return view('admin.agenda.index', compact('agendas'));
    }

    /**
     * Show the form for creating a new agenda.
     */
    public function create()
    {
        return view('admin.agenda.create');
    }

    /**
     * Store a newly created agenda in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_date'  => 'required|date',
            'end_date'    => 'required|date|after_or_equal:start_date',
            'location'    => 'required|string|max:255',
        ]);

        Agenda::create($validated);

        return redirect()->route('admin.agenda.index')
            ->with('success', 'Agenda berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified agenda.
     */
    public function edit(Agenda $agenda)
    {
        return view('admin.agenda.edit', compact('agenda'));
    }

    /**
     * Update the specified agenda in storage.
     */
    public function update(Request $request, Agenda $agenda)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_date'  => 'required|date',
            'end_date'    => 'required|date|after_or_equal:start_date',
            'location'    => 'required|string|max:255',
        ]);

        $agenda->update($validated);

        return redirect()->route('admin.agenda.index')
            ->with('success', 'Agenda berhasil diperbarui.');
    }

    /**
     * Remove the specified agenda from storage.
     */
    public function destroy(Agenda $agenda)
    {
        $agenda->delete();

        return redirect()->route('admin.agenda.index')
            ->with('success', 'Agenda berhasil dihapus.');
    }
}
