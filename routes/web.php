<?php

use Illuminate\Support\Facades\Route;
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

Route::middleware('auth')->group(function () {
   Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('emplacements', EmplacementController::class);
    Route::resource('modeles', ModeleController::class);
Route::resource('utilisateurs', UtilisateurParcController::class)->parameters(['utilisateurs' => 'utilisateurParc']);    Route::resource('machines', MachineController::class);
    Route::resource('composants', ComposantController::class);
    Route::resource('materiels', MaterielController::class);
    Route::resource('logiciels', LogicielController::class);
});