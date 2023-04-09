<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;
use App\Http\Resources\FilmResource;

class FilmController extends Controller
{
    public function index(){
        $films = Film::all();
        return FilmResource::collection($films);
    }

    public function show($id){
        $film = Film::find($id);
        return new FilmResource($film);
    }
}
