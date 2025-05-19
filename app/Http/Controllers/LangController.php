<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LangController extends Controller
{
    public function switchLang($lang, Request $request){
        $request->session()->put('lang', $lang);
        return redirect()->back();
    }
}