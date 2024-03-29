<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    use HasFactory;

    public function game(): object
    {
        return $this->belongsTo(Game::class);
    }

    protected $fillable = [
        'uuid',
        'name',
        'value',
        'game_id'
    ];
}
