<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    protected $fillable = [
        'id',
        'title',
        'release_year',
        'length',
        'description',
        'rating',
        'language_id',
        'special_features',
        'image',
        'created_at',
        'updated_at',
    ];

    public function language()
    {
        return $this->hasOne('App\Models\Language');
    }

    public function critics()
    {
        return $this->hasMany('App\Models\Critic');
    }

    public function actors()
    {
        return $this->belongsToMany(Actor::class);
    }
}
