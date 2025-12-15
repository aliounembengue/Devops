<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maison extends Model
{
    use HasFactory;

    protected $fillable = [
        'surface',
        'rue',
        'quartier_id', // <-- ajouter ceci
    ];

    public function quartier()
    {
        return $this->belongsTo(Quartier::class);
    }
    public function proprietaire()
{
    return $this->belongsTo(Proprietaire::class, 'proprietaire_id');
}
public function habitants()
    {
        return $this->hasMany(Habitant::class, 'id_maison');
    }

}