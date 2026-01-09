<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run():void
    {

        $demo = Role::create([
            'rolename'          => 'sysadmin',
            'guard_name'        => 'admin',
            'roledisplay'          => 'System Administrator'
        ]);

        $demoUser = Role::create([
            'rolename'          => 'administrator',
            'guard_name'        => 'admin',
            'roledisplay'          => 'Administrador'
        ]);

        $demoUser2 = Role::create([
            'rolename'          => 'director',
            'guard_name'        => 'admin',
            'roledisplay'          => 'Director'
        ]);

        $demoUser3 = Role::create([
            'rolename'          => 'analyst',
            'guard_name'        => 'admin',
            'roledisplay'          => 'Analista'
        ]);

        $demoUser4 = Role::create([
            'rolename'          => 'support',
            'guard_name'        => 'admin',
            'roledisplay'          => 'Soporte'
        ]);

        $demoUser5 = Role::create([
            'rolename'          => 'user',
            'guard_name'        => 'user',
            'roledisplay'          => 'Usuario'
        ]);

        $demoUser6 = Role::create([
            'rolename'          => 'trial',
            'guard_name'        => 'user',
            'roledisplay'       => 'Visitante'
        ]);
    }
}
