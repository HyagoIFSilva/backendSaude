<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Remedio extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function ubs()
    {
        return $this->belongsToMany(Ubs::class, 'remedio_ubs')->withPivot('quantidade');
    }
}