<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubQuestion extends Question
{
    protected $table = 'questions';

    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class, 'parent_id', 'id');
    }

}
