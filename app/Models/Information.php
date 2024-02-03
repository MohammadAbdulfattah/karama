<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    use HasFactory;

    public function informationable()
    {
        return $this->morphTo();
    }

    protected $fillable = [
        'uuid',
        'title',
        'content',
        'image',
        'views',
        'type',
        'information_able_type',
        'information_able_id'
    ];
}
