<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $nome
 * @property string|null $usuario_instagram
 * @property string|null $imagem
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Membro newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Membro newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Membro query()
 * @method static \Illuminate\Database\Eloquent\Builder|Membro whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Membro whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Membro whereImagem($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Membro whereNome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Membro whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Membro whereUsuarioInstagram($value)
 * @mixin \Eloquent
 */
class Membro extends Model
{
    protected $fillable = ['nome', 'usuario_instagram', 'imagem'];
}