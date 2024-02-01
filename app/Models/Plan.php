<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    public function players(): object
    {
        return $this->belongsTo(Player::class);
    }
    public function games(): object
    {
        return $this->belongsTo(Game::class);
    }
}
