<?php

namespace App\Http\Controllers;

use App\Http\Resources\ActorResource;
use Illuminate\Http\Request;
use App\Models\Actor;


class ActorController extends Controller
{
    //Pas demandé dans le TP, affichage de tous les acteurs
    public function index(){
        return ActorResource::collection(Actor::all())->response()->setStatusCode(200);
    }

    //Consultation de tous les acteurs d’un certain film -- DONE
    public function show($id){
        $actors = Actor::join('actor_film', 'actors.id', '=', 'actor_film.actor_id')
                  ->where('actor_film.film_id', $id)
                  ->get();
        return ActorResource::collection($actors)->response()->setStatusCode(200);
    }
}

