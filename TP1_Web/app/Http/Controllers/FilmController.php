<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models;

class FilmController extends Controller
{
    public function index(){
        $films = Film::all(); 
        return view('films', ['films' => $films]);
    }

    public function show($id) {
        $film = Film::findOrFail($id);
        $film = $film->films()->where('id', $film_id)->first();
        echo($film->title);
    }
}

