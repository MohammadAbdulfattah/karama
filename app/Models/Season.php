<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    use HasFactory;

    public function awards(): object
    {
        return $this->hasMany(Award::class);
    }
    public function clothes(): object
    {
        return $this->hasMany(Clothe::class);
    }
    public function standings(): object
    {
        return $this->hasMany(Standing::class);
    }
    public function informations()
    {
        return $this->morphMany(Information::class, 'information_able');
    }
    public function games(): object
    {
        return $this->hasMany(Game::class);
    }
}
