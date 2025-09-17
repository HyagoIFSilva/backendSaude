<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $titulo
 * @property string $genero
 * @property string $imagem
 * @property string $classificacao
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Filme newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Filme newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Filme query()
 * @method static \Illuminate\Database\Eloquent\Builder|Filme whereClassificacao($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Filme whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Filme whereGenero($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Filme whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Filme whereImagem($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Filme whereTitulo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Filme whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Filme extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'genero',
        'imagem',
        'classificacao'
    ];
}
