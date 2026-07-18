<?php

namespace App\Http\Controllers;

use App\Models\Emplacement;
use App\Models\Modele;
use App\Models\UtilisateurParc;
use App\Models\Machine;
use App\Models\Composant;
use App\Models\Materiel;
use App\Models\Logiciel;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'emplacements' => Emplacement::count(),
            'modeles' => Modele::count(),
            'utilisateurs' => UtilisateurParc::count(),
            'machines' => Machine::count(),
            'composants' => Composant::count(),
            'materiels' => Materiel::count(),
            'logiciels' => Logiciel::count(),
        ];

        $licencesExpirantBientot = Logiciel::whereNotNull('date_expiration')
            ->whereDate('date_expiration', '<=', Carbon::now()->addDays(30))
            ->orderBy('date_expiration')
            ->get();

        $dernieresMachines = Machine::with('modele')->latest()->take(5)->get();

        return view('dashboard', compact('stats', 'licencesExpirantBientot', 'dernieresMachines'));
    }
}