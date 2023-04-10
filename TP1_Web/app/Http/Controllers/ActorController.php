<?php

namespace App\Http\Controllers;

use App\Http\Resources\ActorResource;
use Illuminate\Http\Request;
use App\Models\Actor;
use App\Models\Film;


class ActorController extends Controller
{
    //Pas demandé dans le TP, affichage de tous les acteurs -- Not needed, but with Views!
    public function index(){
        $actors = Actor::all();
        return response()->view('indexactors', ['actors' => $actors], 200);
    }

    //Consultation de tous les acteurs d’un certain film -- DONE WITH VIEWS
    public function show($id){
        $film = Film::findOrFail($id);
        $actors = Actor::join('actor_film', 'actors.id', '=', 'actor_film.actor_id')
                  ->where('actor_film.film_id', $id)
                  ->get();
        return response()->view('filmactors', ['title' => $film->title, 'actors' => $actors]);
    }
}

