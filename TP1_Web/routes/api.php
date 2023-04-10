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

Route::post('register', 'App\Http\Controllers\AuthController@register');

//Route protegé
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('critics', 'App\Http\Controllers\CriticController@store');
    Route::post('logout', 'App\Http\Controllers\AuthController@logout');
});

Route::middleware('auth:sanctum')->post('/logout', function (Request $request) {
});

//Routes pour actors
Route::get('actors','App\Http\Controllers\ActorController@index'); //Pas demandé dans le TP, affichage de tous les acteurs
Route::get('actors/{id}','App\Http\Controllers\ActorController@show'); //Consultation de tous les acteurs d’un certain film

//Routes pour critics
Route::post('critics','App\Http\Controllers\CriticController@store'); //Ajout d’une critique (seulement si membre connecté) -- DONE, your version seems to work WAY better than what I was doing :D

//Routes pour films
Route::get('films','App\Http\Controllers\FilmController@index'); //Consultation des films (sans critiques et sans acteurs) -- Done
Route::post('films','App\Http\Controllers\FilmController@store'); //Ajout d’un film (seulement si admin) -- Présentement ne tient pas compte du role + aucune vérification si $request contient toutes les infos nécessaires.
Route::get('films/{id}/critics','App\Http\Controllers\FilmController@show'); //Consultation d'un certain film avec ses critiques -- Done
Route::delete('films/{id}','App\Http\Controllers\FilmController@destroy'); //Suppression d’un film (seulement si admin)  -- Présentement ne tient pas compte du role + erreur (mais le delete fonctionne...)
Route::get('films/{keywords?}/{rating?}/{max_length?}','App\Http\Controllers\FilmController@show'); //Recherche de films - Temporaire, devrais être un @show + plusieurs erreurs encore + Need Paginate(20)

//Routes pour languages
Route::get('languages','App\Http\Controllers\LanguageController@index'); //Pas demandé dans le TP, affichage de toutes les langues
Route::get('languages/{id}','App\Http\Controllers\LanguageController@show'); //Pas demandé dans le TP, affichage de la langue associée au {id}

//Routes pour roles
Route::get('roles','App\Http\Controllers\RoleController@index'); //Pas demandé dans le TP, affichage de tous les rôles
Route::get('roles/{id}','App\Http\Controllers\RoleController@show'); //Pas demandé dans le TP, affichage du rôle associé au {id}

//Routes pour users
Route::get('users','App\Http\Controllers\UserController@index'); //Pas demandé dans le TP, affichage de tous les users
Route::get('users/{id}','App\Http\Controllers\UserController@show'); //Consultation des informations d’un certain user (seulement si on est connecté avec ce user) -- Présentement ne tient pas compte du role
Route::post('users','App\Http\Controllers\UserController@store'); //Ajout d’un nouveau user si le email n’existe pas déjà. La création d’un compte ne doit pas connecter l’utilisateur. -- Présentement aucune vérification si e-mail existe + aucune vérification si $request contient toutes les infos nécessaires.
Route::put('users','App\Http\Controllers\UserController@update'); //Modification d’un user existant (seulement si on est connecté avec ce user) -- Présentement ne tient pas compte si on est connecté ou non, mot de passe NON traité séparément
