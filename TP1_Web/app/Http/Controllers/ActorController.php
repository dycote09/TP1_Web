<?php

namespace App\Http\Controllers;

use App\Http\Resources\ActorResource;
use Illuminate\Http\Request;
use App\Models\Actor;

class ActorController extends Controller
{
    public function index(){
        $actors = Actor::all();
        return ActorResource::collection($actors);
    }

    public function show($id){
        $actor = Actor::find($id);
        return new ActorResource($actor);
    }
}

