<?php

namespace App\Http\Controllers;

use App\Models\Composant;
use App\Models\Machine;
use Illuminate\Http\Request;

class ComposantController extends Controller
{
    public function index()
    {
        $composants = Composant::with('machine')->latest()->get();
        return view('composants.index', compact('composants'));
    }

    public function create()
    {
        $machines = Machine::orderBy('numero_serie')->get();
        return view('composants.create', compact('machines'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'etat' => 'required|string|max:255',
            'machine_id' => 'nullable|exists:machines,id',
        ]);

        Composant::create($validated);

        return redirect()->route('composants.index')->with('success', 'Composant créé avec succès.');
    }

    public function show(Composant $composant)
    {
        //
    }

    public function edit(Composant $composant)
    {
        $machines = Machine::orderBy('numero_serie')->get();
        return view('composants.edit', compact('composant', 'machines'));
    }

    public function update(Request $request, Composant $composant)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'etat' => 'required|string|max:255',
            'machine_id' => 'nullable|exists:machines,id',
        ]);

        $composant->update($validated);

        return redirect()->route('composants.index')->with('success', 'Composant modifié avec succès.');
    }

    public function destroy(Composant $composant)
    {
        $composant->delete();

        return redirect()->route('composants.index')->with('success', 'Composant supprimé avec succès.');
    }
}