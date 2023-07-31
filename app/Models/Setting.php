<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed $name
 * @property mixed $num_tower
 * @property mixed $num_apt
 * @property mixed|string $logo
 * @property mixed $glossary
 */
class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'num_tower',
        'num_int',
        'num_apt',
        'logo',
        'glossary'
    ];



}
