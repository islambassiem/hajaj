<?php

namespace App\Http\Controllers;

use App\Http\Middleware\SetLocale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LocaleController extends Controller
{
    public function syncDirection($lang)
    {
        if (in_array($lang, ['ar', 'en'])) {
            App::setLocale($lang);
            Session::put('locale', $lang);
        }
        return back();
    }
}
