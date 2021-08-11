<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantity',
        'date',
        'day',
        'hour',
        'user_id',
        'service_id'

    ];

    public function user()
    {
        $this->belongsTo(User::class);
    }

    public function service()
    {
        $this->belongsTo(Service::class);
    }

}
