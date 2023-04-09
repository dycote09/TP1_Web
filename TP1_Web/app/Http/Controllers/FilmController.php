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
        if ($id)
        {
        $film = Film::find($id);
        return new FilmResource($film);
        }
    }

    public function search($keywords = ' ', $rating = 'G', $max_length = 999){
                
        $films = Film::where('title', 'like', '%'.$keywords.'%')
        ->Where('rating', $rating)
        ->Where('length', '<=', $max_length)
        ->orWhere('description', 'like', '%'.$keywords.'%')
        ->get();
        return FilmResource::collection($films);
    }

}
