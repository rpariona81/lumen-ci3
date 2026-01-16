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
            'firstname' => $faker->firstName,
            'lastname' => $faker->lastName,
            'email' => 'userdemo@demo.com',
            'password' => Hash::make('123456'),
            'enabled' => true,
            'email_subscribed' => true
        ]);
        $last_at_pos = strrpos($demoUser1->email, '@');
        $len_email = strlen($demoUser1->email);
        $demoUser1->username = strtolower(substr($demoUser1->email,(-1*$len_email),$last_at_pos));  
        $demoUser1->roles()->attach($role_user->id);
        $demoUser1->client()->associate($client1);
        $demoUser1->save();

        $demoUser2 = User::create([
            'firstname' => $faker->firstName,
            'lastname' => $faker->lastName,
            'email' => 'admin@demo.com',
            'username' => 'admin',
            'password' => Hash::make('123456'),
            'enabled' => true,
            'email_subscribed' => true
        ]);
        $demoUser2->roles()->attach($role_admin->id);
        $demoUser2->client()->associate($client2);
        $demoUser2->save();

        $demoUser3 = User::create([
            'firstname' => $faker->firstName,
            'lastname' => $faker->lastName,
            'email' => 'support@demo.com',
            'username' => 'support',
            'password' => Hash::make('123456'),
            'enabled' => true,
            'email_subscribed' => true
        ]);
        $demoUser3->roles()->attach($role_admin->id);
        $demoUser3->client()->associate($client3);
        $demoUser3->save();

        $demoUser4 = User::create([
            'firstname' => $faker->firstName,
            'lastname' => $faker->lastName,
            'email' => 'user@example.com',
            'username' => 'user',
            'password' => Hash::make('123456'),
            'enabled' => true,
            'email_subscribed' => true
        ]);
        $demoUser4->roles()->attach($role_admin->id);
        $demoUser4->client()->associate($client1);
        $demoUser4->save();

        $demoUser5 = User::create([
            'firstname' => $faker->firstName,
            'lastname' => $faker->lastName,
            'email' => 'student@example.com',
            'username' => 'student',
            'password' => Hash::make('123456'),
            'enabled' => true,
            'email_subscribed' => true
        ]);
        $demoUser5->roles()->attach($role_user->id);
        $demoUser5->client()->associate($client2);
        $demoUser5->save();

        $demoUser6 = User::create([
            'firstname' => $faker->firstName,
            'lastname' => $faker->lastName,
            'email' => 'graduated@example.com',
            'username' => 'graduated',
            'password' => Hash::make('123456'),
            'enabled' => true,
            'email_subscribed' => true
        ]);
        $demoUser6->roles()->attach($role_user->id);
        $demoUser6->client()->associate($client3);
        $demoUser6->save();
    }
}
