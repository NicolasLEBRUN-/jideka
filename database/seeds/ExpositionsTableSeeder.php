<?php

use Illuminate\Database\Seeder;

class ExpositionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // normalize data (remove accent marks) using PHP's *intl* extension
        //$data = normalizer_normalize($data);

        // replace everything NOT in the sets you specified with an underscore
        //$data = preg_replace("#[^A-Za-z1-9]#","_", $data);

		DB::table('expositions')->insert([
            'nom' => 'Salon du Sappey en Chartreuse',
            'description' => 'Salon de peinture.',
            'date_debut' => DateTime::createFromFormat('d/m/Y H:i:s', '12/07/2017 00:00:00'),
            'date_fin' => DateTime::createFromFormat('d/m/Y H:i:s', '30/07/2017 00:00:00'),
            'date_vernissage' => DateTime::createFromFormat('d/m/Y H:i:s', '11/07/2017 18:30:00'),
            'lieu' => 'Galerie de Chartreuse, salle polyvalente, 38700 Le Sappey en Chartreuse',
            'chemin_visuel' => '/img/expositions/1.png',
            'actif' => 1,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ]);

        DB::table('expositions')->insert([
            'nom' => 'Escapade lyonnaise',
            'description' => 'La fleur dans tous ses états ! Cette galerie n\'expose que des fleurs.',
            'date_debut' => DateTime::createFromFormat('d/m/Y H:i:s', '08/09/2016 00:00:00'),
            'date_fin' => DateTime::createFromFormat('d/m/Y H:i:s', '06/11/2016 00:00:00'),
            'date_vernissage' => DateTime::createFromFormat('d/m/Y H:i:s', '08/09/2016 18:00:00'),
            'lieu' => 'Galerie Flordavelia, 21 rue Nicolas Peiresc, 83000 Toulon',
            'chemin_visuel' => '/img/expositions/2.png',
            'actif' => 1,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ]);

        DB::table('expositions')->insert([
            'nom' => 'Exposition collective',
            'description' => 'Exposition féminine : quatre peintres et deux sculpteurs.',
            'date_debut' => DateTime::createFromFormat('d/m/Y H:i:s', '01/08/2016 00:00:00'),
            'date_fin' => DateTime::createFromFormat('d/m/Y H:i:s', '31/08/2016 00:00:00'),
            'date_vernissage' => NULL,
            'lieu' => 'Galerie de la Tour, Rue du Boeuf, 69005 Lyon',
            'chemin_visuel' => '/img/expositions/3.png',
            'actif' => 1,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ]);

        factory(App\Exposition::class, 0)->create();
    }
}
