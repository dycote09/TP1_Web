<?php

namespace App\Http\Controllers;

use App\Http\Resources\CriticResource;
use Illuminate\Http\Request;
use App\Models\Critic;

class CriticController extends Controller
{
    //Ajout d’une critique (seulement si membre connecté) -- DONE, your version seems to work WAY better than what I was doing :D
    public function store(Request $request)
    {
        $user = $request->user();    
        $film_id = $request->input('film_id');
        $score = $request->input('score');
        $comment = $request->input('comment');
        $criticBD = $user->critics()->where('film_id', $film_id)->first();
        if ($criticBD) {
            return response()->json(['error' => 'Vous avez déjà écrit une critique pour ce film.'], 400)->setStatusCode(400);
        }
        $critic = new Critic();
        $critic->user_id = $user->id;
        $critic->film_id = $film_id;
        $critic->score = $score;
        $critic->comment = $comment;
        $critic->save();
        return response()->json(['message' => 'Critique ajoutée avec succès.'], 201)->setStatusCode(201);
    }
}
