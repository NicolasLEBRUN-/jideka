<?php

use Illuminate\Database\Seeder;

class OeuvresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $galerie_id = App\Galerie::where('nom', 'LIKE', 'Compositions diverses')->first()->id;

        $nextId = DB::table('oeuvres')->max('id') + 1;
		DB::table('oeuvres')->insert([
            'nom' => 'Danseuses épanouies !',
            'description' => 'Danseuses épanouies !',
            'technique' => 'Acrylique sur toile de lin',
            'annee' => 2017,
            'hauteur' => 30,
            'largeur' => 30,
            'profondeur' => 2,
            'prix' => 100,
            'disponibilite_id' => 1,
            'galerie_id' => $galerie_id,
            'chemin_image' => '/img/galeries/' . $galerie_id . '/' . $nextId . '.png',
            'actif' => 1,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ]);

        $nextId = DB::table('oeuvres')->max('id') + 1;
        DB::table('oeuvres')->insert([
            'nom' => 'Féminité',
            'description' => 'Féminité',
            'technique' => 'Acrylique sur toile de lin',
            'annee' => 2017,
            'hauteur' => 30,
            'largeur' => 30,
            'profondeur' => 2,
            'prix' => 100,
            'disponibilite_id' => 1,
            'galerie_id' => $galerie_id,
            'chemin_image' => '/img/galeries/' . $galerie_id . '/' . $nextId . '.png',
            'actif' => 1,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ]);

        $nextId = DB::table('oeuvres')->max('id') + 1;
        DB::table('oeuvres')->insert([
            'nom' => 'Réchauffement climatique n°2',
            'description' => 'Réchauffement climatique n°2',
            'technique' => 'Acrylique sur toile',
            'annee' => 2017,
            'hauteur' => 60,
            'largeur' => 60,
            'profondeur' => 2,
            'prix' => 100,
            'disponibilite_id' => 1,
            'galerie_id' => $galerie_id,
            'chemin_image' => '/img/galeries/' . $galerie_id . '/' . $nextId . '.png',
            'actif' => 1,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ]);

        $galerie_id = App\Galerie::where('nom', 'LIKE', 'Les Roses')->first()->id;

        $nextId = DB::table('oeuvres')->max('id') + 1;
        DB::table('oeuvres')->insert([
            'nom' => 'En vacances !',
            'description' => 'En vacances !',
            'technique' => 'Acrylique sur toile',
            'annee' => 2016,
            'hauteur' => 20,
            'largeur' => 20,
            'profondeur' => 2,
            'prix' => 100,
            'disponibilite_id' => 2,
            'galerie_id' => $galerie_id,
            'chemin_image' => '/img/galeries/' . $galerie_id . '/' . $nextId . '.png',
            'actif' => 1,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ]);

        $nextId = DB::table('oeuvres')->max('id') + 1;
        DB::table('oeuvres')->insert([
            'nom' => 'Connivence',
            'description' => 'Connivence',
            'technique' => 'Acrylique sur toile de lin',
            'annee' => 2016,
            'hauteur' => 20,
            'largeur' => 20,
            'profondeur' => 2,
            'prix' => 100,
            'disponibilite_id' => 2,
            'galerie_id' => $galerie_id,
            'chemin_image' => '/img/galeries/' . $galerie_id . '/' . $nextId . '.png',
            'actif' => 1,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ]);

        $nextId = DB::table('oeuvres')->max('id') + 1;
        DB::table('oeuvres')->insert([
            'nom' => 'Rose au piano',
            'description' => 'Rose au piano',
            'technique' => 'Acrylique sur toile de lin',
            'annee' => 2015,
            'hauteur' => 30,
            'largeur' => 30,
            'profondeur' => 2,
            'prix' => 100,
            'disponibilite_id' => 2,
            'galerie_id' => $galerie_id,
            'chemin_image' => '/img/galeries/' . $galerie_id . '/' . $nextId . '.png',
            'actif' => 1,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ]);

        $galerie_id = App\Galerie::where('nom', 'LIKE', 'Symphonie en bleu')->first()->id;

        $nextId = DB::table('oeuvres')->max('id') + 1;
        DB::table('oeuvres')->insert([
            'nom' => 'Tendresse',
            'description' => 'Tendresse',
            'technique' => 'Acrylique et gel médium sur toile',
            'annee' => 2014,
            'hauteur' => 30,
            'largeur' => 30,
            'profondeur' => 2,
            'prix' => 100,
            'disponibilite_id' => 2,
            'galerie_id' => $galerie_id,
            'chemin_image' => '/img/galeries/' . $galerie_id . '/' . $nextId . '.png',
            'actif' => 1,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ]);

        $nextId = DB::table('oeuvres')->max('id') + 1;
        DB::table('oeuvres')->insert([
            'nom' => 'Le Professeur',
            'description' => 'Le Professeur',
            'technique' => 'Acrylique sur toile',
            'annee' => 2014,
            'hauteur' => 20,
            'largeur' => 20,
            'profondeur' => 2,
            'prix' => 100,
            'disponibilite_id' => 1,
            'galerie_id' => $galerie_id,
            'chemin_image' => '/img/galeries/' . $galerie_id . '/' . $nextId . '.png',
            'actif' => 1,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ]);

        $nextId = DB::table('oeuvres')->max('id') + 1;
        DB::table('oeuvres')->insert([
            'nom' => 'Aïe, mon arthrose !',
            'description' => 'Aïe, mon arthrose !',
            'technique' => 'Acrylique et gel médieum sur toile',
            'annee' => 2013,
            'hauteur' => 50,
            'largeur' => 50,
            'profondeur' => 2,
            'prix' => 100,
            'disponibilite_id' => 1,
            'galerie_id' => $galerie_id,
            'chemin_image' => '/img/galeries/' . $galerie_id . '/' . $nextId . '.png',
            'actif' => 1,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ]);

        $galerie_id = App\Galerie::where('nom', 'LIKE', "Les Tribulations d'Henriette")->first()->id;

        $nextId = DB::table('oeuvres')->max('id') + 1;
        DB::table('oeuvres')->insert([
            'nom' => 'Mère au foyer ! - Mother of four !',
            'description' => 'Mère au foyer ! - Mother of four !',
            'technique' => 'Acrylique sur toile',
            'annee' => 1900,
            'hauteur' => 73,
            'largeur' => 50,
            'profondeur' => 2,
            'prix' => 100,
            'disponibilite_id' => 1,
            'galerie_id' => $galerie_id,
            'chemin_image' => '/img/galeries/' . $galerie_id . '/' . $nextId . '.png',
            'actif' => 1,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ]);

        $nextId = DB::table('oeuvres')->max('id') + 1;
        DB::table('oeuvres')->insert([
            'nom' => "L'Epicurienne - The Epicurean",
            'description' => "L'Epicurienne - The Epicurean",
            'technique' => 'Acrylique sur toile',
            'annee' => 1900,
            'hauteur' => 40,
            'largeur' => 40,
            'profondeur' => 2,
            'prix' => 100,
            'disponibilite_id' => 2,
            'galerie_id' => $galerie_id,
            'chemin_image' => '/img/galeries/' . $galerie_id . '/' . $nextId . '.png',
            'actif' => 1,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ]);

        $nextId = DB::table('oeuvres')->max('id') + 1;
        DB::table('oeuvres')->insert([
            'nom' => 'Aïe, mon arthrose !',
            'description' => 'Aïe, mon arthrose !',
            'technique' => 'Acrylique et gel médieum sur toile',
            'annee' => 2013,
            'hauteur' => 50,
            'largeur' => 50,
            'profondeur' => 2,
            'prix' => 100,
            'disponibilite_id' => 1,
            'galerie_id' => $galerie_id,
            'chemin_image' => '/img/galeries/' . $galerie_id . '/' . $nextId . '.png',
            'actif' => 1,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ]);

        $galerie_id = App\Galerie::where('nom', 'LIKE', "Les aventures de Germaine")->first()->id;

        $nextId = DB::table('oeuvres')->max('id') + 1;
        DB::table('oeuvres')->insert([
            'nom' => "Je m'ennuie ! - I am fed up !",
            'description' => "Je m'ennuie ! - I am fed up !",
            'technique' => 'Acrylique sur toile',
            'annee' => 1900,
            'hauteur' => 80,
            'largeur' => 80,
            'profondeur' => 2,
            'prix' => 100,
            'disponibilite_id' => 1,
            'galerie_id' => $galerie_id,
            'chemin_image' => '/img/galeries/' . $galerie_id . '/' . $nextId . '.png',
            'actif' => 1,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ]);

        $nextId = DB::table('oeuvres')->max('id') + 1;
        DB::table('oeuvres')->insert([
            'nom' => "Désir",
            'description' => "Désir",
            'technique' => 'Acrylique et gel médium sur toile',
            'annee' => 1900,
            'hauteur' => 80,
            'largeur' => 80,
            'profondeur' => 2,
            'prix' => 100,
            'disponibilite_id' => 2,
            'galerie_id' => $galerie_id,
            'chemin_image' => '/img/galeries/' . $galerie_id . '/' . $nextId . '.png',
            'actif' => 1,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ]);

        $nextId = DB::table('oeuvres')->max('id') + 1;
        DB::table('oeuvres')->insert([
            'nom' => 'Un Amour Interéssé - An Interested Love',
            'description' => 'Un Amour Interéssé - An Interested Love',
            'technique' => 'Acrylique sur toile',
            'annee' => 1900,
            'hauteur' => 80,
            'largeur' => 80,
            'profondeur' => 2,
            'prix' => 100,
            'disponibilite_id' => 1,
            'galerie_id' => $galerie_id,
            'chemin_image' => '/img/galeries/' . $galerie_id . '/' . $nextId . '.png',
            'actif' => 1,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ]);

        $galerie_id = App\Galerie::where('nom', 'LIKE', "Les animaux")->first()->id;

        $nextId = DB::table('oeuvres')->max('id') + 1;
        DB::table('oeuvres')->insert([
            'nom' => "Serpents et Pomme - Snakes and apple",
            'description' => "Serpents et Pomme - Snakes and apple",
            'technique' => 'Acrylique sur toile',
            'annee' => 1900,
            'hauteur' => 80,
            'largeur' => 80,
            'profondeur' => 2,
            'prix' => 100,
            'disponibilite_id' => 1,
            'galerie_id' => $galerie_id,
            'chemin_image' => '/img/galeries/' . $galerie_id . '/' . $nextId . '.png',
            'actif' => 1,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ]);

        $nextId = DB::table('oeuvres')->max('id') + 1;
        DB::table('oeuvres')->insert([
            'nom' => "Et si on jouait ? - What about playing together ?",
            'description' => "Et si on jouait ? - What about playing together ?",
            'technique' => 'Acrylique sur toile',
            'annee' => 1900,
            'hauteur' => 60,
            'largeur' => 60,
            'profondeur' => 2,
            'prix' => 100,
            'disponibilite_id' => 2,
            'galerie_id' => $galerie_id,
            'chemin_image' => '/img/galeries/' . $galerie_id . '/' . $nextId . '.png',
            'actif' => 1,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ]);

        $nextId = DB::table('oeuvres')->max('id') + 1;
        DB::table('oeuvres')->insert([
            'nom' => 'Comment rester zen ? - How to keep cool ?',
            'description' => 'Comment rester zen ? - How to keep cool ?',
            'technique' => 'Acrylique sur toile',
            'annee' => 1900,
            'hauteur' => 60,
            'largeur' => 60,
            'profondeur' => 2,
            'prix' => 100,
            'disponibilite_id' => 1,
            'galerie_id' => $galerie_id,
            'chemin_image' => '/img/galeries/' . $galerie_id . '/' . $nextId . '.png',
            'actif' => 1,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ]);

        $galerie_id = App\Galerie::where('nom', 'LIKE', "Famille Jidéka")->first()->id;

        $nextId = DB::table('oeuvres')->max('id') + 1;
        DB::table('oeuvres')->insert([
            'nom' => "Nature en danger",
            'description' => "Nature en danger",
            'technique' => 'Acrylique sur toile',
            'annee' => 2015,
            'hauteur' => 80,
            'largeur' => 80,
            'profondeur' => 2,
            'prix' => 100,
            'disponibilite_id' => 1,
            'galerie_id' => $galerie_id,
            'chemin_image' => '/img/galeries/' . $galerie_id . '/' . $nextId . '.png',
            'actif' => 1,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ]);

        $nextId = DB::table('oeuvres')->max('id') + 1;
        DB::table('oeuvres')->insert([
            'nom' => "L'arbre à bonbons - Candy Tree",
            'description' => "L'arbre à bonbons - Candy Tree",
            'technique' => 'Acrylique sur toile',
            'annee' => 2013,
            'hauteur' => 80,
            'largeur' => 80,
            'profondeur' => 2,
            'prix' => 100,
            'disponibilite_id' => 1,
            'galerie_id' => $galerie_id,
            'chemin_image' => '/img/galeries/' . $galerie_id . '/' . $nextId . '.png',
            'actif' => 1,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ]);

        $nextId = DB::table('oeuvres')->max('id') + 1;
        DB::table('oeuvres')->insert([
            'nom' => 'Eclair de Folie - Fit of Madness',
            'description' => 'Eclair de Folie - Fit of Madness',
            'technique' => 'Acrylique sur toile',
            'annee' => 2009,
            'hauteur' => 80,
            'largeur' => 80,
            'profondeur' => 2,
            'prix' => 100,
            'disponibilite_id' => 1,
            'galerie_id' => $galerie_id,
            'chemin_image' => '/img/galeries/' . $galerie_id . '/' . $nextId . '.png',
            'actif' => 1,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ]);

        //factory(App\Oeuvre::class, 0)->create();
    }
}
