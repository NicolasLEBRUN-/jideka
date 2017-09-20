<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;
use App\Biographie;
use App\Galerie;
use App\Oeuvre;
use App\Exposition;

class AdministrationController extends Controller
{
    public function creerBiographie(Request $request)
    {
    	$this->validate($request, [
            'biographieCorpsFr' => 'required',
    		'biographieCorpsEn'	=> 'required',
    		'biographieVersion'	=> 'required',
    	]);

        $biographie_corps_fr = $request->input('biographieCorpsFr');
    	$biographie_corps_en = $request->input('biographieCorpsEn');
    	$biographie_version = $request->input('biographieVersion');

    	$biographie = new Biographie;
        $biographie->corps_fr = $biographie_corps_fr;
    	$biographie->corps_en = $biographie_corps_en;
    	$biographie->version = $biographie_version + 1;
    	$biographie->save();

		$success = 'La biographie a bien été modifiée.';
		return $success;
    }

    public function creerGalerie(Request $request)
    {
        $this->validate($request, [
            'nom'               => 'required',
            'description'       => 'required',
            'visuel'            => 'required|image64:jpeg,jpg,png'
        ]);

        $nom = $request->input('nom');
        $description = $request->input('description');
        $visuel = $request->file('visuel');

        // Manipulation puis enregistrement de l'image (en base64)
        $imageData = $request->get('visuel');
        $nextId = DB::table('galeries')->max('id') + 1;
        $fileExtension = explode('/', explode(':', substr($imageData, 0, strpos($imageData, ';')))[1])[1];
        $fileName = $nextId . '.' . $fileExtension;
        $cheminVisuel = public_path('img/galeries/') . $fileName;
        Image::make($request->get('visuel'))->save($cheminVisuel, 100);

        // Création du répertoire dans lequel seront placées les oeuvres
        $repertoire_oeuvres = public_path('img/galeries/') . $nextId;
        if (!file_exists($repertoire_oeuvres)) {
            mkdir($repertoire_oeuvres, 0775, true);
        }

        /*
        if(!Storage::exists($repertoire_oeuvres)) {
            \Log::info('Le répertoire n\'existe pas : ' . public_path('img/galeries/') . $nextId);
            $result = Storage::makeDirectory(public_path('img/galeries/') . $nextId);
            \Log::info($result);
        } else {
            \Log::info('Le répertoire existe : ' . public_path('img/galeries/') . $nextId);
        }
        */

        // Création de la galerie
        $galerie = new Galerie;
        $galerie->nom = $nom;
        $galerie->description = $description;
        $galerie->chemin_visuel = substr($cheminVisuel, strpos($cheminVisuel, '/img'));
        $galerie->actif = 1;
        $galerie->save();

        $success = 'La galerie a bien été créée.';
        return $success;
    }

    public function supprimerGalerie(Request $request)
    {
        $this->validate($request, [
            'galerie' => 'required',
        ]);

        $id_galerie = $request->input('galerie');

        // Désactivation des toutes les oeuvres de la galerie
        $oeuvres = Galerie::find($id_galerie)->oeuvres;
        foreach ($oeuvres as $oeuvre) {
            $oeuvre->actif = 0;
            $oeuvre->save();
        }

        // Désactivation de la galerie
        $galerie = Galerie::find($id_galerie);
        $galerie->actif = 0;
        $galerie->save();

        $success = 'La galerie a bien été supprimée.';
        return $success;
    }

