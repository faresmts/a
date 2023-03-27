<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $name
 * @property Race[] $races
 */
class Species extends Model
{
    use HasFactory;

    public function race(): HasMany
    {
        return $this->hasMany(Race::class);
    }
}
