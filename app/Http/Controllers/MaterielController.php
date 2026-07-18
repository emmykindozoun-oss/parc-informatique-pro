<?php

namespace App\Http\Controllers;

use App\Models\Materiel;
use App\Models\Emplacement;
use Illuminate\Http\Request;

class MaterielController extends Controller
{
    public function index()
    {
        $materiels = Materiel::with('emplacement')->latest()->get();
        return view('materiels.index', compact('materiels'));
    }

    public function create()
    {
        $emplacements = Emplacement::orderBy('nom')->get();
        return view('materiels.create', compact('emplacements'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'etat' => 'required|string|max:255',
            'quantite' => 'required|integer|min:1',
            'emplacement_id' => 'nullable|exists:emplacements,id',
        ]);

        Materiel::create($validated);

        return redirect()->route('materiels.index')->with('success', 'Matériel créé avec succès.');
    }

    public function show(Materiel $materiel)
    {
        //
    }

    public function edit(Materiel $materiel)
    {
        $emplacements = Emplacement::orderBy('nom')->get();
        return view('materiels.edit', compact('materiel', 'emplacements'));
    }

    public function update(Request $request, Materiel $materiel)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'etat' => 'required|string|max:255',
            'quantite' => 'required|integer|min:1',
            'emplacement_id' => 'nullable|exists:emplacements,id',
        ]);

        $materiel->update($validated);

        return redirect()->route('materiels.index')->with('success', 'Matériel modifié avec succès.');
    }

    public function destroy(Materiel $materiel)
    {
        $materiel->delete();

        return redirect()->route('materiels.index')->with('success', 'Matériel supprimé avec succès.');
    }
}