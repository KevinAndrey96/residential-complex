<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resident extends Model
{
    use HasFactory;
    protected $fillable = [
        'tower',
        'apt',
        'status',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function extra()
    {
        return $this->hasOne(Extra::class);
    }

    public function habitant()
    {
        return $this->hasMany(Habitant::class);
    }

    public function transport()
    {
        return $this->hasMany(Transport::class);
    }

    public function pet()
    {
        return $this->hasMany(Pet::class);
    }

}
