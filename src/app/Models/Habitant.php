<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // 👈 on remplace Model par Authenticatable
use Illuminate\Notifications\Notifiable;

class Habitant extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'nom',
        'prenom',
        'telephone',
        'id_maison',
        'date_naiss',
        'lieu_naiss',
        'email',      // 👈 ajouté pour l'authentification
        'password',   // 👈 ajouté pour l'authentification
    ];

    protected $hidden = [
        'password',   // 👈 on cache le mot de passe
        'remember_token',
    ];

    public function maison()
    {
        return $this->belongsTo(Maison::class, 'id_maison');
    }

    public function quartier()
    {
        return $this->belongsTo(Quartier::class);
    }
}
