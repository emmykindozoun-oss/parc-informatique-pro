<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Machine extends Model
{
    protected $fillable = ['numero_serie', 'statut', 'modele_id', 'emplacement_id', 'utilisateur_parc_id'];

    public function modele()
    {
        return $this->belongsTo(Modele::class);
    }

    public function emplacement()
    {
        return $this->belongsTo(Emplacement::class);
    }

    public function utilisateurParc()
    {
        return $this->belongsTo(UtilisateurParc::class);
    }
}