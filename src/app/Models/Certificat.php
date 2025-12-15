<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificat extends Model
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
        'quartier',
        'status',
    ];

    public function habitant()
    {
        return $this->belongsTo(Habitant::class);
    }

    public function delegue()
    {
        return $this->belongsTo(User::class, 'delegue_id');
    }
}
