<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Routes pour actors
Route::get('actors','App\Http\Controllers\ActorController@index');
Route::get('actors/{id}','App\Http\Controllers\ActorController@show');

//Routes pour films
Route::get('films','App\Http\Controllers\FilmController@index'); //Consultation des films (sans critiques et sans acteurs) -- Done
Route::post('films','App\Http\Controllers\FilmController@store'); //Ajout d’un film (seulement si admin) -- Présentement ne tient pas compte du role + aucune vérification si $request contient toutes les infos nécessaires.
Route::get('films/{id}','App\Http\Controllers\FilmController@show'); //Consultation d'un certain film avec ses critiques -- Présentement retourne les critiques associées au film_id sans les films - Combiner FilmResource+Critic Resource
Route::delete('films/{id}','App\Http\Controllers\FilmController@destroy'); //Suppression d’un film (seulement si admin)  -- Présentement ne tient pas compte du role + erreur (mais le delete fonctionne...)
Route::get('films/search/{keywords?}/{rating?}/{max_length?}','App\Http\Controllers\FilmController@search'); //Recherche de films - Temporaire, devrais être un @show + plusieurs erreurs encore + Need Paginate(20)

//Routes pour languages
Route::get('languages','App\Http\Controllers\LanguageController@index');
Route::get('languages/{id}','App\Http\Controllers\LanguageController@show');