<?php

namespace Database\Seeders;

use App\Models\Client;
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

        $client1 = Client::where('client_name', 'Client 01')->first();
        $client2 = Client::where('client_name', 'Client 02')->first();
        $client3 = Client::where('client_name', 'Client 03')->first();

        $demoUser1 = User::create([
            'name' => $faker->name,
            'email' => 'demo@demo.com',
            'username' => 'demo@demo.com',
            'password' => Hash::make('123456')
        ]);
        $demoUser1->roles()->attach($role_user->id);
        $demoUser1->client()->associate($client1);
        $demoUser1->save();

        $demoUser2 = User::create([
            'name' => $faker->name,
            'email' => 'admin@demo.com',
            'username' => 'admin@demo.com',
            'password' => Hash::make('123456')
        ]);
        $demoUser2->roles()->attach($role_admin->id);
        $demoUser2->client()->associate($client2);
        $demoUser2->save();

        $demoUser3 = User::create([
            'name' => $faker->name,
            'email' => 'support@demo.com',
            'username' => 'support@demo.com',
            'password' => Hash::make('123456')
        ]);
        $demoUser3->roles()->attach($role_admin->id);
        $demoUser3->client()->associate($client3);
        $demoUser3->save();

        $demoUser4 = User::create([
            'name' => $faker->name,
            'email' => 'user@example.com',
            'username' => 'user@example.com',
            'password' => Hash::make('123456'),
        ]);
        $demoUser4->roles()->attach($role_admin->id);
        $demoUser4->client()->associate($client1);
        $demoUser4->save();

        $demoUser5 = User::create([
            'name' => $faker->name,
            'email' => 'student@example.com',
            'username' => 'student@example.com',
            'password' => Hash::make('123456')
        ]);
        $demoUser5->roles()->attach($role_user->id);
        $demoUser5->client()->associate($client2);
        $demoUser5->save();

        $demoUser6 = User::create([
            'name' => $faker->name,
            'email' => 'graduated@example.com',
            'username' => 'graduated@example.com',
            'password' => Hash::make('123456')
        ]);
        $demoUser6->roles()->attach($role_user->id);
        $demoUser6->client()->associate($client3);
        $demoUser6->save();
    }
}
