<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    public function sport(): object
    {
        return $this->belongsTo(sport::class);
    }
    
    protected $fillable = [
        'uuid',
        'name',
        'job_type',
        'work',
        'sport_id'
    ];
}
