<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Parc Informatique')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body { background-color: #f4f6f9; }
        .sidebar { min-height: 100vh; background-color: #1e293b; }
        .sidebar a { color: #cbd5e1; text-decoration: none; }
        .sidebar a.active, .sidebar a:hover { color: #fff; background-color: #334155; }
        .navbar-brand { font-weight: 700; }
        .card { border: none; box-shadow: 0 1px 3px rgba(0,0,0,0.08); }
    </style>
</head>
<body>
<div class="d-flex">
    <nav class="sidebar p-3" style="width: 240px;">
        <a href="/" class="navbar-brand text-white d-block mb-4 fs-4"><i class="bi bi-hdd-stack"></i> Parc Info</a>
        <ul class="nav nav-pills flex-column gap-1">
            <li class="nav-item">
    <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
        <i class="bi bi-speedometer2"></i> Tableau de bord
    </a>
</li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('emplacements.*') ? 'active' : '' }}" href="{{ route('emplacements.index') }}">
                    <i class="bi bi-geo-alt"></i> Emplacements
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('modeles.*') ? 'active' : '' }}" href="{{ route('modeles.index') }}">
                    <i class="bi bi-box-seam"></i> Modèles
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('utilisateurs.*') ? 'active' : '' }}" href="{{ route('utilisateurs.index') }}">
                    <i class="bi bi-people"></i> Utilisateurs
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('machines.*') ? 'active' : '' }}" href="{{ route('machines.index') }}">
                    <i class="bi bi-pc-display"></i> Machines
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('composants.*') ? 'active' : '' }}" href="{{ route('composants.index') }}">
                    <i class="bi bi-cpu"></i> Composants
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('materiels.*') ? 'active' : '' }}" href="{{ route('materiels.index') }}">
                    <i class="bi bi-printer"></i> Matériels
                </a>
            </li>
            <li class="nav-item">
    <a class="nav-link {{ request()->routeIs('logiciels.*') ? 'active' : '' }}" href="{{ route('logiciels.index') }}">
        <i class="bi bi-cd"></i> Logiciels
    </a>
</li>
</ul>
<hr class="text-secondary">
<form action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit" class="btn btn-link nav-link text-start w-100 p-2" style="color: #f87171;">
    <i class="bi bi-box-arrow-right"></i> Déconnexion
</button>
</form>
        
    </nav>
    <div class="flex-grow-1">
        <nav class="navbar navbar-light bg-white border-bottom px-4 py-3">
            <span class="fw-semibold">@yield('title', 'Tableau de bord')</span>
        </nav>
        <main class="p-4">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            @yield('content')
        </main>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>