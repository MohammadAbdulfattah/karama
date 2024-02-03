<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Association extends Model
{
    use HasFactory;

    public function sport(): object
    {
        return $this->belongsTo(Sport::class);
    }

    public function videos()
    {
        return $this->morphMany(Information::class, 'video_able');
    }

    public function topfan()
    {
        return $this->hasOne(Topfan::class);
    }

    protected $fillable = [
        'uuid',
        'boss',
        'image',
        'descreption',
        'country',
        'sport_id'
    ];
}
