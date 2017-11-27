<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:api'])->get('/user', function (Request $request) {
    return $request->user();
});

/* Récupération des biographies
 * @return biographies
 */
Route::get('/biographies', function () {
    $biographies = App\Biographie::all();

    return $biographies;
});

/* Récupération des galeries actives
 * @return galeries
 */
Route::get('/galeries', function () {
    $galeries = App\Galerie::where('actif', '=', '1')->get();

    return $galeries;
});

/* Récupération d'une galerie
 * @param id_galerie
 * @return galerie
 */
Route::get('/galeries/{id_galerie}', function ($id_galerie) {
	$galerie = App\Galerie::findOrFail($id_galerie);

    return $galerie;
});

/* Récupération des oeuvres d'une galerie
 * @param id_galerie
 * @return oeuvres
 */
Route::get('/galeries/{id_galerie}/oeuvres', function ($id_galerie) {
	$oeuvres = App\Galerie::find($id_galerie)->oeuvres;

    return $oeuvres;
});

/* Récupération des oeuvres actives
 * @return oeuvres
 */
Route::get('/oeuvres', function () {
	$oeuvres = App\Oeuvre::where('actif', '=', '1')->get();

    return $oeuvres;
});

/* Récupération d'une oeuvre
 * @param id_oeuvre
 * @return oeuvre
 */
Route::get('/oeuvres/{id_oeuvre}', function ($id_oeuvre) {
	$oeuvre = App\Oeuvre::findOrFail($id_oeuvre);

    return $oeuvre;
});

/* Récupération des expositions actives
 * @return expositions
 */
Route::get('/expositions', function () {
	$expositions = App\Exposition::where('actif', '=', '1')->get();

    return $expositions;
});

/* Récupération d'une exposition
 * @param id_exposition
 * @return exposition
 */
Route::get('/expositions/{id_exposition}', function ($id_exposition) {
	$exposition = App\Exposition::findOrFail($id_exposition);

    return $exposition;
});

/* Récupération des statuts de disponibilité
 * @return statuts_disponibilite
 */
Route::get('/statutsdisponibilite', function () {
	$statuts_disponibilite = App\StatutDisponibilite::all();

    return $statuts_disponibilite;
});

/* Protection des routes de création et suppression */
Route::middleware(['auth:api'])->group(function(){

    /* Administration
     * Modification de la biographie
     */
    Route::post('/create/biographies', 'AdministrationController@creerBiographie');

    /* Administration
     * Création d'une galerie
     */
    Route::post('/create/galeries', 'AdministrationController@creerGalerie');

    /* Administration
     * Suppression d'une galerie
     */
    Route::post('/delete/galeries', 'AdministrationController@supprimerGalerie');

    /* Administration
     * Création d'une oeuvre
     */
    Route::post('/create/oeuvres', 'AdministrationController@creerOeuvre');

    /* Administration
     * Suppression d'une oeuvre
     */
    Route::post('/delete/oeuvres', 'AdministrationController@supprimerOeuvre');

    /* Administration
     * Création d'une exposition
     */
    Route::post('/create/expositions', 'AdministrationController@creerExposition');

    /* Administration
     * Suppression d'une exposition
     */
    Route::post('/delete/expositions', 'AdministrationController@supprimerExposition');

});
