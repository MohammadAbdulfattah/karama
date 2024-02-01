<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Award extends Model
{
    use HasFactory;

    public function season():object
    {
        return $this->belongsTo(Season::class);

    }
    public function sport():object
    {
        return $this->belongsTo(Sport::class);

    }
}
