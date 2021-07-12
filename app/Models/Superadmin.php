<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Superadmin extends Model
{
    use HasFactory;
    protected $table = 'superadmins';

    protected $fillable = [
        'name',
        'phone',
        'email',
        'password',
    ];
}
  


