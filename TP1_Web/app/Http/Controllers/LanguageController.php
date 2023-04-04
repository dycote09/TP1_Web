<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Language;

class LanguageController extends Controller
{
    public function index(){
        $languages = Language::all();
        foreach($languages as $language)
        {
            echo($language->name.'<br>');
        }
    }

    public function show($id){
        $language = Language::find($id);
        echo($language->name.'<br>');
    }
}

