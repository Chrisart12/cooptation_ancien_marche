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
        // $this->call(UsersTableSeeder::class);
        //factory(App\Model\Offre::class, 50)->create();
        //factory(App\Model\Candidat::class, 50)->create();
        //factory(App\User::class, 100)->create();
        factory(App\Model\Story::class, 5)->create();
    }
}
