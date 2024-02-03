<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Standing extends Model
{
    use HasFactory;

    public function club(): object
    {
        return $this->belongsTo(Club::class);
    }
    public function season(): object
    {
        return $this->belongsTo(Season::class);
    }

    protected $fillable = [
        'uuid',
        'win',
        'lose',
        'draw',
        '+/-',
        'points',
        'play',
        'season_id',
        'club_id'
    ];

    public function toArray()
    {
        return [''];
    }
}
