<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed $name
 * @property mixed $capacity
 * @property mixed $type
 * @property mixed $id
 */
class Parking extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'capacity',
        'type',
        'is_deleted'
    ];
}
