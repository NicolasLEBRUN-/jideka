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
            'corps_fr' => "Comment raconter cette soif de peindre sans risquer d’écrire des phrases déjà maintes fois rabâchées ?
                Je me contenterai, avec retenue, de résumer ainsi : 
                Dessiner pensées et  émotions des gens de tous les jours,
                dessiner l’actualité dans sa beauté comme dans sa noirceur, 
                dessiner des thèmes divers comme le réchauffement climatique, l’exode et la surpopulation,  n’est-ce pas peindre simplement  le quotidien et la vraie vie ?
                Si vous ajoutez à cela la passion des couleurs et une pointe d’humour, vous aurez toute la signification de mon travail. Enfin je souhaiterais que mes toiles vous parlent davantage que des mots…",

            'corps_en' => "Drawing the everyday life, drawing what we live and what we feel, drawing the day-to-day ordinariness but colorising it and adding a touch of tenderness and humour to it, it's the signification of the « Aventures de Germaine ». This reading, frequently social, is in fact just a way to depict this common world and its idiosyncrasies.",

            'version' => 1,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ]);
    }
}

