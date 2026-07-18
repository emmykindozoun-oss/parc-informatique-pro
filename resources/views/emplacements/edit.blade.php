@extends('layouts.app')

@section('title', 'Modifier un emplacement')

@section('content')
<div class="card" style="max-width: 600px;">
    <div class="card-body">
        <h5 class="card-title mb-4">Modifier l'emplacement</h5>
        <form action="{{ route('emplacements.update', $emplacement) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Nom</label>
                <input type="text" name="nom" value="{{ old('nom', $emplacement->nom) }}" class="form-control @error('nom') is-invalid @enderror">
                @error('nom')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" rows="3" class="form-control">{{ old('description', $emplacement->description) }}</textarea>
            </div>
            <a href="{{ route('emplacements.index') }}" class="btn btn-outline-secondary">Annuler</a>
            <button type="submit" class="btn btn-dark">Enregistrer les modifications</button>
        </form>
    </div>
</div>
@endsection