<?php

use Illuminate\Database\Seeder;

class BiographiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('biographies')->insert([
            'corps' => 'Dessiner le quotidien, dessiner ce que nous vivons, ce que nous ressentons, dessiner la banalité de tous les jours mais en la colorant et en y ajoutant une touche de tendresse et d’humour, c’est toute la signification des « Aventures de Germaine ». Cette interprétation, souvent sociale, est en fait une manière de représenter avec amour ce monde commun et ses travers.',
            'version' => 1,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ]);
    }
}
