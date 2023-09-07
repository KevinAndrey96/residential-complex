<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed|string $year
 * @property mixed|string $month
 * @property int|mixed $user_id
 * @method static where(array[] $array)
 */
class Payment extends Model
{
    use HasFactory;


    protected $fillable = [
        'year',
        'month',
        'user_id'
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}


