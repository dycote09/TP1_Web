<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Laravel\Sanctum\NewAccessToken;

class AuthController extends Controller
{
    public function register(Request $request){

        $champs = $request->validate([

            'password'=>'required|string',
            'email'=>'required|string',
            'last_name'=>'required|string',
            'first_name'=>'required|string',
        ]);
        
        $user = User::create([
            'password'=>$champs['password'],
            'email'=>$champs['email'],
            'last_name'=>$champs['last_name'],
            'first_name'=>$champs['first_name']
        ]);
        
        $token = $user->createToken('token')->plainTextToken;
        $user->rememberToken = hash('sha256', $token);
        $user->save();
        
        $response= [
            'user' => $user,
            'token'=> $token
        ];

        return response($response, 201);
    }

    public function logout(){

        auth()->logout();
        $isLog = auth()->check();

        if(!$isLog){

            echo('Vous avez été déconnecté avec succès.');
        }
        else{
            echo('Vous êtes connecté');
        }
    }

    public function login($id) {
        $user = User::find($id);
        auth()->login($user);
        $name = $user->first_name;

        echo 'Vous êtes connecté avec '. $name;
    }
    
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'Déconnexion avec succès.'], 204);
    }
}
