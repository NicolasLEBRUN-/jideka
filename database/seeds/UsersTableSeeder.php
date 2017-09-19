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
            'name' => 'Tim',
            'email' => 'tim@cre.fr',
            'password' => Hash::make('aze'),
            'remember_token' => NULL,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ]);

        factory(App\User::class, 0)->create();
    }
}
