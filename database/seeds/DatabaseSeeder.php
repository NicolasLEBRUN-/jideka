<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(GaleriesTableSeeder::class);
        $this->call(OeuvresTableSeeder::class);
        $this->call(ExpositionsTableSeeder::class);
        $this->call(BiographiesTableSeeder::class);
        $this->call(StatutsDisponibiliteTableSeeder::class);

    }
}
