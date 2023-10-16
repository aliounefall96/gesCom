<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DevisItem extends Model
{
    use HasFactory;

    protected $table = "devis_items";

    protected $fillable = [
        'amount',
        'taxe',
        'qte',
        'description',
        'nom',
        'devis_id'
    ];

    public function devis()
    {
        return $this->belongsTo(Devis::class, 'devis_id');
    }
}
