<?php

namespace App\Http\Controllers;

use App\Models\UtilisateurParc;
use Illuminate\Http\Request;

class UtilisateurParcController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $utilisateurs = UtilisateurParc::latest()->get();
    return view('utilisateurs.index', compact('utilisateurs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('utilisateurs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
          $validated = $request->validate([
        'nom' => 'required|string|max:255',
        'prenom' => 'required|string|max:255',
        'email' => 'required|email|unique:utilisateur_parcs,email',
        'indicatif' => 'required|string|max:10',
        'telephone' => 'required|string|max:20',
        'fonction' => 'nullable|string|max:255',
    ]);

    UtilisateurParc::create($validated);

    return redirect()->route('utilisateurs.index')->with('success', 'Utilisateur créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(UtilisateurParc $utilisateurParc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UtilisateurParc $utilisateurParc)
    {
        return view('utilisateurs.edit', compact('utilisateurParc'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UtilisateurParc $utilisateurParc)
    {
        $validated = $request->validate([
        'nom' => 'required|string|max:255',
        'prenom' => 'required|string|max:255',
        'email' => 'required|email|unique:utilisateur_parcs,email,' . $utilisateurParc->id,
        'indicatif' => 'required|string|max:10',
        'telephone' => 'required|string|max:20',
        'fonction' => 'nullable|string|max:255',
    ]);

    $utilisateurParc->update($validated);

    return redirect()->route('utilisateurs.index')->with('success', 'Utilisateur modifié avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UtilisateurParc $utilisateurParc)
    {
         $utilisateurParc->delete();

    return redirect()->route('utilisateurs.index')->with('success', 'Utilisateur supprimé avec succès.');
    }
}
