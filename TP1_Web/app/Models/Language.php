<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
    ];

    public function films()
    {
        return $this->belongsToMany('App\Models\Film');
    }
}
