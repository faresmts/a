<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property User $parent_id
 * @property Species $species_id
 * @property string $race
 * @property string $color
 */
class Pet extends Model
{
    use HasFactory;
}
