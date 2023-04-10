<?php

namespace App\Http\Controllers;

use App\Http\Resources\RoleResource;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;

class RoleController extends Controller
{
    //Pas demandé dans le TP, affichage de tous les rôles -- Now with Views
    public function index(){
        $roles = Role::all();
        return response()->view('indexroles', ['roles' => $roles], 200);
    }

    //Pas demandé dans le TP, affichage du rôle associé au {id} -- Now with Views
    public function show($id){
        $user = User::findOrFail($id);
        $role = $user->role;
        return response()->view('userroles', compact('user', 'role'), 200);
    }
}
