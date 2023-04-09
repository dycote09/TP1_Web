<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Routes pour actors
Route::get('actors','App\Http\Controllers\ActorController@index');
Route::get('actors/{id}','App\Http\Controllers\ActorController@show');
Route::get('actors/{id}/edit','App\Http\Controllers\ActorController@edit');
Route::post('actors','App\Http\Controllers\ActorController@store');


//Routes pour critics
Route::get('critics','App\Http\Controllers\CriticController@index');
Route::get('critics/{id}','App\Http\Controllers\CriticController@show');
Route::get('critics/{id}/edit','App\Http\Controllers\CriticController@edit');
Route::post('critics','App\Http\Controllers\CriticController@store');

//Routes pour films
Route::get('films','App\Http\Controllers\FilmController@index');
Route::get('films/{id}','App\Http\Controllers\FilmController@show');
Route::get('films/{id}/edit','App\Http\Controllers\FilmController@edit');
Route::post('films','App\Http\Controllers\FilmController@store');

//Route pour Home
Route::get('/', 'App\Http\Controllers\HomeController@index');

//Routes pour languages
Route::get('languages','App\Http\Controllers\LanguageController@index');
Route::get('languages/{id}','App\Http\Controllers\LanguageController@show');
Route::get('languages/{id}/edit','App\Http\Controllers\LanguageController@edit');
Route::post('languages','App\Http\Controllers\LanguageController@store');

//Routes pour roles
Route::get('roles','App\Http\Controllers\RoleController@index');
Route::get('roles/{id}','App\Http\Controllers\RoleController@show');
Route::get('roles/{id}/edit','App\Http\Controllers\RoleController@edit');
Route::post('roles','App\Http\Controllers\RoleController@store');

//Routes pour users
Route::get('users','App\Http\Controllers\UserController@index');
Route::get('users/{id}','App\Http\Controllers\UserController@show');
Route::get('users/{id}/edit','App\Http\Controllers\UserController@edit');
Route::post('users','App\Http\Controllers\UserController@store');