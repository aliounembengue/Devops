<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Deleguequartier extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_habitant',
        'id_quartier',
        'email',
        'password'
    ];

   // Deleguequartier.php
public function habitant()
{
    return $this->belongsTo(Habitant::class, 'id_habitant');
}


    public function quartier()
    {
        return $this->belongsTo(Quartier::class, 'id_quartier');
    }

    public function certificats()
    {
        return $this->hasMany(Certificat::class, 'id_delegue');
    }
  public function user()
{
    return $this->belongsTo(User::class, 'user_id'); 
    // Assure-toi que la colonne 'user_id' contient bien l'id du compte User
}

}
