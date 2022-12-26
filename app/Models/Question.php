<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use PhpParser\Builder;

/**
 * @property int $id
 * @property int $parent_id
 * @property int $survey_id
 */
class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'survey_id',
        'parent_id',
        'survey_question_sequence_number',
        'value'
    ];

    public function survey(): HasOne
    {
        return $this->hasOne(Survey::class);
    }

    public function subQuestions(): HasMany
    {
        return $this->hasMany(Question::class, 'parent_id', 'id');
    }

    public static function questions(Builder $builder): Builder
    {
        return $builder->where('parent_id', null);
    }
}
