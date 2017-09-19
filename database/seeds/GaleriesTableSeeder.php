<?php

use Illuminate\Database\Seeder;

class GaleriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('galeries')->insert([
            'nom' => 'Compositions diverses',
            'description' => 'Compositions diverses',
            'chemin_visuel' => '/img/galeries/1.png',
            'actif' => 1,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ]);

        DB::table('galeries')->insert([
            'nom' => 'Les Roses',
            'description' => 'Les Roses',
            'chemin_visuel' => '/img/galeries/2.png',
            'actif' => 1,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ]);

        DB::table('galeries')->insert([
            'nom' => 'Symphonie en bleu',
            'description' => 'Symphonie en bleu',
            'chemin_visuel' => '/img/galeries/3.png',
            'actif' => 1,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ]);

        DB::table('galeries')->insert([
            'nom' => 'Les Tribulations d\'Henriette',
            'description' => 'Les Tribulations d\'Henriette',
            'chemin_visuel' => '/img/galeries/4.png',
            'actif' => 1,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ]);

        DB::table('galeries')->insert([
            'nom' => 'Les aventures de Germaine',
            'description' => 'Les aventures de Germaine',
            'chemin_visuel' => '/img/galeries/5.png',
            'actif' => 1,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ]);

        DB::table('galeries')->insert([
            'nom' => 'Les animaux',
            'description' => 'Les animaux',
            'chemin_visuel' => '/img/galeries/6.png',
            'actif' => 1,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ]);

        DB::table('galeries')->insert([
            'nom' => 'Famille Jidéka',
            'description' => 'Famille Jidéka',
            'chemin_visuel' => '/img/galeries/7.png',
            'actif' => 1,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ]);

        factory(App\Galerie::class, 0)->create();
    }
}
