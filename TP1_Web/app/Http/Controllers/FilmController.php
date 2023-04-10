<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FilmCritics;
use App\Models\Film;
use App\Http\Resources\FilmResource;
use App\Http\Resources\FilmCriticsResource;

class FilmController extends Controller
{
    //Consultation des films (sans critiques et sans acteurs) -- DONE WITH VIEWS
    public function index(){        
        $films = Film::all();
        return response()->view('indexfilms', ['films' => $films], 200);
    }

    //Ajout d’un film (seulement si admin) -- Présentement ne vérifie pas si Admin seulement -- À TERMINER
    //public function store(Request $request){
    //    $values = $request->validate([
    //        'title' => 'required',
    //        'description' => 'required',
    //        'rating' => 'required',
    //        'length' => 'required|numeric',
    //    ]);

    //    if (/*Insert validation admin ici*/) {
    //        return response()->json(['message' => 'Unauthorized'], 401);
    //    }
    //    $film = Film::create($values);
    //    return (new FilmResource($film))->response()->json(['message' => 'Le film a bien été ajouté.'], 201)->setStatusCode(201);
    //}

    //Consultation d'un certain film avec ses critiques -- Worked by itself, won't work when combined with Keyword Searc   + Recherche de films -- À TERMINER DOESN'T WORK I DON'T UNDERSTAND
    public function show(Request $request){
        if ($request->has('id'))
        {
            return (new FilmCriticsResource(Film::with('critics')->findOrFail($request->input('id'))))->response()->setStatusCode(200);
        }
        else 
        {
        $keywords = $request->input('keywords', '');
        $rating = $request->input('rating', 'G');
        $max_length = $request->input('max_length', 999);
        if(!$keywords && $rating == 'G' && $max_length == 999) {
            $films = Film::paginate(20);
        }
        else {
            $films = Film::where(function($query) use ($keywords) 
            {
                $query->where('title', 'like', '%'.$keywords.'%')
                      ->orWhere('description', 'like', '%'.$keywords.'%');
            })
            ->where('rating', $rating)
            ->where('length', '<=', $max_length)
            ->paginate(20);  
        }
        return FilmResource::collection($films)->response()->setStatusCode(200);
        }
    }


    //Suppression d’un film (seulement si admin)  -- Présentement ne vérifie pas si Admin seulement -- À TERMINER
    //public function destroy(Request $request){
    //    $values = $request->validate([
    //      'id' => 'required|numeric',
    //    ]);

    //    if (/*Insert validation admin ici*/) {
    //       return response()->json(['message' => 'Unauthorized'], 401);
    //    }
    //    Film::where('id', $values['id'])->delete();
    //    return response()->json(['message' => 'Le film a bien été retiré.'], 204)->setStatusCode(204);        
    //}
}
