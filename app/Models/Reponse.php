<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Question
 *
 * @method static Builder|Questionnaire where($value,$value)
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

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

}
