<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class LanguageController extends Controller
{

    public function switchLang($lang=null)
    {
        // dd(in_array($lang, Config::get('languages')));
        if (in_array($lang, Config::get('languages'))) {
            Session::put('applocale', $lang);
            App::setLocale($lang);
        }
        return redirect()->back();
    }
}
