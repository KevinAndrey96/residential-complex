<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Extra extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'residenttype',
        'document_type',
        'document',
        'email',
        'phone',
        'mobile',
        'livein',
        'job',
        'address',
        'lesseealert',
        'depositnum',
        'cardnum',
        'dateadmission',
        'resident_id'
    ];

    public function resident()
    {
        return $this->belongsTo(Resident::class);
    }
}
