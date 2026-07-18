<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Logiciel extends Model
{
    protected $fillable = ['nom', 'editeur', 'version', 'licence', 'date_expiration', 'machine_id'];

    public function machine()
    {
        return $this->belongsTo(Machine::class);
    }
}