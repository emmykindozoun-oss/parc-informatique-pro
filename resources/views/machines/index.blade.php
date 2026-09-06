@extends('layouts.app')

@section('title', 'Machines')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0">Liste des machines</h4>
    <a href="{{ route('machines.create') }}" class="btn btn-dark">
        <i class="bi bi-plus-lg"></i> Ajouter
    </a>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-hover align-middle mb-0">
            <thead>
                <tr>
                    <th>N° de série</th>
                    <th>Modèle</th>
                    <th>Emplacement</th>
                    <th>Utilisateur</th>
                    <th>Statut</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($machines as $machine)
                <tr>
                    <td>{{ $machine->numero_serie }}</td>
                    <td>{{ $machine->modele->nom }}</td>
                    <td>{{ $machine->emplacement->nom }}</td>
                    <td>{{ $machine->utilisateurParc?->nom ?? '—' }}</td>
                    <td>
                        @php
                            $badge = match($machine->statut) {
                                'En service' => 'success',
                                'En panne' => 'danger',
                                'En maintenance' => 'warning',
                                default => 'secondary',
                            };
                        @endphp
                        <span class="badge text-bg-{{ $badge }}">{{ $machine->statut }}</span>
                    </td>
                    <td class="text-end">
    @if(auth()->user()->isAdmin())
        <a href="{{ route('machines.edit', $machine) }}" class="btn btn-sm btn-outline-secondary">Modifier</a>
        <form action="{{ route('machines.destroy', $machine) }}" method="POST" class="d-inline" onsubmit="return confirm('Supprimer cette machine ?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-outline-danger">Supprimer</button>
        </form>
    @else
        <span class="text-muted small">—</span>
    @endif
</td>
                </tr>
                @endforeach
                @if ($machines->isEmpty())
                <tr>
                    <td colspan="6" class="text-center text-muted py-4">Aucune machine pour le moment.</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection