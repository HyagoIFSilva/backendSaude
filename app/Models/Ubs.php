<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ubs extends Model
{
    use HasFactory;
    protected $table = 'ubs'; 
    protected $guarded = []; 

    public function remedios()
    {
        return $this->belongsToMany(Remedio::class, 'remedio_ubs')->withPivot('quantidade');
    }
}