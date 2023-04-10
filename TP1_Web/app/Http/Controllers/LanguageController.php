<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Language;
use App\Http\Resources\LanguageResource;

class LanguageController extends Controller
{
    //Pas demandé dans le TP, affichage de toutes les langues
    public function index(){
        return LanguageResource::collection(Language::all());
    }

    //Pas demandé dans le TP, affichage de la langue associée au {id}
    public function show($id){
        return new LanguageResource(Language::find($id));
    }
}

