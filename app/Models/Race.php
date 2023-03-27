<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property string $name
 * @property Species $species_id
 */
class Race extends Model
{
    use HasFactory;

    public function species(): BelongsTo
    {
        return $this->belongsTo(Species::class);
    }
}
