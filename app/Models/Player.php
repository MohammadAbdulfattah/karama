<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    public function sport(): object
    {
        return $this->belongsTo(Sport::class);
    }

    public function plans(): object
    {
        return $this->hasMany(Plan::class);
    }
    public function replacments(): object
    {
        return $this->hasMany(Replacment::class);
    }

}
