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
        'user_id',
        'howcontribute',
        'themes',
        'name_invoice',
        'phone_invoice',
        'address_invoice',
        'razon_realestate',
        'nit_realestate',
        'name_realestate',
        'email_realestate',
        'phone_realestate'
    ];

    public function resident()
    {
        return $this->belongsTo(Resident::class);
    }
}
