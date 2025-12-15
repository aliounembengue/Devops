<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    use HasFactory;

    protected $fillable = [
        'habitant_id',
        'delegue_id',
        'nom_complet',
        'date_naissance',
        'lieu_naissance',
        'nationalite',
        'annee_residence',
        'nom_proprietaire',
        'numero_maison',
        'quartier_id',
        'statut',
        'piece_justificative', // ✅ ajout
        'certificat_path',     // ✅ ajout pour stocker le PDF généré
    ];

    // Relation avec Habitant
    public function habitant()
    {
        return $this->belongsTo(Habitant::class);
    }

    // Relation avec Délégué
    public function delegue()
    {
        return $this->belongsTo(DelegueQuartier::class, 'delegue_id');
    }

    // Relation avec Quartier
    public function quartier()
    {
        return $this->belongsTo(Quartier::class);
    }
}
