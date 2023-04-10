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

//Route publique
Route::get('films','App\Http\Controllers\FilmController@index');
Route::get('films/{id}','App\Http\Controllers\FilmController@show');
Route::get('languages','App\Http\Controllers\LanguageController@index');
Route::get('actors','App\Http\Controllers\ActorController@index');
Route::get('actors/{id}','App\Http\Controllers\ActorController@show');
Route::get('languages/{id}','App\Http\Controllers\LanguageController@show');
Route::post('register', 'App\Http\Controllers\AuthController@register');

//Route protegé
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('critics', [CriticController::class, 'store']);
});

Route::middleware('auth:sanctum')->delete('/logout', function (Request $request) {
    //déconnexion
});