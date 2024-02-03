<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Replacment extends Model
{
    use HasFactory;

    public function game(): object
    {
        return $this->belongsTo(Game::class);
    }
    public function inPlayer(): object
    {
        return $this->belongsTo(Game::class,'inPlayer_id');
    }
    public function outPlayer(): object
    {
        return $this->belongsTo(Game::class,'outPlayer_id');
    }

    protected $fillable = [
        'uuid',
        'inPlayer_id',
        'outPlayer_id',
        'game_id'
    ];
}
