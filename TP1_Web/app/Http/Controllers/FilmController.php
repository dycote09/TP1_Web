<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;

class FilmController extends Controller
{
    public function index(){
        $films = Film::all();
        foreach($films as $film)
        {
            echo($film->title.'<br>');
        }
    }

    public function show($id){
        $film = Film::find($id);
        echo($film->title.'<br>');
    }
}
