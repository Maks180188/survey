<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $name
 * */

class Survey extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function questions(): HasMany
    {
        return $this->hasMany(Question::class);
    }
}
