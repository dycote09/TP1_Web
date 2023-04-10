<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Laravel\Sanctum\NewAccessToken;

class AuthController extends Controller
{
    public function register(Request $request){

        $champs = $request->validate([
            'role_id'=>'required|int',
            'password'=>'required|string',
            'email'=>'required|string',
            'last_name'=>'required|string',
            'first_name'=>'required|string',
        ]);
        
        //$user = new User();
        //$user->role_id = $champs['role_id'];
        //$user->password = $champs['password'];
        //$user->email = $champs['email'];
        //$user->last_name = $champs['last_name'];
        //$user->first_name = $champs['first_name'];


        //$user->remeberToken = $champs['rememberToken'];
        
        $user = User::create([
            'role_id'=>$champs['role_id'],
            'password'=>$champs['password'],
            'email'=>$champs['email'],
            'last_name'=>$champs['last_name'],
            'first_name'=>$champs['first_name']
        ]);
        $user->save();
        
        $token = $user->createToken('token')->plainTextToken;
        
        //$user->rememberToken->$token;

        $response= [
            'user' => $user,
            'token'=> $token
        ];

        return response($response, 201);
    }
}
