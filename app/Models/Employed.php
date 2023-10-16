<?php

namespace App\Models;

use App\Models\Devis;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employed extends Model
{
    use HasFactory;

    protected $table = "employeds";

    protected $fillable = [
        'prenom',
        'nom',
        'email',
        'tel',
        'fonction',
        'adresse',
        'sexe',
        'profil',
    ];

    public function vente()
    {
        return $this->hasOne(Vente::class);
    }

    public function devis()
    {
        return $this->hasOne(Devis::class);
    }
}
