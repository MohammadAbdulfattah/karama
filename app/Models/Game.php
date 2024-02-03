<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    public function plans(): object
    {
        return $this->hasMany(Plan::class);
    }
    public function Statistics(): object
    {
        return $this->hasMany(Statistic::class);
    }
    public function games(): object
    {
        return $this->hasMany(Game::class);
    }
    public function club1(): object
    {
        return $this->belongsTo(Game::class, 'club1_id');
    }
    public function club2(): object
    {
        return $this->belongsTo(Game::class, 'club2_id');
    }
    public function season(): object
    {
        return $this->belongsTo(Season::class);
    }
    public function informations()
    {
        return $this->morphMany(Information::class,'information_able');
    }
    public function videos()
    {
        return $this->morphMany(Information::class,'video_able');
    }

    protected $fillable = [
        'uuid',
        'when',
        'status',
        'plan',
        'channel',
        'round',
        'play_ground',
        'season_id',
        'club1_id',
        'club2_id'
    ];
}
