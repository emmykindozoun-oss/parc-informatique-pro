@extends('layouts.app')

@section('title', 'Modifier un utilisateur')

@section('content')
<div class="card" style="max-width: 650px;">
    <div class="card-body">
        <h5 class="card-title mb-4">Modifier l'utilisateur</h5>
        <form action="{{ route('utilisateurs.update', $utilisateurParc->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Nom</label>
                    <input type="text" name="nom" value="{{ old('nom', $utilisateurParc->nom) }}" class="form-control @error('nom') is-invalid @enderror">
                    @error('nom') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Prénom</label>
                    <input type="text" name="prenom" value="{{ old('prenom', $utilisateurParc->prenom) }}" class="form-control @error('prenom') is-invalid @enderror">
                    @error('prenom') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" value="{{ old('email', $utilisateurParc->email) }}" class="form-control @error('email') is-invalid @enderror">
                @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label">Indicatif</label>
                    <select name="indicatif" class="form-select @error('indicatif') is-invalid @enderror">
                        <option value="+221" {{ old('indicatif', $utilisateurParc->indicatif) == '+221' ? 'selected' : '' }}>🇸🇳 Sénégal (+221)</option>
                        <option value="+225" {{ old('indicatif', $utilisateurParc->indicatif) == '+225' ? 'selected' : '' }}>🇨🇮 Côte d'Ivoire (+225)</option>
                        <option value="+229" {{ old('indicatif', $utilisateurParc->indicatif) == '+229' ? 'selected' : '' }}>🇧🇯 Bénin (+229)</option>
                        <option value="+223" {{ old('indicatif', $utilisateurParc->indicatif) == '+223' ? 'selected' : '' }}>🇲🇱 Mali (+223)</option>
                        <option value="+226" {{ old('indicatif', $utilisateurParc->indicatif) == '+226' ? 'selected' : '' }}>🇧🇫 Burkina Faso (+226)</option>
                        <option value="+228" {{ old('indicatif', $utilisateurParc->indicatif) == '+228' ? 'selected' : '' }}>🇹🇬 Togo (+228)</option>
                        <option value="+227" {{ old('indicatif', $utilisateurParc->indicatif) == '+227' ? 'selected' : '' }}>🇳🇪 Niger (+227)</option>
                        <option value="+224" {{ old('indicatif', $utilisateurParc->indicatif) == '+224' ? 'selected' : '' }}>🇬🇳 Guinée (+224)</option>
                        <option value="+33" {{ old('indicatif', $utilisateurParc->indicatif) == '+33' ? 'selected' : '' }}>🇫🇷 France (+33)</option>
                        <option value="+1" {{ old('indicatif', $utilisateurParc->indicatif) == '+1' ? 'selected' : '' }}>🇺🇸 États-Unis (+1)</option>
                    </select>
                    @error('indicatif') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-8 mb-3">
                    <label class="form-label">Numéro de téléphone</label>
                    <input type="text" name="telephone" value="{{ old('telephone', $utilisateurParc->telephone) }}" class="form-control @error('telephone') is-invalid @enderror">
                    @error('telephone') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Fonction</label>
                <input type="text" name="fonction" value="{{ old('fonction', $utilisateurParc->fonction) }}" class="form-control">
            </div>
            <a href="{{ route('utilisateurs.index') }}" class="btn btn-outline-secondary">Annuler</a>
            <button type="submit" class="btn btn-dark">Enregistrer les modifications</button>
        </form>
    </div>
</div>
@endsection