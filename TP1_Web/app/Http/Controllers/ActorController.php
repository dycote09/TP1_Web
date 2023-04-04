<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Actor;

class ActorController extends Controller
{
    public function index(){
        $actors = Actor::all();
        foreach($actors as $actor)
        {
            echo($actor->first_name . ' ' . $actor->last_name . '<br>');
        }
    }

    public function show($id){
        $actor = Actor::find($id);
        echo($actor->first_name . ' ' . $actor->last_name . '<br>');
    }
}

