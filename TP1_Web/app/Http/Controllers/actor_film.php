<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class actor_film extends Controller
{
    public function index(){
        return \view('actor_film');
    }
}
