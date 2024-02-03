<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topfan extends Model
{
    use HasFactory;

    public function association(): object
    {
        return $this->belongsTo(Association::class);
    }

    protected $fillable = [
        'uuid',
        'name',
        'association_id'
    ];
}
