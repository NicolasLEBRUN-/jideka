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

        DB::table('expositions')->insert([
            'nom' => 'Club des Ateliers d\'Artistes',
            'description' => 'Exposition collective. Concept Store Gallery.',
            'date_debut' => DateTime::createFromFormat('d/m/Y H:i:s', '23/06/2016 00:00:00'),
            'date_fin' => DateTime::createFromFormat('d/m/Y H:i:s', '29/06/2016 00:00:00'),
            'date_vernissage' => NULL,
            'lieu' => '184 rue Saint Martin, 75003 Paris',
            'chemin_visuel' => '/img/expositions/4.png',
            'actif' => 1,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ]);

        DB::table('expositions')->insert([
            'nom' => 'Salon SMART Aix en Provence',
            'description' => 'Salon Méditerranéen d\'art contemporain',
            'date_debut' => DateTime::createFromFormat('d/m/Y H:i:s', '12/05/2016 00:00:00'),
            'date_fin' => DateTime::createFromFormat('d/m/Y H:i:s', '16/05/2016 00:00:00'),
            'date_vernissage' => NULL,
            'lieu' => 'Parc Jourdan, 13080 Aix en Provence',
            'chemin_visuel' => '/img/expositions/5.png',
            'actif' => 1,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ]);

        DB::table('expositions')->insert([
            'nom' => 'Salon des Indépendants de Lyon',
            'description' => 'Sous chapiteau',
            'date_debut' => DateTime::createFromFormat('d/m/Y H:i:s', '08/10/2015 00:00:00'),
            'date_fin' => DateTime::createFromFormat('d/m/Y H:i:s', '18/10/2015 00:00:00'),
            'date_vernissage' => DateTime::createFromFormat('d/m/Y H:i:s', '08/10/2015 00:00:00'),
            'lieu' => 'Place Antonin Poncet, 69002 Lyon',
            'chemin_visuel' => '/img/expositions/6.png',
            'actif' => 1,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ]);

        DB::table('expositions')->insert([
            'nom' => 'Galerie Art\'s et Miss - Paris',
            'description' => 'Exposition collective « Petits Formats »',
            'date_debut' => DateTime::createFromFormat('d/m/Y H:i:s', '03/12/2011 00:00:00'),
            'date_fin' => DateTime::createFromFormat('d/m/Y H:i:s', '23/12/2011 00:00:00'),
            'date_vernissage' => NULL,
            'lieu' => '14 rue Sainte Anastase, 75003 Paris',
            'chemin_visuel' => '/img/expositions/7.png',
            'actif' => 1,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ]);

        factory(App\Exposition::class, 0)->create();
    }
}
