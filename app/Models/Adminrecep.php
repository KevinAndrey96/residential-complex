<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

/**
 * @method static where(string $string, string $string1, mixed $email)
 */
class Adminrecep extends Model
{
    use HasFactory;
    use HasRoles;
    protected $guard_name = 'web';
    protected $table = 'adminreceps';

    protected $fillable = [
        'name',
        'phone',
        'email',
        'document',
        'password',
    ];


}
