<?php

// use Illuminate\Support\Facades\Session;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Accueil */
Route::get('/', function () {
    return view('accueil');
});

/* Galeries */
Route::get('/web-galeries', function () {
	return view('galeries');
});

/* Expositions */
Route::get('/web-expositions', function () {
	return view('expositions');
});

/* Envoi d'un courriel vie le formulaire de contact */
Route::post('/contact', 'ContactController@sendMessage');

/* Administration
 * Requiert une authentification HTTP Basic
 */
Route::get('/web-administration', function () {
    return view('administration');
})->middleware('auth.basic');

/* Localization 
 * Modification de la langue de l'application
 */
Route::get('/lang/{lang}', 'LanguageController@changerLangue');

/* Localization
 * Rendu du pseudo-fichier lang.js
 */
Route::get('/js/lang.js', function () {
    // $locale     = Session::get('applocale', 'fr');
    $locale     = App::getLocale();
    $files      = glob(resource_path('lang/' . $locale . '/*.php'));
    $strings    = ['locale' => $locale];
    foreach ($files as $file) {
        $name           = basename($file, '.php');
        $strings[$name] = require $file;
    }
    header('Content-Type: text/javascript');
    echo('window.i18n = ' . json_encode($strings) . ';');
    exit();
});






