@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="mb-0"><i class="bi bi-cd"></i> Logiciels</h2>
    <a href="{{ route('logiciels.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i> Ajouter un logiciel
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card shadow-sm">
    <div class="card-body">
        <table class="table table-hover align-middle">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Éditeur</th>
                    <th>Version</th>
                    <th>Licence</th>
                    <th>Expiration</th>
                    <th>Machine</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($logiciels as $logiciel)
                    @php
                        $expire = $logiciel->date_expiration;
                        $badge = 'secondary';
                        if ($expire) {
                            $badge = \Carbon\Carbon::parse($expire)->isPast() ? 'danger' : 'success';
                        }
                    @endphp
                    <tr>
                        <td>{{ $logiciel->nom }}</td>
                        <td>{{ $logiciel->editeur }}</td>
                        <td>{{ $logiciel->version ?? '—' }}</td>
                        <td>{{ $logiciel->licence }}</td>
                        <td>
                            @if($expire)
                                <span class="badge bg-{{ $badge }}">{{ \Carbon\Carbon::parse($expire)->format('d/m/Y') }}</span>
                            @else
                                <span class="text-muted">—</span>
                            @endif
                        </td>
                        <td>{{ $logiciel->machine?->numero_serie ?? '—' }}</td>
                        <td class="text-end">
    @if(auth()->user()->isAdmin())
        <a href="{{ route('logiciels.edit', $logiciel) }}" class="btn btn-sm btn-outline-primary">
            <i class="bi bi-pencil"></i>
        </a>
        <form action="{{ route('logiciels.destroy', $logiciel) }}" method="POST" class="d-inline" onsubmit="return confirm('Supprimer ce logiciel ?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-outline-danger">
                <i class="bi bi-trash"></i>
            </button>
        </form>
    @else
        <span class="text-muted small">—</span>
    @endif
</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted py-4">Aucun logiciel enregistré.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection