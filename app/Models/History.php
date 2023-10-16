<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DateTime;
use Illuminate\Support\Facades\Auth;


class History extends Model
{
    use HasFactory;

    protected $table = "histories";

    protected $fillable = [
        'description',
        'date',
        'type',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function addHistorique($message, $type)
    {
        
        History::create([
            'description' => $message,
            'type' => $type,
            'date' => new DateTime(),
            'user_id' => Auth::user()->id
        ]);
    }
}
