<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Critic;

class CriticController extends Controller
{
    public function index(){
        $critics = Critic::all();
        foreach($critics as $critic)
        {
            echo($critic->comment . ' ' . $critic->score . '<br>');
        }
    }

    public function show($id){
        $critic = Critic::find($id);
        echo($critic->comment . ' ' . $critic->score . '<br>');
    }
}
