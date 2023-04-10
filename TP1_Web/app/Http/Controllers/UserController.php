<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //Pas demandé dans le TP, affichage de tous les users
    public function index(){
        return UserResource::collection(User::all());
    }

    //Consultation des informations d’un certain user (seulement si on est connecté avec ce user) -- Présentement ne tient pas compte du role
    public function show($id){
        return new UserResource(User::find($id));
    }

    //Ajout d’un nouveau user si le email n’existe pas déjà. La création d’un compte ne doit pas connecter l’utilisateur. -- Présentement aucune vérification si e-mail existe + aucune vérification si $request contient toutes les infos nécessaires.
    public function store(Request $request){
        return User::create($request->all())->response()->setStatusCode(201);
    }

    //Modification d’un user existant (seulement si on est connecté avec ce user) -- Présentement ne tient pas compte si on est connecté ou non, mot de passe NON traité séparément
   public function update(Request $request){
        return User::edit($request->all())->response()->setStatusCode(201);
    }

}
