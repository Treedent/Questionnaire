<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Reponse
 *
 * @property int $id
 * @property string $reponse
 * @property int $question_id
 * @property string $email
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Reponse newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Reponse newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Reponse query()
 * @method static \Illuminate\Database\Eloquent\Builder|Reponse whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reponse whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reponse whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reponse whereQuestionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reponse whereReponse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reponse whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Reponse extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array $fillable
     */

    public $fillable = [
        'reponse',
        'question_id',
        'email'
    ];
}
