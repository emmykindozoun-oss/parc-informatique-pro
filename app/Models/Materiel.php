<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Materiel extends Model
{
    protected $fillable = ['nom', 'type', 'etat', 'quantite', 'emplacement_id'];

    public function emplacement()
    {
        return $this->belongsTo(Emplacement::class);
    }
}