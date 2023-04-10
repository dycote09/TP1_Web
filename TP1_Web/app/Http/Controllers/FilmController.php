<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Critic;
use App\Models\Film;
use App\Http\Resources\FilmResource;
use App\Http\Resources\CriticResource;

class FilmController extends Controller
{
    //Consultation des films (sans critiques et sans acteurs) -- Done
    public function index(){        
        return FilmResource::collection(Film::all())->response()->setStatusCode(200);
    }

    //Ajout d’un film (seulement si admin) -- Présentement ne tient pas compte du role + aucune vérification si $request contient toutes les infos nécessaires.
    public function store(Request $request){
        return Film::create($request->all())->response()->setStatusCode(201);
    }

    //Consultation d'un certain film avec ses critiques -- Présentement retourne les critiques associées au film_id sans les films - Combiner FilmResource+Critic Resource
    public function show($id){
        if ($id)
        {        
        return CriticResource::collection(Critic::all()->where('film_id', $id));
        }
    }

    //Suppression d’un film (seulement si admin)  -- Présentement ne tient pas compte du role + statusCode
    public function destroy($id){        
            Film::where('id', $id)->delete();
            //->response()->setStatusCode(204)
    }

    //Recherche de films - Temporaire, devrais être un @show + plusieurs erreurs encore
    public function search($keywords = ' ', $rating = 'G', $max_length = 999){                
        $films = Film::where('title', 'like', '%'.$keywords.'%')
        ->Where('rating', $rating)
        ->Where('length', '<=', $max_length)
        ->orWhere('description', 'like', '%'.$keywords.'%')
        ->paginate(20);        
        return FilmResource::collection($films);
    }

}
