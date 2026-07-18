@extends('layouts.app')

@section('title', 'Modifier un modèle')

@section('content')
<div class="card" style="max-width: 600px;">
    <div class="card-body">
        <h5 class="card-title mb-4">Modifier le modèle</h5>
        <form action="{{ route('modeles.update', $modele) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Nom</label>
                <input type="text" name="nom" value="{{ old('nom', $modele->nom) }}" class="form-control @error('nom') is-invalid @enderror">
                @error('nom')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Marque</label>
                <input type="text" name="marque" value="{{ old('marque', $modele->marque) }}" class="form-control @error('marque') is-invalid @enderror">
                @error('marque')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Type</label>
                <input type="text" name="type" value="{{ old('type', $modele->type) }}" class="form-control @error('type') is-invalid @enderror">
                @error('type')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <a href="{{ route('modeles.index') }}" class="btn btn-outline-secondary">Annuler</a>
            <button type="submit" class="btn btn-dark">Enregistrer les modifications</button>
        </form>
    </div>
</div>
@endsection