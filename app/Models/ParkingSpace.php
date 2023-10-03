<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static orderBy(string $string, string $string1)
 * @method static where(string $string, int $id)
 * @property mixed|string $num
 * @property int|mixed $status
 * @property int|mixed $enabled
 * @property int|mixed $parking_id
 * @property mixed|string $type
 */
class ParkingSpace extends Model
{
    use HasFactory;

    protected $fillable = [
        'num',
        'status',
        'enabled',
        'type',
        'parking_id'
    ];

    public function parking()
    {
        return $this->belongsTo(Parking::class);
    }
}
