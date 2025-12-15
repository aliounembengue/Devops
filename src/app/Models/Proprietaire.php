<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proprietaire extends Model
{
    use HasFactory;

    // Table associée (optionnel si le nom est 'proprietaires')
    protected $table = 'proprietaires';

    // Colonnes qui peuvent être mass-assignées
    protected $fillable = [
        'nomPro',
        'prenomPro',
        'telephonePro',
        'dateNaissancePro',
        'lieuNaissancePro',
    ];

    // Relation : un propriétaire peut avoir plusieurs maisons
    public function maisons()
    {
        return $this->hasMany(Maison::class, 'proprietaire_id');
    }
}
