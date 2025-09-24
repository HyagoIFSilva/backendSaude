<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Exame extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'tipo_exame',
        'image_path',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}