<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaticData extends Model
{
    use HasFactory;

    protected $table = "static_data";

    protected $fillable = [
        'type',
        'label',
        'valeur',
        'statut'
    ];
}
