<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Habitant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'age',
        'document_type',
        'document',
        'occupation',
        'kinship',
        'user_id'

    ];

    public function resident()
    {
        return $this->belongsTo(Resident::class);
    }
}
