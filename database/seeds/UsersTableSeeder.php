<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('users')->insert([
            'name' => 'Timothé Crespy',
            'email' => 'timbmfprod@gmail.com',
            'password' => Hash::make('aze'),
            'remember_token' => NULL,
            'is_admin' => true,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ]);

        DB::table('users')->insert([
            'name' => 'Jocelyne Deschamps-Kus',
            'email' => 'jocelyne.dk@free.fr',
            'password' => Hash::make('jideka2017'),
            'remember_token' => NULL,
            'is_admin' => true,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ]);

        factory(App\User::class, 0)->create();
    }
}
