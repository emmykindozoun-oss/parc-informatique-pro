<?php

namespace App\Http\Controllers;

use App\Models\Emplacement;
use Illuminate\Http\Request;

class EmplacementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $emplacements = Emplacement::latest()->get();
return view('emplacements.index', compact('emplacements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('emplacements.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate(['nom'=>'required|string|max:255',
    'description' => 'nullable|string', ]);
    Emplacement::create($validated);
    return redirect()->route ('emplacements.index')->with('success','Emplacement crée avec succès.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Emplacement $emplacement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Emplacement $emplacement)
    {
        return view('emplacements.edit', compact('emplacement'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Emplacement $emplacement)
    {
        $validated = $request->validate([
    'nom' => 'required|string|max:255',
    'description' => 'nullable|string',
]);

$emplacement->update($validated);

return redirect()->route('emplacements.index')->with('success', 'Emplacement modifié avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Emplacement $emplacement)
    {
        $emplacement->delete();

return redirect()->route('emplacements.index')->with('success', 'Emplacement supprimé avec succès.');
    }
}
