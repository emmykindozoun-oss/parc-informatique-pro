<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Controllers\EmplacementController;
use App\Http\Controllers\ModeleController;
use App\Http\Controllers\UtilisateurParcController;
use App\Http\Controllers\MachineController;
use App\Http\Controllers\ComposantController;
use App\Http\Controllers\MaterielController;
use App\Http\Controllers\LogicielController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.attempt');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Connexion automatique en 1 clic pour les visiteurs
Route::post('/demo-login', function () {
    $demoUser = User::where('email', 'demo@parc-info.com')->first();

    if ($demoUser) {
        Auth::login($demoUser);
        request()->session()->regenerate();
        return redirect()->route('dashboard');
    }

    return back()->withErrors(['email' => 'Le compte de démonstration est introuvable.']);
})->name('demo.login');

Route::middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Consultation + ajout : accessible à tout compte connecté (admin ou utilisateur simple)
    Route::resource('emplacements', EmplacementController::class)->only(['index', 'create', 'store', 'show']);
    Route::resource('modeles', ModeleController::class)->only(['index', 'create', 'store', 'show']);
    Route::resource('utilisateurs', UtilisateurParcController::class)->parameters(['utilisateurs' => 'utilisateurParc'])->only(['index', 'create', 'store', 'show']);
    Route::resource('machines', MachineController::class)->only(['index', 'create', 'store', 'show']);
    Route::resource('composants', ComposantController::class)->only(['index', 'create', 'store', 'show']);
    Route::resource('materiels', MaterielController::class)->only(['index', 'create', 'store', 'show']);
    Route::resource('logiciels', LogicielController::class)->only(['index', 'create', 'store', 'show']);

    // Modification + suppression : admin uniquement
    Route::middleware('admin')->group(function () {
        Route::resource('emplacements', EmplacementController::class)->only(['edit', 'update', 'destroy']);
        Route::resource('modeles', ModeleController::class)->only(['edit', 'update', 'destroy']);
        Route::resource('utilisateurs', UtilisateurParcController::class)->parameters(['utilisateurs' => 'utilisateurParc'])->only(['edit', 'update', 'destroy']);
        Route::resource('machines', MachineController::class)->only(['edit', 'update', 'destroy']);
        Route::resource('composants', ComposantController::class)->only(['edit', 'update', 'destroy']);
        Route::resource('materiels', MaterielController::class)->only(['edit', 'update', 'destroy']);
        Route::resource('logiciels', LogicielController::class)->only(['edit', 'update', 'destroy']);
    });
});
