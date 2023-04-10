<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Language;
use App\Http\Resources\LanguageResource;
use App\Models\Film;

class LanguageController extends Controller
{
    //Pas demandé dans le TP, affichage de toutes les langues -- With Views
    public function index(){
        $languages = Language::all();
        return response()->view('indexlanguages', ['languages' => $languages], 200);
    }

    //Pas demandé dans le TP, affichage de la langue associée au {id} -- With Views
    public function show($id)
    {
        $film = Film::findOrFail($id);
        $language = $film->language;
        return response()->view('filmlanguages', compact('film', 'language'), 200);
    }
}

