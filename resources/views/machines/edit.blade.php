@extends('layouts.app')

@section('title', 'Modifier une machine')

@section('content')
<div class="card" style="max-width: 650px;">
    <div class="card-body">
        <h5 class="card-title mb-4">Modifier la machine</h5>
        <form action="{{ route('machines.update', $machine) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Numéro de série</label>
                <input type="text" name="numero_serie" value="{{ old('numero_serie', $machine->numero_serie) }}" class="form-control @error('numero_serie') is-invalid @enderror">
                @error('numero_serie') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Modèle</label>
                <select name="modele_id" class="form-select @error('modele_id') is-invalid @enderror">
                    <option value="">-- Choisir un modèle --</option>
                    @foreach ($modeles as $modele)
                        <option value="{{ $modele->id }}" {{ old('modele_id', $machine->modele_id) == $modele->id ? 'selected' : '' }}>{{ $modele->nom }} ({{ $modele->marque }})</option>
                    @endforeach
                </select>
                @error('modele_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Emplacement</label>
                <select name="emplacement_id" class="form-select @error('emplacement_id') is-invalid @enderror">
                    <option value="">-- Choisir un emplacement --</option>
                    @foreach ($emplacements as $emplacement)
                        <option value="{{ $emplacement->id }}" {{ old('emplacement_id', $machine->emplacement_id) == $emplacement->id ? 'selected' : '' }}>{{ $emplacement->nom }}</option>
                    @endforeach
                </select>
                @error('emplacement_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Utilisateur assigné (optionnel)</label>
                <select name="utilisateur_parc_id" class="form-select @error('utilisateur_parc_id') is-invalid @enderror">
                    <option value="">-- Aucun --</option>
                    @foreach ($utilisateurs as $utilisateur)
                        <option value="{{ $utilisateur->id }}" {{ old('utilisateur_parc_id', $machine->utilisateur_parc_id) == $utilisateur->id ? 'selected' : '' }}>{{ $utilisateur->prenom }} {{ $utilisateur->nom }}</option>
                    @endforeach
                </select>
                @error('utilisateur_parc_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Statut</label>
                <select name="statut" class="form-select @error('statut') is-invalid @enderror">
                    <option value="En service" {{ old('statut', $machine->statut) == 'En service' ? 'selected' : '' }}>En service</option>
                    <option value="En panne" {{ old('statut', $machine->statut) == 'En panne' ? 'selected' : '' }}>En panne</option>
                    <option value="En maintenance" {{ old('statut', $machine->statut) == 'En maintenance' ? 'selected' : '' }}>En maintenance</option>
                    <option value="Hors service" {{ old('statut', $machine->statut) == 'Hors service' ? 'selected' : '' }}>Hors service</option>
                </select>
                @error('statut') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <a href="{{ route('machines.index') }}" class="btn btn-outline-secondary">Annuler</a>
            <button type="submit" class="btn btn-dark">Enregistrer les modifications</button>
        </form>
    </div>
</div>
@endsection