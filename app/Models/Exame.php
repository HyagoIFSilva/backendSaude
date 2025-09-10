<?php

// app/Models/Exame.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exame extends Model
{
    use HasFactory;

    /**
     * Os atributos que podem ser atribuídos em massa.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'tipo_exame',
        'image_path',
    ];

    /**
     * Define o relacionamento de pertencimento a um Usuário.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}