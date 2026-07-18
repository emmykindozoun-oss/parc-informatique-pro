<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Composant extends Model
{
     protected $fillable = ['nom', 'type', 'etat', 'machine_id'];

    public function machine()
    {
        return $this->belongsTo(Machine::class);
    }
}
