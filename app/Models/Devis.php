<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Devis extends Model
{
    use HasFactory;

    protected $table = "devis";

    protected $fillable = [
        'client_id',
        'employed_id',
        'date',
        'description',
        'total_amount',
        'discount',
        'statut'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function employed()
    {
        return $this->belongsTo(Employed::class, 'employed_id');
    }

    public function devisItems()
    {
        return $this->hasMany(DevisItem::class);
    }
}
