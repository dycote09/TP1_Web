<?php

namespace App\Http\Controllers;

use App\Http\Resources\RoleResource;
use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    //Pas demandé dans le TP, affichage de tous les rôles
    public function index(){
        return RoleResource::collection(Role::all());
    }

    //Pas demandé dans le TP, affichage du rôle associé au {id}
    public function show($id){
        return new RoleResource(Role::find($id));
    }
}
