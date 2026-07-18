@extends('layouts.app')

@section('title', 'Modèles')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0">Liste des modèles</h4>
    <a href="{{ route('modeles.create') }}" class="btn btn-dark">
        <i class="bi bi-plus-lg"></i> Ajouter
    </a>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-hover align-middle mb-0">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Marque</th>
                    <th>Type</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($modeles as $modele)
                <tr>
                    <td>{{ $modele->nom }}</td>
                    <td>{{ $modele->marque }}</td>
                    <td>{{ $modele->type }}</td>
                    <td class="text-end">
                        <a href="{{ route('modeles.edit', $modele) }}" class="btn btn-sm btn-outline-secondary">Modifier</a>
                        <form action="{{ route('modeles.destroy', $modele) }}" method="POST" class="d-inline" onsubmit="return confirm('Supprimer ce modèle ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @endforeach
                @if ($modeles->isEmpty())
                <tr>
                    <td colspan="4" class="text-center text-muted py-4">Aucun modèle pour le moment.</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection