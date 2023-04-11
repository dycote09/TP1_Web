<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    protected $fillable = [
        'id',
        'last_name',
        'first_name',
        'birthdate',
    ];

    public function films()
    {
        return $this->belongsToMany(Film::class);
    }
}
