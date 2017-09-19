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

        factory(App\Oeuvre::class, 0)->create();
    }
}
