@extends('layouts.app')

@section('title', 'Matériels')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0">Liste des matériels</h4>
    <a href="{{ route('materiels.create') }}" class="btn btn-dark">
        <i class="bi bi-plus-lg"></i> Ajouter
    </a>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-hover align-middle mb-0">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Type</th>
                    <th>État</th>
                    <th>Quantité</th>
                    <th>Emplacement</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($materiels as $materiel)
                <tr>
                    <td>{{ $materiel->nom }}</td>
                    <td>{{ $materiel->type }}</td>
                    <td>
                        @php
                            $badge = match($materiel->etat) {
                                'Neuf' => 'success',
                                'Bon' => 'primary',
                                'Usé' => 'warning',
                                'Défectueux' => 'danger',
                                default => 'secondary',
                            };
                        @endphp
                        <span class="badge text-bg-{{ $badge }}">{{ $materiel->etat }}</span>
                    </td>
                    <td>{{ $materiel->quantite }}</td>
                    <td>{{ $materiel->emplacement?->nom ?? '—' }}</td>
                    <td class="text-end">
                        <a href="{{ route('materiels.edit', $materiel) }}" class="btn btn-sm btn-outline-secondary">Modifier</a>
                        <form action="{{ route('materiels.destroy', $materiel) }}" method="POST" class="d-inline" onsubmit="return confirm('Supprimer ce matériel ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @endforeach
                @if ($materiels->isEmpty())
                <tr>
                    <td colspan="6" class="text-center text-muted py-4">Aucun matériel pour le moment.</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection