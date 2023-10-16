<?php

namespace App\Models;

use App\Models\Client;
use App\Models\Employed;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vente extends Model
{
    use HasFactory;

    protected $table = "ventes";

    protected $fillable = [
        'client_id',
        'employed_id',
        'date',
        'description',
        'total_amount',
        'discount'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function employed()
    {
        return $this->belongsTo(Employed::class, 'employed_id');
    }

    public function produitVendus()
    {
        return $this->hasMany(ProduitVendu::class);
    }
}
