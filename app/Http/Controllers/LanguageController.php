<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function changerLangue($locale)
    {
        if (array_key_exists($locale, config('app.available_locales'))) {
            Session::put('applocale', $locale);
        }

        return Redirect::back();
    }
}