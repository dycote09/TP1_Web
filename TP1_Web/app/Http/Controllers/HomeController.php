<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome'); //Page d'acceuil - Ai laissé la page Welcome de base pour testing purposes.
    }
}
