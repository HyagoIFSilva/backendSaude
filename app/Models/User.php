<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin', 
        'cep',
        'logradouro', 
        'numero',
        'bairro',
        'cidade',
        'uf',
        'altura',
        'peso',
        'blood_type',
        'avatar',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_admin' => 'boolean',
    ];

    public function exames()
    {
        return $this->hasMany(Exame::class);
    }

    public function waterIntakes()
    {
        return $this->hasMany(WaterIntake::class);
    }

    public function allergies()
    {
        return $this->hasMany(Allergy::class);
    }

    public function glucoseReadings()
    {
        return $this->hasMany(GlucoseReading::class);
    }

    public function symptoms()
    {
        return $this->hasMany(Symptom::class);
    }

    public function vaccines()
    {
        return $this->hasMany(vaccine::class);
    }
    
} 