@extends('layouts.app')

@section('title', 'Emplacements')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0">Liste des emplacements</h4>
    <a href="{{ route('emplacements.create') }}" class="btn btn-dark">
        <i class="bi bi-plus-lg"></i> Ajouter
    </a>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-hover align-middle mb-0">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Description</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($emplacements as $emplacement)
                <tr>
                    <td>{{ $emplacement->nom }}</td>
                    <td>{{ $emplacement->description }}</td>
                    <td class="text-end">
                        <a href="{{ route('emplacements.edit', $emplacement) }}" class="btn btn-sm btn-outline-secondary">Modifier</a>
                        <form action="{{ route('emplacements.destroy', $emplacement) }}" method="POST" class="d-inline" onsubmit="return confirm('Supprimer cet emplacement ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @endforeach
                @if ($emplacements->isEmpty())
                <tr>
                    <td colspan="3" class="text-center text-muted py-4">Aucun emplacement pour le moment.</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection