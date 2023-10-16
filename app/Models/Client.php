<?php

namespace App\Models;

use App\Models\Vente;
use App\Models\Devis;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $table = "clients";

    protected $fillable = [
        'nom',
        'pays',
        'adresse',
        'tel',
        'email'
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
