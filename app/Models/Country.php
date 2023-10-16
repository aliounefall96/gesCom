<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $table = "countries";

    protected $fillable = [
        'code',
        'alpha2',
        'alpha3',
        'nom_en',
        'nom_fr'
    ];
}
