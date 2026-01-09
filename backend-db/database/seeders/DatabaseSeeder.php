<?php

namespace Database\Seeders;

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
        //$this->call('UsersSeeder');
        //$this->call('RolesSeeder');

        $this->call([ClientsSeeder::class, RolesSeeder::class, UsersSeeder::class]);
        
    }
}
