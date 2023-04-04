<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class films extends Controller
{
    public function index(){
        return \view('films');
    }
}

