<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    use HasFactory;

    public function sport(): object
    {
        return $this->belongsTo(Sport::class);
    }
    public function standings(): object
    {
        return $this->hasMany(Standing::class);
    }
    public function informations()
    {
        return $this->morphMany(Information::class, 'information_able');
    }
    public function videos()
    {
        return $this->morphMany(Video::class, 'video_able');
    }
    public function Games():object
    {
        return $this->hasMany(Game::class);
    }

    protected $fillable = [
        'uuid',
        'name',
        'address',
        'logo',
        'sport_id'
    ];
}
