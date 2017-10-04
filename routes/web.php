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

Auth::routes();

// http://jideka.dev?email=timbmfprod@gmail.com&password=aze
Route::get('/create-token', function () {
    if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
        $user = Auth::user();
        $success['token'] =  $user->createToken('jideka')->accessToken;
        return response()->json(['success' => $success], 200);
    }
    else{
        return response()->json(['error'=>'Unauthorised'], 401);
    }
});

/* Accueil */
Route::get('/', function () {
    return view('accueil');
})->name('home');

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
 * Requiert une authentification, ainsi que d'être admin
 */
Route::get('/web-administration', function () {
    return view('administration');
})->middleware(['auth', 'admin']);
// })->middleware(['auth']);

/* Localization 
 * Modification de la langue de l'application
 */
Route::get('/lang/{lang}', 'LanguageController@changerLangue');

/* Localization
 * Rendu du pseudo-fichier lang.js
 */
Route::get('/js/lang.js', function () {
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

