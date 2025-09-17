<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $nome
 * @property string $email
 * @property string $mensagem
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Contato newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Contato newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Contato query()
 * @method static \Illuminate\Database\Eloquent\Builder|Contato whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contato whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contato whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contato whereMensagem($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contato whereNome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contato whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Contato extends Model
{
    use HasFactory;
    protected $table='contato';

        protected $fillable = [
        'nome',
        'email',
        'mensagem'        
    ];
}