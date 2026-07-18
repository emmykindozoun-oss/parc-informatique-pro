@extends('layouts.app')

@section('title', 'Utilisateurs du parc')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0">Liste des utilisateurs</h4>
    <a href="{{ route('utilisateurs.create') }}" class="btn btn-dark">
        <i class="bi bi-plus-lg"></i> Ajouter
    </a>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-hover align-middle mb-0">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                    <th>Fonction</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($utilisateurs as $utilisateur)
                <tr>
                    <td>{{ $utilisateur->nom }}</td>
                    <td>{{ $utilisateur->prenom }}</td>
                    <td>{{ $utilisateur->email }}</td>
                    <td>{{ $utilisateur->indicatif }} {{ $utilisateur->telephone }}</td>
                    <td>{{ $utilisateur->fonction }}</td>
                    <td class="text-end">
                        <a href="{{ route('utilisateurs.edit', $utilisateur) }}" class="btn btn-sm btn-outline-secondary">Modifier</a>
                        <form action="{{ route('utilisateurs.destroy', $utilisateur) }}" method="POST" class="d-inline" onsubmit="return confirm('Supprimer cet utilisateur ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @endforeach
                @if ($utilisateurs->isEmpty())
                <tr>
                    <td colspan="6" class="text-center text-muted py-4">Aucun utilisateur pour le moment.</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection