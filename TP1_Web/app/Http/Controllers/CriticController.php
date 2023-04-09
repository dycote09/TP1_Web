<?php

namespace App\Http\Controllers;

use App\Http\Resources\CriticResource;
use Illuminate\Http\Request;
use App\Models\Critic;

class CriticController extends Controller
{
    public function index(){
        $critics = Critic::all();
        return CriticResource::collection($critics);
    }

    public function show($id){
        $critic = Critic::find($id);
        return new CriticResource($critic);
    }    
}
