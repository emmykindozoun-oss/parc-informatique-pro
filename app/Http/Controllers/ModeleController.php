<?php

namespace App\Http\Controllers;

use App\Models\Modele;
use Illuminate\Http\Request;

class ModeleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $modeles = Modele::latest()->get();
    return view('modeles.index', compact('modeles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('modeles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $validated = $request->validate([
        'nom' => 'required|string|max:255',
        'marque' => 'required|string|max:255',
        'type' => 'required|string|max:255',
    ]);

    Modele::create($validated);

    return redirect()->route('modeles.index')->with('success', 'Modèle créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Modele $modele)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Modele $modele)
    {
        return view('modeles.edit', compact('modele'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Modele $modele)
    {
         $validated = $request->validate([
        'nom' => 'required|string|max:255',
        'marque' => 'required|string|max:255',
        'type' => 'required|string|max:255',
    ]);

    $modele->update($validated);

    return redirect()->route('modeles.index')->with('success', 'Modèle modifié avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Modele $modele)
    {
        $modele->delete();

    return redirect()->route('modeles.index')->with('success', 'Modèle supprimé avec succès.');
    }
}
