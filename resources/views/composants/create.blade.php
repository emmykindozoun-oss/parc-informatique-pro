@extends('layouts.app')

@section('title', 'Ajouter un composant')

@section('content')
<div class="card" style="max-width: 650px;">
    <div class="card-body">
        <h5 class="card-title mb-4">Nouveau composant</h5>
        <form action="{{ route('composants.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Nom</label>
                <input type="text" name="nom" value="{{ old('nom') }}" class="form-control @error('nom') is-invalid @enderror" placeholder="Ex: RAM 16 Go">
                @error('nom') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Type</label>
                <input type="text" name="type" value="{{ old('type') }}" class="form-control @error('type') is-invalid @enderror" placeholder="Ex: Mémoire, Disque dur, Carte graphique">
                @error('type') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">État</label>
                <select name="etat" class="form-select @error('etat') is-invalid @enderror">
                    <option value="Neuf" {{ old('etat') == 'Neuf' ? 'selected' : '' }}>Neuf</option>
                    <option value="Bon" {{ old('etat', 'Bon') == 'Bon' ? 'selected' : '' }}>Bon</option>
                    <option value="Usé" {{ old('etat') == 'Usé' ? 'selected' : '' }}>Usé</option>
                    <option value="Défectueux" {{ old('etat') == 'Défectueux' ? 'selected' : '' }}>Défectueux</option>
                </select>
                @error('etat') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Machine (optionnel)</label>
                <select name="machine_id" class="form-select @error('machine_id') is-invalid @enderror">
                    <option value="">-- En stock, non installé --</option>
                    @foreach ($machines as $machine)
                        <option value="{{ $machine->id }}" {{ old('machine_id') == $machine->id ? 'selected' : '' }}>{{ $machine->numero_serie }}</option>
                    @endforeach
                </select>
                @error('machine_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <a href="{{ route('composants.index') }}" class="btn btn-outline-secondary">Annuler</a>
            <button type="submit" class="btn btn-dark">Enregistrer</button>
        </form>
    </div>
</div>
@endsection