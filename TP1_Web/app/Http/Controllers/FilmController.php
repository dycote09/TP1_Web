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
    public function store(Request $request){
        $this->authorize('admin');
        $values = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'rating' => 'required',
            'length' => 'required|numeric',
        ]);
        $film = Film::create($values);
        return (new FilmResource($film))->response()->json(['message' => 'Le film a bien été ajouté.'], 201)->setStatusCode(201);
    }

    //Consultation d'un certain film avec ses critiques -- Fuck it je les séparent je suis pas capable de les faire marcher ensembles...
    public function show(Request $request, $id = null)
    {        
            return (new FilmCriticsResource(Film::with('critics')->findOrFail($id)))
            ->response()
            ->setStatusCode(200);
    }

    public function search(Request $request)
    {
        $keywords = $request->input('keywords');
        $rating = $request->input('rating');
        $max_length = $request->input('max_length');
        $query = Film::query();
        if ($keywords !== null) 
        {
            $query->where(function ($q) use ($keywords) {
            $q->where('title', 'like', '%' . $keywords . '%')
                ->orWhere('description', 'like', '%' . $keywords . '%');
            });
        }
        if ($rating !== null) 
        {
            $query->where('rating', $rating);
        }
        if ($max_length !== null) 
        {
        $query->where('length', '<=', $max_length);
        }
        $films = $query->paginate(20);
        return FilmResource::collection($films)
        ->response()
        ->setStatusCode(200);
    }



    
    

    //Suppression d’un film (seulement si admin)  -- Maybe something like this?
    public function destroy(Request $request){
        $values = $request->validate([
          'id' => 'required|numeric',
        ]);
        $user = auth()->user();
        if (!$user || $user->role_id !== 1) 
        {
          return response()->json(['message' => 'Seul un administrateur peut retirer des films de la base de donnée.'], 401);
        }
        Film::where('id', $values['id'])->delete();
        return response()->json(['message' => 'Le film a bien été retiré de la base de données.'], 204);        
    }
}
