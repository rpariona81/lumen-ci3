<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use Faker\Generator;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Generator $faker)
    {
        $role_user = Role::where('rolename', 'user')->first();
        $role_admin = Role::where('rolename', 'administrator')->first();

        $demoUser = User::create([
            'name'              => $faker->name,
            'email'             => 'demo@demo.com',
            'username'          => 'demo@demo.com',
            'password'          => Hash::make('demo')
        ]);
        $demoUser->roles()->attach($role_user->id);

        $demoUser2 = User::create([
            'name'              => $faker->name,
            'email'             => 'admin@demo.com',
            'username'          => 'admin@demo.com',
            'password'          => Hash::make('demo')
        ]);
        $demoUser2->roles()->attach($role_admin->id);
    }
}
