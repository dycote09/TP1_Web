<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class actors extends Controller
{
    public function index(){
        return \view('actors');
    }
}

