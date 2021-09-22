<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LanguageController extends Controller
{
    public function changeLanguage($lang){
        session()->put('language', $lang);
        return redirect()->back();
    }
}
