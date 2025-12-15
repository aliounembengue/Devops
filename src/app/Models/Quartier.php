<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Deleguequartier;
use App\Models\habitant;

class Quartier extends Model
{
    use HasFactory;

    protected $fillable = ['nomQuartier', 'description'];
public function delegue()
{
    return $this->hasOne(Deleguequartier::class, 'id_quartier'); 
    // Assure-toi que 'id_quartier' est bien la colonne dans deleguequartiers
}
public function maisons()
{
    return $this->hasMany(Maison::class);
}

// Relation "habitants" via les maisons
public function habitants()
{
    return $this->hasManyThrough(Habitant::class, Maison::class, 'quartier_id', 'id_maison', 'id', 'id');
}




}
