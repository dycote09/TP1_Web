<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //Pas demandé dans le TP, affichage de tous les users -- Now with Views
    public function index(){
        $users = User::all();
        return response()->view('indexusers', ['users' => $users], 200);
    }

    //Consultation des informations d’un certain user (seulement si on est connecté avec ce user) -- Now with Views -- Think this is more like it, but not sure...
    public function show(Request $request, $id){
        $user = User::find($id);
        if (!$user) 
        {
            abort(404, 'L\'utilisateur recherché n\'existe pas.');
        }
        if ($request->user() && $request->user()->id === $user->id) 
        {
            return response()->view('showuser', compact('user'), 200);
        } 
        else 
        {
            abort(403, 'Vous devez être connecté à l\'utilisateur désiré avant de pouvoir consulter ses informations.');
        }          
    }
    
    

    //Ajout d’un nouveau user si le email n’existe pas déjà. La création d’un compte ne doit pas connecter l’utilisateur. -- MEH, j'tourne en rond, j'arrête ici pour ce soir.
    public function store(Request $request){
        $values = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'last_name'=> 'required|string',
            'first_name'=> 'required|string',
            'role_id'=> 'required|int',
        ]);
        if (User::where('email', $values['email'])->first())
        {
            return response()->json(['error' => 'Un utilisateur avec cette adresse courriel existe déjà'], 409)->setStatusCode(409);
        }
               
        return User::create($values)->setStatusCode(201);
    }

    //Modification d’un user existant (seulement si on est connecté avec ce user) -- Présentement ne tient pas compte si on est connecté ou non, mot de passe NON traité séparément
   public function update(Request $request){
        return User::edit($request->all())->response()->setStatusCode(201);
    }

}
