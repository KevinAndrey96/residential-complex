<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'race',
        'color',
        'age',
        'policy',
        'card',
        'dangerous',
        'plaque',
        'species'

    ];

    public function resident()
    {
        return $this->belongsTo(Resident::class);
    }
}
