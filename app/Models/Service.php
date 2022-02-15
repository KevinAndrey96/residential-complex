<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed $id
 */
class Service extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'capacity',
        'strip',
        'start',
        'final',
        'state',
        'gallery',
        'monday',
        'tuesday',
        'wednesday',
        'thursday',
        'friday',
        'saturday',
        'sunday',



        ];


}
