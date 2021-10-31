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



}
