<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class languages extends Controller
{
    public function index(){
        return \view('languages');
    }
}

