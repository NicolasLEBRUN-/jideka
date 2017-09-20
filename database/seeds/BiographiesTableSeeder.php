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
            'corps_fr' => "Dessiner le quotidien, dessiner ce que nous vivons, ce que nous ressentons, dessiner la banalité de tous les jours mais en la colorant et en y ajoutant une touche de tendresse et d’humour, c’est toute la signification des « Aventures de Germaine ». Cette interprétation, souvent sociale, est en fait une manière de représenter avec amour ce monde commun et ses travers.",
            'corps_en' => "Drawing the everyday life, drawing what we live and what we feel, drawing the day-to-day ordinariness but colorising it and adding a touch of tenderness and humour to it, it's the signification of the « Aventures de Germaine ». This reading, frequently social, is in fact just a way to depict this common world and its idiosyncrasies.",
            'version' => 1,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ]);
    }
}
