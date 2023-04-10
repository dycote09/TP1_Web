<?php

namespace App\Http\Controllers;

use App\Http\Resources\CriticResource;
use Illuminate\Http\Request;
use App\Models\Critic;

class CriticController extends Controller
{
    //Ajout d’une critique (seulement si membre connecté) + Un membre peut seulement écrire une critique par film -- Aucune vérification si membre connecté/une seule critique
    /* public function store(Request $request){
        return Critic::create($request->all())->response()->setStatusCode(201);
    }*/
    
    public function store(Request $request)
    {
        $user = $request->user();
    
        $film_id = $request->input('film_id');
        $score = $request->input('score');
        $comment = $request->input('comment');
    
        //condition de 1 critic par film
        $criticBD = $user->critics()->where('film_id', $film_id)->first();
        if ($criticBD) {
            return response()->json(['error' => 'Vous avez déjà écrit une critique pour ce film.'], 400);
        }
    
        $critic = new Critic();
        $critic->user_id = $user->id;
        $critic->film_id = $film_id;
        $critic->score = $score;
        $critic->comment = $comment;
        $critic->save();
    
        return response()->json(['message' => 'Critique ajoutée avec succès.'], 200);
    }

}
