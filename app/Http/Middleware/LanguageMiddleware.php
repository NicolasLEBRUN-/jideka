<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;

class LanguageMiddleware {

    public function __construct() {
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Session::has('applocale') && array_key_exists(Session::get('applocale'), Config::get('app.available_locales'))) {
            App::setLocale(Session::get('applocale'));
        } else {
            App::setLocale(Config::get('app.fallback_locale'));
        }

        return $next($request);
    }

}