<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProduitVendu extends Model
{
    use HasFactory;

    protected $table = "produit_vendus";

    protected $fillable = [
        'amount',
        'taxe',
        'qte',
        'description',
        'nom',
        'vente_id'
    ];

    public function vente()
    {
        return $this->belongsTo(Vente::class, 'vente_id');
    }
}
