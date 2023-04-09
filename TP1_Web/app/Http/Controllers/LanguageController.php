<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Language;
use App\Http\Resources\LanguageResource;

class LanguageController extends Controller
{
    public function index(){
        $languages = Language::all();
        return LanguageResource::collection($languages);
    }

    public function show($id){
        $language = Language::find($id);
        return new LanguageResource($language);
    }
}

