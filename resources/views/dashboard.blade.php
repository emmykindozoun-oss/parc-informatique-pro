@extends('layouts.app')

@section('title', 'Tableau de bord')

@section('content')
<h2 class="mb-4 fw-bold" style="color: #1e293b;">Vue d'ensemble</h2>

<div class="row g-3 mb-4">
    <div class="col-6 col-md-3">
        <div class="card border-0 shadow-sm h-100" style="border-left: 4px solid #1e293b !important;">
            <div class="card-body">
                <div class="text-muted small text-uppercase">Emplacements</div>
                <div class="fs-2 fw-bold" style="color: #1e293b;">{{ $stats['emplacements'] }}</div>
                <i class="bi bi-geo-alt position-absolute top-0 end-0 m-3 fs-4 text-secondary opacity-25"></i>
            </div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="card border-0 shadow-sm h-100" style="border-left: 4px solid #334155 !important;">
            <div class="card-body">
                <div class="text-muted small text-uppercase">Modèles</div>
                <div class="fs-2 fw-bold" style="color: #334155;">{{ $stats['modeles'] }}</div>
                <i class="bi bi-box-seam position-absolute top-0 end-0 m-3 fs-4 text-secondary opacity-25"></i>
            </div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="card border-0 shadow-sm h-100" style="border-left: 4px solid #475569 !important;">
            <div class="card-body">
                <div class="text-muted small text-uppercase">Utilisateurs</div>
                <div class="fs-2 fw-bold" style="color: #475569;">{{ $stats['utilisateurs'] }}</div>
                <i class="bi bi-people position-absolute top-0 end-0 m-3 fs-4 text-secondary opacity-25"></i>
            </div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="card border-0 shadow-sm h-100" style="border-left: 4px solid #0f766e !important;">
            <div class="card-body">
                <div class="text-muted small text-uppercase">Machines</div>
                <div class="fs-2 fw-bold" style="color: #0f766e;">{{ $stats['machines'] }}</div>
                <i class="bi bi-pc-display position-absolute top-0 end-0 m-3 fs-4 text-secondary opacity-25"></i>
            </div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="card border-0 shadow-sm h-100" style="border-left: 4px solid #0e7490 !important;">
            <div class="card-body">
                <div class="text-muted small text-uppercase">Composants</div>
                <div class="fs-2 fw-bold" style="color: #0e7490;">{{ $stats['composants'] }}</div>
                <i class="bi bi-cpu position-absolute top-0 end-0 m-3 fs-4 text-secondary opacity-25"></i>
            </div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="card border-0 shadow-sm h-100" style="border-left: 4px solid #164e63 !important;">
            <div class="card-body">
                <div class="text-muted small text-uppercase">Matériels</div>
                <div class="fs-2 fw-bold" style="color: #164e63;">{{ $stats['materiels'] }}</div>
                <i class="bi bi-printer position-absolute top-0 end-0 m-3 fs-4 text-secondary opacity-25"></i>
            </div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="card border-0 shadow-sm h-100" style="border-left: 4px solid #1e3a5f !important;">
            <div class="card-body">
                <div class="text-muted small text-uppercase">Logiciels</div>
                <div class="fs-2 fw-bold" style="color: #1e3a5f;">{{ $stats['logiciels'] }}</div>
                <i class="bi bi-cd position-absolute top-0 end-0 m-3 fs-4 text-secondary opacity-25"></i>
            </div>
        </div>
    </div>
</div>

<div class="row g-3">
    <div class="col-md-6">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-header bg-white border-0 pt-3">
                <h6 class="fw-bold mb-0"><i class="bi bi-exclamation-triangle text-warning"></i> Licences arrivant à expiration (30 jours)</h6>
            </div>
            <div class="card-body">
                @forelse($licencesExpirantBientot as $logiciel)
                    <div class="d-flex justify-content-between align-items-center py-2 border-bottom">
                        <span>{{ $logiciel->nom }}</span>
                        <span class="badge bg-warning text-dark">{{ \Carbon\Carbon::parse($logiciel->date_expiration)->format('d/m/Y') }}</span>
                    </div>
                @empty
                    <p class="text-muted mb-0">Aucune licence proche de l'expiration.</p>
                @endforelse
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-header bg-white border-0 pt-3">
                <h6 class="fw-bold mb-0"><i class="bi bi-clock-history text-secondary"></i> Dernières machines ajoutées</h6>
            </div>
            <div class="card-body">
                @forelse($dernieresMachines as $machine)
                    <div class="d-flex justify-content-between align-items-center py-2 border-bottom">
                        <span>{{ $machine->numero_serie }}</span>
                        <span class="text-muted small">{{ $machine->modele?->nom ?? '—' }}</span>
                    </div>
                @empty
                    <p class="text-muted mb-0">Aucune machine enregistrée.</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection