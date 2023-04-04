<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;

class films extends Controller
{
    //*public function index(){
      //*  return \view('films');
    //*}

    public function index(){
        $films = Film::all(); 
        return view('films', ['films' => $films]);
    }

    public function show(int $id)
    {
        $films = Film::find($id);
        echo($films->title);
    }
}

