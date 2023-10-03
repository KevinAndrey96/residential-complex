<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, int $id)
 * @method static latest()
 */
class DetailSpaceOccupation extends Model
{
    use HasFactory;

    protected $fillable = [
        'visitant_name',
        'plate',
        'apto',
        'arrival_observation',
        'departure_observation',
    ];
}
