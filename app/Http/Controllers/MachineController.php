<?php

namespace App\Http\Controllers;

use App\Models\Machine;
use App\Models\Modele;
use App\Models\Emplacement;
use App\Models\UtilisateurParc;
use Illuminate\Http\Request;

class MachineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $machines = Machine::with(['modele', 'emplacement', 'utilisateurParc'])->latest()->get();
    return view('machines.index', compact('machines'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         $modeles = Modele::orderBy('nom')->get();
    $emplacements = Emplacement::orderBy('nom')->get();
    $utilisateurs = UtilisateurParc::orderBy('nom')->get();
    return view('machines.create', compact('modeles', 'emplacements', 'utilisateurs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
        'numero_serie' => 'required|string|max:255|unique:machines,numero_serie',
        'statut' => 'required|string|max:255',
        'modele_id' => 'required|exists:modeles,id',
        'emplacement_id' => 'required|exists:emplacements,id',
        'utilisateur_parc_id' => 'nullable|exists:utilisateur_parcs,id',
    ]);

    Machine::create($validated);

    return redirect()->route('machines.index')->with('success', 'Machine créée avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Machine $machine)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Machine $machine)
    {
        $modeles = Modele::orderBy('nom')->get();
    $emplacements = Emplacement::orderBy('nom')->get();
    $utilisateurs = UtilisateurParc::orderBy('nom')->get();
    return view('machines.edit', compact('machine', 'modeles', 'emplacements', 'utilisateurs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Machine $machine)
    {
        $validated = $request->validate([
        'numero_serie' => 'required|string|max:255|unique:machines,numero_serie,' . $machine->id,
        'statut' => 'required|string|max:255',
        'modele_id' => 'required|exists:modeles,id',
        'emplacement_id' => 'required|exists:emplacements,id',
        'utilisateur_parc_id' => 'nullable|exists:utilisateur_parcs,id',
    ]);

    $machine->update($validated);

    return redirect()->route('machines.index')->with('success', 'Machine modifiée avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Machine $machine)
    {
         $machine->delete();

    return redirect()->route('machines.index')->with('success', 'Machine supprimée avec succès.');
    }
}
