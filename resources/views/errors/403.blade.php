<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accès refusé — Parc Informatique</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #1e293b, #334155);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: system-ui, -apple-system, sans-serif;
        }
        .error-card {
            width: 100%;
            max-width: 420px;
        }
    </style>
</head>
<body>
    <div class="card error-card shadow-lg border-0 text-center">
        <div class="card-body p-5">
            <i class="bi bi-shield-lock" style="font-size: 3rem; color: #f87171;"></i>
            <h3 class="fw-bold mt-3">Accès refusé</h3>
            <p class="text-muted">Cette action est réservée aux administrateurs du parc informatique.</p>
            <a href="{{ url('/') }}" class="btn btn-dark mt-2">
                <i class="bi bi-house"></i> Retour au tableau de bord
            </a>
        </div>
    </div>
</body>
</html>