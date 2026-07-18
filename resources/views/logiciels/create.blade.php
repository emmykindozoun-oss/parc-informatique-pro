@extends('layouts.app')

@section('content')
<h2 class="mb-4"><i class="bi bi-cd"></i> Ajouter un logiciel</h2>

<div class="card shadow-sm">
    <div class="card-body">
        <form action="{{ route('logiciels.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Nom du logiciel</label>
                <input type="text" name="nom" class="form-control @error('nom') is-invalid @enderror" value="{{ old('nom') }}">
                @error('nom')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Éditeur</label>
                <input type="text" name="editeur" class="form-control @error('editeur') is-invalid @enderror" value="{{ old('editeur') }}">
                @error('editeur')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Version</label>
                <input type="text" name="version" class="form-control @error('version') is-invalid @enderror" value="{{ old('version') }}">
                @error('version')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Licence</label>
                <input type="text" name="licence" class="form-control @error('licence') is-invalid @enderror" value="{{ old('licence') }}">
                @error('licence')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Date d'expiration</label>
                <input type="date" name="date_expiration" class="form-control @error('date_expiration') is-invalid @enderror" value="{{ old('date_expiration') }}">
                @error('date_expiration')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Machine associée</label>
                <select name="machine_id" class="form-select @error('machine_id') is-invalid @enderror">
                    <option value="">-- Aucune --</option>
                    @foreach($machines as $machine)
                        <option value="{{ $machine->id }}" {{ old('machine_id') == $machine->id ? 'selected' : '' }}>
                            {{ $machine->numero_serie }}
                        </option>
                    @endforeach
                </select>
                @error('machine_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <button type="submit" class="btn btn-primary">Enregistrer</button>
            <a href="{{ route('logiciels.index') }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
</div>
@endsection