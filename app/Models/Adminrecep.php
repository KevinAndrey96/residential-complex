<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adminrecep extends Model
{
    use HasFactory;
    protected $table = 'adminreceps';

    protected $fillable = [
        'name',
        'phone',
        'email',
        'document',
        'password',
    ]; 


}
