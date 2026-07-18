@extends('layouts.app')

@section('title', 'Ajouter un matériel')

@section('content')
<div class="card" style="max-width: 650px;">
    <div class="card-body">
        <h5 class="card-title mb-4">Nouveau matériel</h5>
        <form action="{{ route('materiels.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Nom</label>
                <input type="text" name="nom" value="{{ old('nom') }}" class="form-control @error('nom') is-invalid @enderror" placeholder="Ex: Imprimante HP LaserJet">
                @error('nom') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Type</label>
                <input type="text" name="type" value="{{ old('type') }}" class="form-control @error('type') is-invalid @enderror" placeholder="Ex: Imprimante, Scanner, Onduleur">
                @error('type') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">État</label>
                    <select name="etat" class="form-select @error('etat') is-invalid @enderror">
                        <option value="Neuf" {{ old('etat') == 'Neuf' ? 'selected' : '' }}>Neuf</option>
                        <option value="Bon" {{ old('etat', 'Bon') == 'Bon' ? 'selected' : '' }}>Bon</option>
                        <option value="Usé" {{ old('etat') == 'Usé' ? 'selected' : '' }}>Usé</option>
                        <option value="Défectueux" {{ old('etat') == 'Défectueux' ? 'selected' : '' }}>Défectueux</option>
                    </select>
                    @error('etat') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Quantité</label>
                    <input type="number" name="quantite" min="1" value="{{ old('quantite', 1) }}" class="form-control @error('quantite') is-invalid @enderror">
                    @error('quantite') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Emplacement (optionnel)</label>
                <select name="emplacement_id" class="form-select @error('emplacement_id') is-invalid @enderror">
                    <option value="">-- Non spécifié --</option>
                    @foreach ($emplacements as $emplacement)
                        <option value="{{ $emplacement->id }}" {{ old('emplacement_id') == $emplacement->id ? 'selected' : '' }}>{{ $emplacement->nom }}</option>
                    @endforeach
                </select>
                @error('emplacement_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <a href="{{ route('materiels.index') }}" class="btn btn-outline-secondary">Annuler</a>
            <button type="submit" class="btn btn-dark">Enregistrer</button>
        </form>
    </div>
</div>
@endsection