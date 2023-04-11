<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Critic extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'film_id',
        'score',
        'comment',
        'created_at',
        'updated_at',
    ];
    

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function film()
    {
        return $this->belongsTo('App\Models\Film');
    }
}
