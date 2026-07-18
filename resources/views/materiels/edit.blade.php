@extends('layouts.app')

@section('title', 'Modifier un matériel')

@section('content')
<div class="card" style="max-width: 650px;">
    <div class="card-body">
        <h5 class="card-title mb-4">Modifier le matériel</h5>
        <form action="{{ route('materiels.update', $materiel) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Nom</label>
                <input type="text" name="nom" value="{{ old('nom', $materiel->nom) }}" class="form-control @error('nom') is-invalid @enderror">
                @error('nom') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Type</label>
                <input type="text" name="type" value="{{ old('type', $materiel->type) }}" class="form-control @error('type') is-invalid @enderror">
                @error('type') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">État</label>
                    <select name="etat" class="form-select @error('etat') is-invalid @enderror">
                        <option value="Neuf" {{ old('etat', $materiel->etat) == 'Neuf' ? 'selected' : '' }}>Neuf</option>
                        <option value="Bon" {{ old('etat', $materiel->etat) == 'Bon' ? 'selected' : '' }}>Bon</option>
                        <option value="Usé" {{ old('etat', $materiel->etat) == 'Usé' ? 'selected' : '' }}>Usé</option>
                        <option value="Défectueux" {{ old('etat', $materiel->etat) == 'Défectueux' ? 'selected' : '' }}>Défectueux</option>
                    </select>
                    @error('etat') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Quantité</label>
                    <input type="number" name="quantite" min="1" value="{{ old('quantite', $materiel->quantite) }}" class="form-control @error('quantite') is-invalid @enderror">
                    @error('quantite') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Emplacement (optionnel)</label>
                <select name="emplacement_id" class="form-select @error('emplacement_id') is-invalid @enderror">
                    <option value="">-- Non spécifié --</option>
                    @foreach ($emplacements as $emplacement)
                        <option value="{{ $emplacement->id }}" {{ old('emplacement_id', $materiel->emplacement_id) == $emplacement->id ? 'selected' : '' }}>{{ $emplacement->nom }}</option>
                    @endforeach
                </select>
                @error('emplacement_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <a href="{{ route('materiels.index') }}" class="btn btn-outline-secondary">Annuler</a>
            <button type="submit" class="btn btn-dark">Enregistrer les modifications</button>
        </form>
    </div>
</div>
@endsection