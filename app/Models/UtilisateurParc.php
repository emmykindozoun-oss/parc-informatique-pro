<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UtilisateurParc extends Model
{
    protected $fillable = ['nom', 'prenom', 'email', 'indicatif', 'telephone', 'fonction'];
}
