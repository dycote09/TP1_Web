<?php

namespace App\Http\Controllers;

use App\Http\Resources\ActorResource;
use Illuminate\Http\Request;
use App\Models\Actor;
use App\Models\Film;


class ActorController extends Controller
{
    //Pas demandé dans le TP, affichage de tous les acteurs
    public function index(){
        return ActorResource::collection(Actor::all())->response()->setStatusCode(200);
    }

    //Consultation de tous les acteurs d’un certain film -- En cours, nécessite un check sur Actor_Film pour correspondance film_id
    public function show($id){
        return ActorResource::collection(Actor::all())->response()->setStatusCode(200);
    }
}

