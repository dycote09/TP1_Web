<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;
use App\Http\Resources\FilmResource;

class FilmController extends Controller
{
    public function index(){
        try {

            $films = Film::all();
            return FilmResource::collection($films)->response()->setStatusCode(200);

        } catch (Exception $e) {

            abort(500, 'Erreur du serveur');

        }
    }

    public function show($id){
        
        try {
            
            $film = Film::find($id);
            return new FilmResource($film);

        } catch (Exception $e) {

            abort(500, 'Erreur du serveur');

        }
    }

    public function create (){
        
    }

    public function store (Request $request){
        $validation = $request->validate([
            'id'=> ['required', int],
            'title'=> ['required', string],
            'release_year'=> ['required', string],
            'length'=> ['required', int],
            'description'=> ['required', string],
            'rating'=> ['required', string],
            'languague_id'=> ['required', int],
            'special_features'=> ['required', string]
        ]);

        $film = Film::create($validation);

        $film->save();
        return response()->json([
            'message' => 'Le film a été créé avec succès',
            'data' => $film,
        ], 201);
    }
}
