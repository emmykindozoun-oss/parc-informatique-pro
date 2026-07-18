<?php

namespace App\Http\Controllers;

use App\Models\Logiciel;
use App\Models\Machine;
use Illuminate\Http\Request;

class LogicielController extends Controller
{
    public function index()
    {
        $logiciels = Logiciel::with('machine')->latest()->get();
        return view('logiciels.index', compact('logiciels'));
    }

    public function create()
    {
        $machines = Machine::orderBy('numero_serie')->get();
        return view('logiciels.create', compact('machines'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'editeur' => 'required|string|max:255',
            'version' => 'nullable|string|max:255',
            'licence' => 'required|string|max:255',
            'date_expiration' => 'nullable|date',
            'machine_id' => 'nullable|exists:machines,id',
        ]);

        Logiciel::create($validated);

        return redirect()->route('logiciels.index')->with('success', 'Logiciel créé avec succès.');
    }

    public function show(Logiciel $logiciel)
    {
        //
    }

    public function edit(Logiciel $logiciel)
    {
        $machines = Machine::orderBy('numero_serie')->get();
        return view('logiciels.edit', compact('logiciel', 'machines'));
    }

    public function update(Request $request, Logiciel $logiciel)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'editeur' => 'required|string|max:255',
            'version' => 'nullable|string|max:255',
            'licence' => 'required|string|max:255',
            'date_expiration' => 'nullable|date',
            'machine_id' => 'nullable|exists:machines,id',
        ]);

        $logiciel->update($validated);

        return redirect()->route('logiciels.index')->with('success', 'Logiciel modifié avec succès.');
    }

    public function destroy(Logiciel $logiciel)
    {
        $logiciel->delete();

        return redirect()->route('logiciels.index')->with('success', 'Logiciel supprimé avec succès.');
    }
}