<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Allergy extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'name', 'type', 'severity', 'notes'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}