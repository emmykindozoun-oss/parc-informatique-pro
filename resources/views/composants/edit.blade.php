@extends('layouts.app')

@section('title', 'Modifier un composant')

@section('content')
<div class="card" style="max-width: 650px;">
    <div class="card-body">
        <h5 class="card-title mb-4">Modifier le composant</h5>
        <form action="{{ route('composants.update', $composant) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Nom</label>
                <input type="text" name="nom" value="{{ old('nom', $composant->nom) }}" class="form-control @error('nom') is-invalid @enderror">
                @error('nom') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Type</label>
                <input type="text" name="type" value="{{ old('type', $composant->type) }}" class="form-control @error('type') is-invalid @enderror">
                @error('type') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">État</label>
                <select name="etat" class="form-select @error('etat') is-invalid @enderror">
                    <option value="Neuf" {{ old('etat', $composant->etat) == 'Neuf' ? 'selected' : '' }}>Neuf</option>
                    <option value="Bon" {{ old('etat', $composant->etat) == 'Bon' ? 'selected' : '' }}>Bon</option>
                    <option value="Usé" {{ old('etat', $composant->etat) == 'Usé' ? 'selected' : '' }}>Usé</option>
                    <option value="Défectueux" {{ old('etat', $composant->etat) == 'Défectueux' ? 'selected' : '' }}>Défectueux</option>
                </select>
                @error('etat') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Machine (optionnel)</label>
                <select name="machine_id" class="form-select @error('machine_id') is-invalid @enderror">
                    <option value="">-- En stock, non installé --</option>
                    @foreach ($machines as $machine)
                        <option value="{{ $machine->id }}" {{ old('machine_id', $composant->machine_id) == $machine->id ? 'selected' : '' }}>{{ $machine->numero_serie }}</option>
                    @endforeach
                </select>
                @error('machine_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <a href="{{ route('composants.index') }}" class="btn btn-outline-secondary">Annuler</a>
            <button type="submit" class="btn btn-dark">Enregistrer les modifications</button>
        </form>
    </div>
</div>
@endsection