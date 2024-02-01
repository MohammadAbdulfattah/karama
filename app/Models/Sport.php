<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sport extends Model
{
    use HasFactory;

    public function awards(): object
    {
        return $this->hasMany(Award::class);
    }
    public function players(): object
    {
        return $this->hasMany(Player::class);
    }
    public function employees(): object
    {
        return $this->hasMany(Employee::class);
    }
    public function clubs(): object
    {
        return $this->hasMany(Club::class);
    }
    public function associations(): object
    {
        return $this->hasMany(Association::class);
    }
    public function informations()
    {
        return $this->morphMany(Information::class, 'information_able');
    }
}
