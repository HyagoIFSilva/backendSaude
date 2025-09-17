<?php

// app/Models/Exame.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property int $user_id
 * @property string $tipo_exame
 * @property string $image_path
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Exame newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Exame newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Exame onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Exame query()
 * @method static \Illuminate\Database\Eloquent\Builder|Exame whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Exame whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Exame whereImagePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Exame whereTipoExame($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Exame whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Exame whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Exame withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Exame withoutTrashed()
 * @mixin \Eloquent
 */
class Exame extends Model
{
    use HasFactory, SoftDeletes;

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