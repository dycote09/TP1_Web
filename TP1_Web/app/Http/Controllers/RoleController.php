<?php

namespace App\Http\Controllers;

use App\Http\Resources\RoleResource;
use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    public function index(){
        $roles = Role::all();
        return RoleResource::collection($roles);
    }

    public function show($id){
        $role = Role::find($id);
        return new RoleResource($role);
    }
}
