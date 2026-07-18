@extends('layouts.app')

@section('title', 'Ajouter un utilisateur')

@section('content')
<div class="card" style="max-width: 650px;">
    <div class="card-body">
        <h5 class="card-title mb-4">Nouvel utilisateur</h5>
        <form action="{{ route('utilisateurs.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Nom</label>
                    <input type="text" name="nom" value="{{ old('nom') }}" class="form-control @error('nom') is-invalid @enderror">
                    @error('nom') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Prénom</label>
                    <input type="text" name="prenom" value="{{ old('prenom') }}" class="form-control @error('prenom') is-invalid @enderror">
                    @error('prenom') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror">
                @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label">Indicatif</label>
                    <select name="indicatif" class="form-select @error('indicatif') is-invalid @enderror">
                        <option value="+221" {{ old('indicatif') == '+221' ? 'selected' : '' }}>🇸🇳 Sénégal (+221)</option>
                        <option value="+225" {{ old('indicatif') == '+225' ? 'selected' : '' }}>🇨🇮 Côte d'Ivoire (+225)</option>
                        <option value="+229" {{ old('indicatif') == '+229' ? 'selected' : '' }}>🇧🇯 Bénin (+229)</option>
                        <option value="+223" {{ old('indicatif') == '+223' ? 'selected' : '' }}>🇲🇱 Mali (+223)</option>
                        <option value="+226" {{ old('indicatif') == '+226' ? 'selected' : '' }}>🇧🇫 Burkina Faso (+226)</option>
                        <option value="+228" {{ old('indicatif') == '+228' ? 'selected' : '' }}>🇹🇬 Togo (+228)</option>
                        <option value="+227" {{ old('indicatif') == '+227' ? 'selected' : '' }}>🇳🇪 Niger (+227)</option>
                        <option value="+224" {{ old('indicatif') == '+224' ? 'selected' : '' }}>🇬🇳 Guinée (+224)</option>
                        <option value="+33" {{ old('indicatif') == '+33' ? 'selected' : '' }}>🇫🇷 France (+33)</option>
                        <option value="+1" {{ old('indicatif') == '+1' ? 'selected' : '' }}>🇺🇸 États-Unis (+1)</option>
                    </select>
                    @error('indicatif') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-8 mb-3">
                    <label class="form-label">Numéro de téléphone</label>
                    <input type="text" name="telephone" value="{{ old('telephone') }}" class="form-control @error('telephone') is-invalid @enderror" placeholder="77 123 45 67">
                    @error('telephone') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Fonction</label>
                <input type="text" name="fonction" value="{{ old('fonction') }}" class="form-control">
            </div>
            <a href="{{ route('utilisateurs.index') }}" class="btn btn-outline-secondary">Annuler</a>
            <button type="submit" class="btn btn-dark">Enregistrer</button>
        </form>
    </div>
</div>
@endsection