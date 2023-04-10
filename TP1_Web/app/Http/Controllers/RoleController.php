<?php

namespace App\Http\Controllers;

use App\Http\Resources\RoleResource;
use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    public function index(){
        return RoleResource::collection(Role::all());
    }

    public function show($id){
        return new RoleResource(Role::find($id));
    }
}
