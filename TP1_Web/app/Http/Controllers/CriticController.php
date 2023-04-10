<?php

namespace App\Http\Controllers;

use App\Http\Resources\CriticResource;
use Illuminate\Http\Request;
use App\Models\Critic;

class CriticController extends Controller
{
    //Ajout d’une critique (seulement si membre connecté) + Un membre peut seulement écrire une critique par film -- Aucune vérification si membre connecté/une seule critique
    public function store(Request $request){
        return Critic::create($request->all())->response()->setStatusCode(201);
    }
}
