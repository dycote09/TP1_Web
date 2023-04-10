<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'password',
        'email',
        'last_name',
        'first_name',
        'role_id'
    ];

    protected $hidden = [
        'rememberToken'
    ];

    public function role()
    {
        return $this->hasOne('App\Models\Role');
    }

    public function critics()
    {
        return $this->hasMany('App\Models\Critic');
    }

    //public function tokens()
    //{
    //    return $this->hasMany(PersonalAccessToken::class);
    //}
}
