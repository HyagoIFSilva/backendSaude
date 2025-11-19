<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes; // <-- Importante para desativar conta

class User extends Authenticatable
{
    // Adicionado SoftDeletes aqui também
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
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
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_admin' => 'boolean',
    ];

    /**
     * Relacionamento com Exames
     */
    public function exames()
    {
        return $this->hasMany(Exame::class);
    }

    /**
     * Relacionamento com Consumo de Água
     */
    public function waterIntakes()
    {
        return $this->hasMany(WaterIntake::class);
    }

    /**
     * Relacionamento com Alergias (ADICIONADO)
     */
    public function allergies()
    {
        return $this->hasMany(Allergy::class);
    }
}