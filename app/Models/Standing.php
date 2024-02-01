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
}