    public function creerOeuvre(Request $request)
    {
        $this->validate($request, [
            'nom'           => 'required',
            'description'   => '',
            'technique'     => 'required',
            'annee'         => 'required|integer|min:1',
            'hauteur'       => 'required|integer|min:1',
            'largeur'       => 'required|integer|min:1',
            'profondeur'    => 'required|integer|min:1',
            'prix'          => 'required|integer|min:1',
            'statutdisponibilite' => 'required',
            'galerie'       => 'required',
            'visuel'        => 'required|image64:jpeg,jpg,png'
        ]);

        $nom = $request->input('nom');
        $description = $request->input('description');
        $technique = $request->input('technique');
        $annee = $request->input('annee');
        $hauteur = $request->input('hauteur');
        $largeur = $request->input('largeur');
        $profondeur = $request->input('profondeur');
        $prix = $request->input('prix');
        $id_disponibilite = $request->input('statutdisponibilite');
        $id_galerie = $request->input('galerie');
        $visuel = $request->input('visuel');

        // Création du répertoire dans lequel seront placées les oeuvres
        $repertoire_oeuvres = public_path('img/galeries/') . $id_galerie;
        if (!file_exists($repertoire_oeuvres)) {
            mkdir($repertoire_oeuvres, 0775, true);
        }

        // Manipulation puis enregistrement de l'image (en base64)
        $imageData = $request->get('visuel');
        $nextIdOeuvre = DB::table('oeuvres')->max('id') + 1;
        $fileExtension = explode('/', explode(':', substr($imageData, 0, strpos($imageData, ';')))[1])[1];
        $fileName = $nextIdOeuvre . '.' . $fileExtension;
        $cheminVisuel = public_path('img/galeries/') . $id_galerie . '/' . $fileName;
        Image::make($request->get('visuel'))->save($cheminVisuel, 100);

        // Création de la galerie
        $oeuvre = new Oeuvre;
        $oeuvre->nom = $nom;
        $oeuvre->description = $description;
        $oeuvre->technique = $technique;
        $oeuvre->annee = $annee;
        $oeuvre->hauteur = $hauteur;
        $oeuvre->largeur = $largeur;
        $oeuvre->profondeur = $profondeur;
        $oeuvre->prix = $prix;
        $oeuvre->disponibilite_id = $id_disponibilite;
        $oeuvre->galerie_id = $id_galerie;
        $oeuvre->chemin_image = substr($cheminVisuel, strpos($cheminVisuel, '/img'));
        $oeuvre->actif = 1;
        $oeuvre->save();

        $success = 'L\'oeuvre a bien été créée.';
        return $success;
    }

    public function supprimerOeuvre(Request $request)
    {
        $this->validate($request, [
            'oeuvre' => 'required',
        ]);

        $id_oeuvre = $request->input('oeuvre');

        $oeuvre = Oeuvre::find($id_oeuvre);
        $oeuvre->actif = 0;
        $oeuvre->save();

        $success = 'L\'oeuvre a bien été supprimée.';
        return $success;
    }

    public function creerExposition(Request $request)
    {
        $this->validate($request, [
            'nom'               => 'required',
            'description'       => 'required',
            'lieu'              => 'required',
            'dateDebut'         => 'required',
            'dateFin'           => 'required',
            'dateVernissage'    => 'sometimes|required',
            'visuel'            => 'required|image64:jpeg,jpg,png'
        ]);

        $nom = $request->input('nom');
        $description = $request->input('description');
        $lieu = $request->input('lieu');
        $dateDebut = $request->input('dateDebut');
        $dateFin = $request->input('dateFin');
        $dateVernissage = $request->input('dateVernissage');
        $visuel = $request->file('visuel');

        // Manipulation puis enregistrement de l'image (en base64)
        $imageData = $request->get('visuel');
        $nextId = DB::table('expositions')->max('id') + 1;
        $fileExtension = explode('/', explode(':', substr($imageData, 0, strpos($imageData, ';')))[1])[1];
        $fileName = $nextId . '.' . $fileExtension;
        $cheminVisuel = public_path('img/expositions/') . $fileName;
        Image::make($request->get('visuel'))->save($cheminVisuel, 100);

        $exposition = new Exposition;
        $exposition->nom = $nom;
        $exposition->description = $description;
        $exposition->lieu = $lieu;
        $exposition->date_debut = $dateDebut;
        $exposition->date_fin = $dateFin;
        $exposition->date_vernissage = $dateVernissage;
        $exposition->chemin_visuel = substr($cheminVisuel, strpos($cheminVisuel, '/img'));
        $exposition->actif = 1;
        $exposition->save();

        $success = 'L\'exposition a bien été créée.';
        return $success;
    }

    public function supprimerExposition(Request $request)
    {
        $this->validate($request, [
            'exposition' => 'required',
        ]);

        $id_exposition = $request->input('exposition');

        $exposition = Exposition::find($id_exposition);
        $exposition->actif = 0;
        $exposition->save();

        $success = 'L\'exposition a bien été supprimée.';
        return $success;
    }

}
