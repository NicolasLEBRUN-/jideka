<?php

use Illuminate\Database\Seeder;

class StatutsDisponibiliteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statuts_disponibilite')->insert([
            'code' => 'DISP',
            'libelle' => 'Disponible',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ]);

        DB::table('statuts_disponibilite')->insert([
            'code' => 'VEND',
            'libelle' => 'Déjà vendu',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ]);

		DB::table('statuts_disponibilite')->insert([
            'code' => 'COLP',
            'libelle' => 'Collection personnelle',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ]);
    }
}
