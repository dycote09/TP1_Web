<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'password',
        'email',
        'last_name',
        'first_name',
        'role_id',
        'rememberToken',
        'created_at',
        'updated_at',
    ];
    
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function role()
    {
        return $this->hasOne('App\Models\Role');
    }

    public function critics()
    {
        return $this->hasMany('App\Models\Critic');
    }
}
