<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

/**
 * @method static where(string $string, string $string1, mixed $id)
 * @method static find(mixed $input)
 */
class User extends Authenticatable
{
    use HasFactory, Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'phone',
        'email',
        'role',
        'password',
        'extrainfo'
    ];
    protected $table = 'users';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    public function adminrecep()
    {
        return $this->hasOne(Adminrecep::class)->withDefault([
            'name' => 'test'
        ]);
    }

    public function resident()
    {
        return $this->hasOne(Resident::class);
    }

    public function booking()
    {
        return $this->hasOne(Booking::class);
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
