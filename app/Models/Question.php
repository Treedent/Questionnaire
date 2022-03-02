<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Question
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Questionnaire where($value,$value)
 * @mixin Eloquent
 */
class Question extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array $fillable
     */

    public $fillable = [
        'question',
        'questionnaire_id',
        'rang'
    ];
}
